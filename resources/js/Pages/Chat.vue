<template>
    <div>
      <h2>{{ chat.name }}</h2>
      <div v-for="message in messages" :key="message.id">
        <strong>{{ message.user.name }}</strong>: {{ message.body }}
        <div v-for="file in message.files" :key="file.id">
          <a :href="`/storage/${file.path}`" target="_blank">{{ file.original_name }}</a>
        </div>
      </div>
      <!-- Форма отправки сообщения и т.д. -->
    </div>
  </template>
  
  <script setup>
  const props = defineProps({
    chat: Object,
    messages: Array
  })
  </script>