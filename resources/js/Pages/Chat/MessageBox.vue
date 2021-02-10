<template>
  <div class="h-96 w-full">
    <div class="h-full p-2 flex flex-col-reverse overflow-y-auto">
      <div
        v-for="(message, index) in messages"
        :key="index"
        :class="isCurrentUserSender(message) ? 'text-right' : 'text-left'"
      >
        <message-item
          :message="message"
          :self="isCurrentUserSender(message)"
        >
        </message-item>
      </div>
    </div>
  </div>
</template>

<script>
import MessageItem from '@/Pages/Chat/MessageItem'

export default {
  components: { MessageItem },
  props: ['messages'],
  computed: {
    currentUser () {
      return this.$page.props.user
    }
  },
  methods: {
    isCurrentUserSender (message) {
      return this.currentUser.id === message.user_id
    }
  }
}
</script>

