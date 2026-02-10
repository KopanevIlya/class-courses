<template>
  <div>
    <h1>Мои чаты</h1>
    <ul>
      <li v-for="chat in chats" :key="chat.id">
        <a :href="`/chats/${chat.id}`">{{ chat.name }}</a>
      </li>
    </ul>
  </div>
</template>

<script setup>
const props = defineProps({
  chats: Array
  
})
console.log(props.chats)

</script>