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
        Edit
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
            @change.native="onSearch()"
          >
          </v-text-field>
        </v-card-title>
        <v-card-text v-for="course in allCourse" :key="course.id">
          <v-layout row>
            <v-flex md10>
              <v-card>
                <v-text-field
                  :label='course.code'
                  v-model='course.name'
                ></v-text-field>
              </v-card>
            </v-flex>
            <v-flex md2>
              <v-btn color='blue'>
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
import { mapGetters } from 'vuex'
export default {
  name: 'addCourseModal',
  data: () => ({
    dialog: false,
    keyword: '',
    allCourse: []
  }),
  methods: {
    onSearch () {
      this.allCourse = this.getAllCourses
      this.allCourse = this.allCourse.filter((course) => {
        return course.code.toLowerCase().includes(this.keyword) || course.name.toLowerCase().includes(this.keyword)
      })
      this.keyword = ''
    }
  },
  computed: {
    ...mapGetters(['getAllCourses'])
  },
  mounted () {
    this.allCourse = this.getAllCourses
  }
}
</script>
