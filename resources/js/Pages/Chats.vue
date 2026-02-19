<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2h2M12 12v6m0 0l-3-3m3 3l3-3M16 3H8a2 2 0 00-2 2v3a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2z"/>
        </svg>
        Мои чаты
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between mb-6">
            <div class="text-lg font-bold text-blue-700">Список чатов</div>
            <!-- Если нужна кнопка создания нового чата -->
            <!--
            <a href="/chats/create" class="inline-flex items-center px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
              </svg>
              Новый чат
            </a>
            -->
          </div>
          <ul class="divide-y divide-gray-100">
            <li v-for="chat in chats" :key="chat.id" class="py-4 flex items-center gap-4">
              <div class="flex-shrink-0">
                <svg class="w-10 h-10 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm2 0v10h12V5H4zm3 3a1 1 0 100 2 1 1 0 000-2zm6 1a1 1 0 11-2 0 1 1 0 012 0zm-7 4a1 1 0 100 2h8a1 1 0 100-2H6z"/>
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <a :href="`/chats/${chat.id}`" class="text-blue-700 font-semibold hover:underline text-lg">
                  {{ chat.name }}
                </a>
                <div v-if="chat.description" class="text-gray-500 text-sm mt-1">
                  {{ chat.description }}
                </div>
              </div>
              <a :href="`/chats/${chat.id}`" class="ml-4 text-blue-500 hover:text-blue-700" title="Перейти в чат">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
            </li>
          </ul>
          <div v-if="!chats || chats.length === 0" class="text-gray-400 text-center py-8">
            У вас пока нет чатов.
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const props = defineProps({
  chats: Array
})
</script>