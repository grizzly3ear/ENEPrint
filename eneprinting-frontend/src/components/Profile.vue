<template>
  <v-app>
    <v-content>
      <v-layout justify-center row wrap>
        <v-flex md3>
          <v-text-field
            label='ชื่ออาจารย์'
            disabled
            v-model='user.profile.name'
          ></v-text-field>
        </v-flex>
        <v-flex md3>
          <v-text-field
            label='นามสกุลอาจารย์'
            disabled
            v-model='user.profile.surname'
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md4>
          <v-text-field
            label='E-mail'
            disabled
            v-model='user.profile.email'
          ></v-text-field>
        </v-flex>
        <v-flex md2>
          <v-text-field
            label='Remain money'
            disabled
            v-model='user.remain_money'
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout justify-center v-for='(course) in getCourses' :key="course.id">
        <v-flex md6>
          <v-text-field
            v-bind:label="$t(`${course.code} ชั้นปีที่ ${course.year}`)"
            disabled
            v-model='course.name'
          >
          </v-text-field>
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  name: 'profile',
  props: ['user'],
  data: () => ({
    courses: []
  }),
  computed: {
    ...mapGetters(['getCourses'])
  },
  methods: {
    $t (value) {
      return value
    }
  },
  mounted () {

  }
}
</script>
