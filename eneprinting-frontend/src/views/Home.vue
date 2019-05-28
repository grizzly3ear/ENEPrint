<template>
  <v-app>
    <v-content>
      <v-layout>
        <v-flex md2>
        </v-flex>
        <v-layout align-center justify-center>
          <v-flex md6>
            <v-btn v-on:click.native='changeCurrentPage("profile")'>Profile</v-btn>
            <v-btn v-on:click.native='changeCurrentPage("editCourse")'>Edit Courses</v-btn>
            <v-btn v-on:click.native='changeCurrentPage("addFile")'>Add files</v-btn>
            <router-link to="/"><v-btn>Logout</v-btn></router-link>
            <v-progress-circular
              indeterminate
              color="primary"
              v-show="getLoading"
            ></v-progress-circular>
          </v-flex>
        </v-layout>
      </v-layout>
      <v-layout>
        <v-flex md3></v-flex>
        <v-flex md5>
          <h2 v-if='currentPage == "profile"'>
            Profile
          </h2>
          <h2 v-if='currentPage == "editCourse"'>
            Course
          </h2>
          <h2 v-if='currentPage == "addFile"'>
            Document
          </h2>
        </v-flex>
      </v-layout>
      <div style='margin-top: 20px'>
        <div v-if='currentPage == "profile"'>
          <Profile :user="user" />
        </div>
        <div v-if='currentPage == "editCourse"'>
          <EditCourse />
        </div>
        <div v-if='currentPage == "addFile"'>
          <AddFile />
        </div>
      </div>
    </v-content>
  </v-app>
</template>

<script>
import Profile from '@/components/Profile'
import EditCourse from '@/components/EditCourse'
import AddFile from '@/components/AddFile'
import axios from '@/utils/axios'
import { mapActions, mapGetters, mapState } from 'vuex'
export default {
  name: 'home',
  state: {
    currentPage: ''
  },
  data: () => ({
    user: {}
  }),
  components: {
    Profile,
    EditCourse,
    AddFile
  },
  methods: {
    ...mapActions([
      'changeCurrentPage',
      'setAllCourses',
      'setCourses',
      'setFiles',
      'setLoading'
    ]),
    async getProfile () {
      this.setLoading(true)
      const { data } = await axios.get(`api/profile/${this.getUserId}`)
      this.user = data.data
      console.log(data.data)
    },
    async getAllCourse () {
      const { data } = await axios.get('api/course')
      this.setAllCourses(data)
    },
    async getCourse () {
      const { data } = await axios.get(`api/profile/${this.getUserId}/course`)
      this.setCourses(data.data)
    },
    async getFile () {
      const { data } = await axios.get(`api/profile/${this.getUserId}/file`)
      console.log(data)
      this.setFiles(data.data)
      this.setLoading(false)
    }
  },
  computed: {
    ...mapGetters([
      'getCurrentPage',
      'getUserId',
      'getAllCourses',
      'getCourses',
      'getLoading'
    ]),
    ...mapState(['currentPage'])
  },
  async mounted () {
    this.getProfile()
    this.getAllCourse()
    this.getCourse()
    this.getFile()
  }
}
</script>
