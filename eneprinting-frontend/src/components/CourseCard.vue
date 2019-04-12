<template>
  <v-layout justify-center align-start>
    <v-flex md5>
      <v-text-field
        v-bind:label="$t(`${course.code} ชั้นปีที่ ${course.year}`)"
        disabled
        v-model='course.name'
      ></v-text-field>
    </v-flex>
    <v-flex md1>
      <v-btn color="red" dark @click='deleteCourse(course.pivot.id)'>
        <v-layout justify-center>
          <v-icon dark>delete</v-icon>
        </v-layout>
      </v-btn>
    </v-flex>
  </v-layout>
</template>
<script>
import axios from '@/utils/axios'
import { mapActions, mapGetters } from 'vuex'
import swal from 'sweetalert'
export default {
  name: 'addCourseCard',
  components: {
  },
  props: [
    'course',
    'index'
  ],
  methods: {
    ...mapActions([
      'setCourses',
      'setLoading'
    ]),
    async deleteCourse (id) {
      swal({
        title: 'ลบวิชาที่สอน',
        text: 'แน่ใจหรือไม่ที่จะลบวิชานี้',
        icon: 'warning',
        buttons: {
          deleteSubjectFile: {
            text: 'delete subject&files',
            value: 'deleteSubjectFile'
          },
          deleteSubject: {
            text: 'delete subject',
            value: 'deleteSubject'
          },
          cancel: 'cancel'
        },
        dangerMode: true
      }).then((value) => {
        if (value === 'deleteSubject') {
          this.setLoading(true)
          axios.delete(`api/instructor-course/${id}`).then(() => {
            axios.get(`api/profile/${this.getUserId}/course`).then(({ data }) => {
              this.setCourses(data)
              swal('ลบวิชาที่สอน', 'ลบวิชาเรียบร้อย', 'success')
              this.setLoading(false)
            })
          })
        } else if (value === 'deleteSubjectFile') {
          this.setLoading(true)
          axios.delete(`api/instructor-course/${id}/with-file`).then(() => {
            axios.get(`api/profile/${this.getUserId}/course`).then(({ data }) => {
              this.setCourses(data)
              swal('ลบวิชาที่สอน', 'ลบวิชาและไฟล์เรียบร้อย', 'success')
              this.setLoading(false)
            })
          })
        }
      })
    },
    $t (value) {
      return value
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
