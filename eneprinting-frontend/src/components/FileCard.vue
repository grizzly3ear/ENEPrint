<template>
  <v-layout justify-center align-start>
    <v-flex md5>
      <v-text-field
        v-bind:label='$t(`${file.course.code}`)'
        v-model='file.course.name'
        disabled
      ></v-text-field>
    </v-flex>
    <v-flex md2>
      <v-text-field
        label='ชื่อไฟล์ upload ตอนไหนด้วย'
        v-model='file.file_name'
        disabled
      ></v-text-field>
    </v-flex>
    <v-flex md2>
      <v-text-field
        label='เวลาอัพโหลด'
        v-model='file.created_at'
        disabled
      ></v-text-field>
    </v-flex>
    <v-flex md1>
      <v-btn @click='handleDownload(file.file_path)' color='success'>
        DOWNLOAD
      </v-btn>
    </v-flex>
    <v-flex md1>
      <v-btn dark color='red' @click='deleteFile(file.id)'>
        <v-layout>
          <v-icon dark right>block</v-icon>
        </v-layout>
      </v-btn>
    </v-flex>
  </v-layout>
</template>
<script>
import { mapActions, mapGetters } from 'vuex'
import axios from '@/utils/axios'
export default {
  name: 'fileCard',
  props: [
    'file'
  ],
  methods: {
    ...mapActions([
      'setLoading',
      'setFiles'
    ]),
    handleDownload (path) {
      this.setLoading(true)
      window.open(`http://localhost:8000/api/file?file_name=${path}`)
      this.setLoading(false)
    },
    async deleteFile (id) {
      this.setLoading(true)
      await axios.delete(`http://localhost:8000/api/file/${id}`)
      const newFetch = await axios.get(`api/profile/${this.getUserId}/file`)
      console.log(newFetch.data)
      this.setFiles(newFetch.data.data)
      this.setLoading(false)
    },
    $t (value) {
      return value
    }
  },
  mounted () {
  },
  computed: {
    ...mapGetters([
      'getUserId'
    ])
  }
}
</script>
