<template>
  <v-app>
    <v-content>
      <v-layout>
        <v-flex md2>
          <v-img src='https://picsum.photos/510/300?random' alt='profile'></v-img>
        </v-flex>
        <v-layout align-center justify-center>
          <v-flex md6>
            <v-btn v-on:click.native='changeCurrentPage("profile")'>Profile</v-btn>
            <v-btn v-on:click.native='changeCurrentPage("editCourse")'>Edit Courses</v-btn>
            <v-btn v-on:click.native='changeCurrentPage("addFile")'>Add files</v-btn>
            <router-link to="/"><v-btn>Logout</v-btn></router-link>
          </v-flex>
        </v-layout>
      </v-layout>
      <h2>{{currentPage}}</h2>
      <div v-if='currentPage == "profile"'>
        <Profile :user="user" />
      </div>
      <div v-if='currentPage == "editCourse"'>
        <EditCourse />
      </div>
      <div v-if='currentPage == "addFile"'>
        <AddFile />
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
      this.user = data
    },
    async getAllCourse () {
      const { data } = await axios.get('api/course')
      this.setAllCourses(data)
    },
    async getCourse () {
      const { data } = await axios.get(`api/profile/${this.getUserId}/course`)
      this.setCourses(data)
    },
    async getFile () {
      const { data } = await axios.get(`api/profile/${this.getUserId}/file`)
      this.setFiles(data.data)
      this.setLoading(false)
    }
  },
  computed: {
    ...mapGetters([
      'getCurrentPage',
      'getUserId',
      'getAllCourses',
      'getCourses'
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
