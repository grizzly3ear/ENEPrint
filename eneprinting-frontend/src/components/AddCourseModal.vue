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
        @click.native='onSearch("")'
      >
        Add Course
      </v-btn>
      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >
          แก้ไขวิชาที่สอน
          <v-text-field
            class="mx-3"
            flat
            label="Search"
            prepend-inner-icon="search"
            v-model='keyword'
            @change.native="onSearch(keyword)"
          >
          </v-text-field>
        </v-card-title>
        <v-card-text v-for="course in allCourse" :key="course.id">
          <v-layout row>
            <v-flex md10>
              <v-text-field
                :label='course.code'
                v-model='course.name'
                disabled
              ></v-text-field>
            </v-flex>
            <v-flex md2>
              <v-btn dark color='blue' @click='onAddButtonClick(course.id)'>
                Add
              </v-btn>
            </v-flex>
          </v-layout>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
          <v-btn
            color="primary"
            flat
            @click.native="dialog = false"
          >
            Cancel
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
import axios from '@/utils/axios'
export default {
  name: 'addCourseModal',
  data: () => ({
    dialog: false,
    keyword: '',
    allCourse: []
  }),
  methods: {
    ...mapActions([
      'setCourses',
      'setLoading'
    ]),
    onSearch (keyword) {
      this.allCourse = this.getAllCourses
      this.allCourse = this.allCourse.filter((course) => {
        return course.code.toLowerCase().includes(keyword) || course.name.toLowerCase().includes(keyword)
      })
      this.keyword = ''
    },
    async onAddButtonClick (courseId) {
      this.setLoading(true)
      await axios.post(`api/profile/${this.getUserId}/course`, {
        course_id: courseId
      })
      const newFetch = await axios.get(`api/profile/${this.getUserId}/course`)
      this.setCourses(newFetch.data.data)
      this.dialog = false
      this.setLoading(false)
    }
  },
  computed: {
    ...mapGetters([
      'getAllCourses',
      'getUserId'
    ])
  },
  mounted () {
    this.allCourse = this.getAllCourses
  }
}
</script>
