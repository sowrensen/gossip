<template>
  <div class="flex justify-between items-center">
    <div class="font-bold text-xl">
      {{ selected.title }}
    </div>
    <div>
      <select
        v-model="selected"
        @change="$emit('roomChanged', selected)"
        class="rounded"
      >
        <option
          v-for="(room, index) in rooms"
          :key="index"
          :value="room"
        >
          {{ room.title }}
        </option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  props: ['rooms', 'currentRoom'],
  data () {
    return {
      selected: {}
    }
  },
  mounted () {
    this.selected = this.currentRoom
  }
}
</script>

