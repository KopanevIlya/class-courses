<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Чат: {{ chat.name }}
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-2xl mx-auto px-2">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <!-- Список сообщений -->
          <div ref="messagesEnd" class="space-y-4 mb-4 max-h-[400px] overflow-y-auto">
            <div
              v-for="message in messages"
              :key="message.id"
              :class="[
                'flex',
                message.user.email === $page.props.auth.user.email ? 'justify-end' : 'justify-start'
              ]"
            >
              <div class="flex items-end space-x-2" :class="message.user.email === $page.props.auth.user.email ? 'flex-row-reverse space-x-reverse' : ''">
                <!-- Аватарка -->
                <div class="w-8 h-8 rounded-full bg-blue-200 flex items-center justify-center font-bold text-blue-800 text-sm">
                  {{ message.user.name ? message.user.name.charAt(0).toUpperCase() : message.user.email.charAt(0).toUpperCase() }}
                </div>
                <!-- Сообщение -->
                <div
                  :class="[
                    'px-4 py-2 rounded-lg min-w-[100px] max-w-[70vw] break-words',
                    message.user.email === $page.props.auth.user.email
                      ? 'bg-blue-500 text-white'
                      : 'bg-gray-100 text-gray-800'
                  ]"
                >
                  <div class="text-xs font-semibold mb-1 opacity-80">
                    {{ message.user.email }}
                  </div>
                  <div>{{ message.body }}</div>
                  <div v-if="message.files && message.files.length" class="mt-2 space-y-1">
                    <div v-for="file in message.files" :key="file.id">
                      <a
                        :href="`/storage/${file.path}`"
                        target="_blank"
                        class="text-xs text-blue-400 hover:underline flex items-center"
                      >
                        <svg class="w-4 h-4 mr-1 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a4 4 0 10-5.656-5.656l-6.586 6.586"/>
                        </svg>
                        {{ file.original_name }}
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Форма отправки -->
          <form @submit.prevent="sendMessage" class="flex items-center gap-2 mt-2">
            <input
              v-model="newMessage"
              class="flex-1 border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring focus:border-blue-400 transition h-12"
              placeholder="Введите сообщение"
            />
            <label class="inline-flex items-center border rounded px-3 py-2 bg-white cursor-pointer hover:bg-gray-100 transition h-12">
              <input
                type="file"
                multiple
                @change="handleFiles"
                class="hidden"
              />
              <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a4 4 0 10-5.656-5.656l-6.586 6.586"/>
              </svg>
              <span>Выбрать файлы</span>
            </label>
            <span class="text-gray-500 text-sm truncate max-w-[140px] h-12 flex items-center">
              {{ files && files.length ? files.map(f => f.name).join(', ') : 'Файл не выбран' }}
            </span>
            <button
              class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition h-12"
              type="submit"
            >
              Отправить
            </button>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';
import { router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
  chat: Object,
  messages: Array,
});

const messages = ref(props.messages);
const newMessage = ref('');
const files = ref([]);
let pollingInterval = null;
const messagesEnd = ref(null);

function handleFiles(event) {
  files.value = Array.from(event.target.files);
}

function fetchMessages() {
  fetch(`/chats/${props.chat.id}/messages`)
    .then(res => res.json())
    .then(data => {
      messages.value = data;
      scrollToBottom();
    });
}

function sendMessage() {
  if (!newMessage.value && files.value.length === 0) return;
  const formData = new FormData();
  formData.append('body', newMessage.value);
  files.value.forEach(file => formData.append('files[]', file));

  router.post(`/chats/${props.chat.id}/messages`, formData, {
    preserveScroll: true,
    forceFormData: true,
    onSuccess: () => {
      newMessage.value = '';
      files.value = [];
      fetchMessages();
    }
  });
}

function scrollToBottom() {
  nextTick(() => {
    if (messagesEnd.value) {
      messagesEnd.value.scrollTop = messagesEnd.value.scrollHeight;
    }
  });
}

onMounted(() => {
  pollingInterval = setInterval(fetchMessages, 3000); // обновлять каждые 3 сек
  scrollToBottom();
});

onUnmounted(() => {
  clearInterval(pollingInterval);
});
</script>