<template>
  <v-app>
    <v-layout column>
      <span v-for="course in getCourses" :key="course.id">
        <CourseCard :course='course' />
      </span>
    </v-layout>
  </v-app>
</template>
<script>
import CourseCard from '@/components/CourseCard'
import { mapGetters } from 'vuex'
export default {
  name: 'CourseList',
  components: {
    CourseCard
  },
  computed: {
    ...mapGetters([
      'getUserId',
      'getCourses'
    ])
  }
}
</script>
