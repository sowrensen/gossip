<template>
  <div class="mt-7">
    <div class="text-gray-600 text-sm font-bold" :class="self ? 'pr-2' : 'pl-2'">
      {{ self ? 'You' : message.user.name }}
    </div>
    <div class="mt-1 p-2 rounded-md text-left inline-block max-w-xl shadow-md" :class="decorativeClasses">
      {{ message.text }}
    </div>
    <div class="mt-2 text-gray-500 text-xs uppercase" :class="self ? 'pr-2' : 'pl-2'">
      {{ readableDate(message.created_at) }}
    </div>
  </div>
</template>

<script>
export default {
  props: ['message', 'self'],
  computed: {
    decorativeClasses () {
      if (this.self) {
        return 'bg-blue-100 text-blue-900'
      }
      return 'bg-pink-100 text-pink-900'
    }
  },
  methods: {
    readableDate (date) {
      return (new Date(date)).toLocaleString()
    }
  }
}
</script>

