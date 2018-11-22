<template>
  <v-app>
    <v-layout column>
      <span v-for='file in getFiles' :key='file.id'>
        <FileCard :file='file'/>
      </span>
    </v-layout>
  </v-app>
</template>
<script>
import FileCard from './FileCard'
import { mapGetters } from 'vuex'
export default {
  name: 'fileList',
  components: {
    FileCard
  },
  data: () => ({
  }),
  computed: {
    ...mapGetters([
      'getFiles'
    ])
  },
  mounted () {
  }
}
</script>
