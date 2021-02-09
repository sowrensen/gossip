<template>
  <div class="h-96 w-full">
    <div class="h-full p-2 flex flex-col-reverse overflow-y-auto">
      <div v-for="(message, index) in messages" :key="index">
        {{ message.text }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['messages'],
}
</script>

