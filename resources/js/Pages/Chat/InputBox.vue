<template>
  <div class="mt-3">
    <hr>
    <div class="flex mt-2">
      <input
        type="text"
        class="flex-1 p-2 outline-none rounded border-gray-200"
        v-model="message"
        @keyup.enter="sendMessage"
        placeholder="Write something cool..."
      >
      <button
        @click="sendMessage"
        class="ml-2 bg-green-700 hover:bg-green-600 text-green-100 py-2 px-5 font-bold uppercase tracking-wide rounded shadow-lg">
        Send
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['room'],
  data () {
    return {
      message: ''
    }
  },
  methods: {
    /**
     * Send the message to the corresponding room.
     *
     */
    sendMessage () {
      if (!this.message) {
        return
      }
      axios
        .post(`/chat/${this.room.id}`, {
          text: this.message
        })
        .then(response => {
          if (response.status === 201) {
            this.message = ''
            this.$emit('messageSent')
          }
        })
        .catch(error => console.log(error.message))
    }
  }
}
</script>

