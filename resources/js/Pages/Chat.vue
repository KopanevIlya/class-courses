<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Чат: {{ chat.name }}
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-4 rounded shadow">
          <ul>
            <li v-for="message in messages" :key="message.id">
              <strong>{{ message.user.name }}:</strong> {{ message.body }}
              <ul v-if="message.files && message.files.length">
                <li v-for="file in message.files" :key="file.id">
                  <a :href="`/storage/${file.path}`" target="_blank">{{ file.original_name }}</a>
                </li>
              </ul>
            </li>
          </ul>
          <form @submit.prevent="sendMessage" enctype="multipart/form-data">
            <input v-model="newMessage" class="border rounded px-2 py-1 mr-2" placeholder="Введите сообщение" />
            <input type="file" multiple @change="handleFiles" />
            <button class="bg-blue-500 text-white px-3 py-1 rounded" type="submit">Отправить</button>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  chat: Object,
  messages: Array,
});

const newMessage = ref('');
const files = ref([]);

function handleFiles(event) {
  files.value = Array.from(event.target.files);
}

function sendMessage() {
  const formData = new FormData();
  formData.append('body', newMessage.value);
  files.value.forEach(file => formData.append('files[]', file));

  router.post(`/chats/${props.chat.id}/messages`, formData, {
    preserveScroll: true,
    forceFormData: true,
    onSuccess: () => {
      newMessage.value = '';
      files.value = [];
    }
  });
}
</script>