<template>
  <v-app>
    <v-content>
      <v-layout justify-center row>
        <v-flex md5>
          <v-text-field
            label='วิชาที่สอน'
            disabled
          ></v-text-field>
        </v-flex>
        <v-flex md1>
          <AddCourseModal />
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex>
          <CourseList />
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
import AddCourseModal from '@/components/AddCourseModal'
import CourseList from '@/components/CourseList'
export default {
  name: 'editCourse',
  components: {
    CourseList,
    AddCourseModal
  }
}
</script>
