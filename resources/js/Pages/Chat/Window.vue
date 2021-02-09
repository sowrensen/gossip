<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <room-selector
            v-if="currentRoom.id"
            :rooms="rooms"
            :current-room="currentRoom"
        >
        </room-selector>
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
          <message-box></message-box>
          <input-box></input-box>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import RoomSelector from '@/Pages/Chat/RoomSelector'
import MessageBox from '@/Pages/Chat/MessageBox'
import InputBox from '@/Pages/Chat/InputBox'

export default {
  components: {
    InputBox,
    MessageBox,
    RoomSelector,
    AppLayout,
  },
  data () {
    return {
      rooms: [],
      currentRoom: {}
    }
  },
  mounted () {
    this.getRooms()
  },
  methods: {
    getRooms () {
      axios.get('/chat/rooms')
          .then(response => {
            this.rooms = response.data
            this.setRoom(this.rooms[0])
          })
          .catch(error => console.error(error.message()))
    },
    setRoom (room) {
      this.currentRoom = room
    }
  }
}
</script>
