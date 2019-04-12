<template>
  <div class="text-xs-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-btn
        slot="activator"
        color="blue"
        dark
      >
        UPLOAD FILE
      </v-btn>
      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >
          UPLOAD FILE
        </v-card-title>
        <v-card-text>
          <v-text-field
            label='Select file'
            prepend-icon='attach_file'
            @click='pickFile'
            v-model='fileName'
          ></v-text-field>
          <input
            type='file'
            accept='file/*'
            ref='input'
            style='display: none'
            @change='onFileSelect'
          />
        </v-card-text>
        <v-overflow-btn
          :items="getCourses"
          item-text="full_name"
          return-object
          v-model='course'
        ></v-overflow-btn>
        <v-overflow-btn
          :items="fileType"
          placeholder='File Type'
          return-object
          v-model='fileTypeSelect'
        ></v-overflow-btn>
        <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            flat
            @click="onSubmitFile"
          >
            Upload
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
import axios from '@/utils/axios'
import { mapGetters, mapActions } from 'vuex'
export default {
  name: 'addFileModal',
  data () {
    return {
      dialog: false,
      fileName: '',
      filePath: '',
      fileObject: {},
      course: '',
      fileType: [
        'lecture',
        'test'
      ],
      fileTypeSelect: ''
    }
  },
  methods: {
    ...mapActions([
      'setFiles',
      'setLoading'
    ]),
    pickFile () {
      this.$refs.input.click()
    },
    onFileSelect (e) {
      const file = e.target.files
      if (file[0] !== undefined) {
        this.fileName = file[0].name
      } else {
        this.fileName = ''
        this.fileObject = ''
      }
    },
    async onSubmitFile () {
      // console.log(this.course)
      // console.log(this.fileTypeSelect)
      this.setLoading(true)
      let formData = new FormData()
      this.fileObject = this.$refs.input.files[0]
      formData.append('file', this.fileObject)
      formData.append('course_id', this.course.id)
      formData.append('file_name', this.fileName)
      formData.append('file_type', this.fileTypeSelect)
      await axios.post(`api/profile/${this.getUserId}/upload`,
        formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
      const newFetch = await axios.get(`api/profile/${this.getUserId}/file`)
      this.setFiles(newFetch.data.data)
      this.dialog = false
      this.setLoading(false)
    }
  },
  computed: {
    ...mapGetters([
      'getUserId',
      'getCourses',
      'getFiles'
    ])
  },
  mounted () {

  }
}
</script>
