<template>
  <v-app>
    <v-content fluid>
      <v-layout row wrap align-center fill-height>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Username'
            v-model='username'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='ชื่ออาจารย์'
            v-model='name'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='นามสกุลอาจารย์'
            v-model='surname'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='E-mail'
            v-model='email'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Password'
            v-model='password'
            type='password'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Confirm Password'
            v-model='confirmPassword'
            type='password'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md6 md3>
          <v-btn color="primary" @click.native='onRegister'>Ok</v-btn>
          <router-link to="/">
            <v-btn color="primary">Cancel</v-btn>
          </router-link>
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
import axios from '@/utils/axios'
import { mapActions } from 'vuex'
export default {
  name: 'register',
  data: () => ({
    username: '',
    password: '',
    name: '',
    surname: '',
    email: '',
    confirmPassword: ''
  }),
  component: {},
  methods: {
    ...mapActions(['setUserId']),
    async onRegister () {
      console.log('in progress...')
      if (this.password === this.confirmPassword && this.password.length > 7) {
        console.log('pass')
        const { data } = await axios.post('api/register', {
          username: this.username,
          password: this.password,
          name: this.name,
          surname: this.surname,
          email: this.email
        })
        if (data) {
          this.setUserId(data.id)
          this.$router.push('/home')
        }
      }
    }
  }
}
</script>
