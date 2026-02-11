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
          <form
  @submit.prevent="sendMessage"
  class="flex flex-col sm:flex-row items-stretch gap-2 mt-2"
>
  <input
    v-model="newMessage"
    class="flex-1 border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring focus:border-blue-400 transition h-12"
    placeholder="Введите сообщение"
  />
  <label
    class="flex items-center justify-center border rounded bg-white cursor-pointer hover:bg-gray-100 transition h-12 w-12 min-w-[3rem]"
    title="Прикрепить файл"
  >
    <input
      type="file"
      multiple
      @change="handleFiles"
      class="hidden"
    />
    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a4 4 0 10-5.656-5.656l-6.586 6.586"/>
    </svg>
  </label>
  <button
    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition h-12 w-full sm:w-auto"
    type="submit"
  >
    Отправить
  </button>
</form>
<span v-if="files && files.length"
  class="block text-gray-500 text-xs mt-1 truncate max-w-full"
>
  {{ files.map(f => f.name).join(', ') }}
</span>
       
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';
import { router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: import.meta.env.VITE_PUSHER_APP_KEY,
  cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
  forceTLS: true,
});

const props = defineProps({
  chat: Object,
  messages: Array,
});

const messages = ref(props.messages);
const newMessage = ref('');
const files = ref([]);
const messagesEnd = ref(null);

function handleFiles(event) {
  files.value = Array.from(event.target.files);
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

let echoChannel = null;

onMounted(() => {
  echoChannel = window.Echo.private('chat.' + props.chat.id)
    .listen('NewMessage', (e) => {
      messages.value.push(e.message);
      scrollToBottom();
    });
  scrollToBottom();
});

onUnmounted(() => {
  if (echoChannel) {
    window.Echo.leave('chat.' + props.chat.id);
  }
});

</script>