<template>
  <v-app>
    <v-content fluid>
      <v-layout row wrap align-center fill-height>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Username ขั้นต่ำ 8 ตัว'
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
            label='Password ขั้นต่ำ 8 ตัว'
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
import swal from 'sweetalert'
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
    ...mapActions([
      'setUserId',
      'setLoading'
    ]),
    async onRegister () {
      this.setLoading(true)
      if (this.username.trim() === '' ||
          this.name.trim() === '' ||
          this.surname.trim() === '' ||
          this.email.trim() === '' ||
          this.password.trim() === '' ||
          this.confirmPassword.trim() === '') {
        this.setLoading(false)
        swal('ผลการสมัคร', 'กรุณากรอกข้อมูลให้ครบถ้วน', 'error')
        return
      }
      if (this.username.trim().length < 8) {
        swal('ผลการสมัคร', 'username ต้องมีขนาดขั้นต่ำ 8 ตัวอักษร', 'error')
        this.setLoading(false)
        return
      }
      if (this.password.trim().length < 8) {
        swal('ผลการสมัคร', 'password ต้องมีขนาดขั้นต่ำ 8 ตัวอักษร', 'error')
        this.setLoading(false)
        return
      }
      if (this.password === this.confirmPassword) {
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
          this.setLoading(false)
        }
        this.setLoading(false)
      } else {
        swal('ผลการสมัคร', 'password และ confirm password ไม่ตรงกัน', 'error')
        this.setLoading(false)
      }
    }
  }
}
</script>
