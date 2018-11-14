<template>
  <v-layout justify-center align-start>
    <v-flex md5>
      <v-text-field
        label='วิชาที่สอน'
        disabled
        v-model='course.name'
      ></v-text-field>
    </v-flex>
    <v-flex md1>
      <v-btn color="red" dark @click='deleteCourse(course.pivot.id)'>
        <v-layout>
          <v-icon dark right>block</v-icon>
        </v-layout>
      </v-btn>
    </v-flex>
  </v-layout>
</template>
<script>
import axios from '@/utils/axios'
import { mapActions, mapGetters } from 'vuex'
export default {
  name: 'addCourseCard',
  components: {
  },
  props: [
    'course',
    'index'
  ],
  methods: {
    ...mapActions(['setCourses']),
    async deleteCourse (id) {
      const { data } = await axios.delete(`/api/instructor-course/${id}`)
      console.log('delete ' + data)
      const newFetch = await axios.get(`/api/profile/${this.getUserId}/course`)
      console.log(newFetch.data)
      this.setCourses(newFetch.data)
    }
  },
  computed: {
    ...mapGetters([
      'getCourses',
      'getUserId'
    ])
  }
}
</script>
