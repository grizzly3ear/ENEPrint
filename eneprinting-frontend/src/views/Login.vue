<template>
  <v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip right>
                  <span>Codepen</span>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" name="username" v-model='username' label="Login" type="text"></v-text-field>
                  <v-text-field id="password" prepend-icon="lock" name="password" v-model='password' label="Password" type="password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click='onLoginPress'>Login</v-btn>

                <router-link to="/register">
                  <v-btn color="primary">Register</v-btn>
                </router-link>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import axios from '@/utils/axios'
export default {
  name: 'login',
  data: () => ({
    username: '',
    password: ''
  }),
  methods: {
    ...mapActions(['setUserId']),
    async onLoginPress () {
      const { data } = await axios.post('api/login', {
        username: this.username,
        password: this.password
      })
      if (data > 0) {
        this.setUserId(data)
        this.$router.push('/home')
      }
    }
  },
  computed: {
    ...mapGetters(['getUserId'])
  }
}
</script>
