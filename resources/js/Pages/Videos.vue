<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const props = defineProps({
  videos: Array
});
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Записи видео
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
          <div class="mb-4 text-blue-700 font-bold text-lg">
            Все записи уроков доступны на RuTube:
          </div>
          <ul class="divide-y divide-gray-100">
            <li v-for="video in videos" :key="video.id" class="py-4 flex items-center gap-4">
              <div class="flex-shrink-0">
                <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm5 3.5l5 2.5-5 2.5V7.5z"/>
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <a :href="video.url" target="_blank" rel="noopener"
                   class="text-blue-700 font-semibold hover:underline text-lg flex items-center gap-2">
                  {{ video.title }}
                  <svg class="w-5 h-5 inline text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                       viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H7"/>
                  </svg>
                </a>
              </div>
            </li>
          </ul>
          <div v-if="!videos || videos.length === 0" class="text-gray-400 text-center py-8">
            Пока нет доступных записей.
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>