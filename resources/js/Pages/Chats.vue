<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Мои чаты
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <ul>
          <li v-for="chat in chats" :key="chat.id">
            <a :href="`/chats/${chat.id}`">{{ chat.name }}</a>
          </li>
        </ul>
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