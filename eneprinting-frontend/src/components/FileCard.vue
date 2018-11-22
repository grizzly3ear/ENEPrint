<template>
  <v-layout justify-center align-start>
    <v-flex md1>
      <v-text-field
        label='วิชา'
        v-model='file.course.code'
        disabled
      ></v-text-field>
    </v-flex>
    <v-flex md4>
      <v-text-field
        label='ชื่อไฟล์'
        v-model='file.file_name'
        disabled
      ></v-text-field>
    </v-flex>
    <v-flex md1>
      <v-btn @click='handleDownload(file.file_path)' color='success'>
        DOWNLOAD
      </v-btn>
    </v-flex>
  </v-layout>
</template>
<script>
import { mapActions } from 'vuex'
export default {
  name: 'fileCard',
  props: [
    'file'
  ],
  methods: {
    ...mapActions([
      'setLoading'
    ]),
    handleDownload (path) {
      this.setLoading(true)
      window.open(`http://localhost:8000/api/file?file_name=${path}`)
      this.setLoading(false)
    }
  },
  mounted () {
  }
}
</script>
