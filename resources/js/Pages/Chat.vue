<template>
    <div>
      <h2>{{ chat.name }}</h2>
      <div v-for="message in messages" :key="message.id" class="mb-2">
        <strong>{{ message.user.name }}</strong>: {{ message.body }}
        <div v-for="file in message.files" :key="file.id">
          <a :href="`/storage/${file.path}`" target="_blank">{{ file.original_name }}</a>
        </div>
      </div>
      <form @submit.prevent="sendMessage">
        <textarea v-model="body" placeholder="Введите сообщение"></textarea>
        <input type="file" multiple @change="handleFiles">
        <button type="submit">Отправить</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import Echo from 'laravel-echo'
  import axios from 'axios'
  
  window.Pusher = require('pusher-js')
  
  const props = defineProps({
    chatId: Number
  })
  
  const chat = ref({})
  const messages = ref([])
  const body = ref('')
  const files = ref([])
  
  const fetchChat = async () => {
    const res = await axios.get(`/chats/${props.chatId}`)
    chat.value = res.data.chat
    messages.value = res.data.messages
  }
  
  const handleFiles = (e) => {
    files.value = Array.from(e.target.files)
  }
  
  const sendMessage = async () => {
    let formData = new FormData()
    formData.append('body', body.value)
    files.value.forEach((file, i) => {
      formData.append(`files[${i}]`, file)
    })
    await axios.post(`/chats/${props.chatId}/messages`, formData)
    body.value = ''
    files.value = []
  }
  
  onMounted(() => {
    fetchChat()
    window.Echo = new Echo({
      broadcaster: 'pusher',
      key: import.meta.env.VITE_PUSHER_APP_KEY,
      cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
      forceTLS: true,
      encrypted: true,
      authEndpoint: '/broadcasting/auth',
      auth: {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      }
    })
    window.Echo.private(`chat.${props.chatId}`)
      .listen('NewMessage', (e) => {
        messages.value.push(e.message)
      })
  })
  </script>