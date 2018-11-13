<template>
  <v-app>
    <v-content fluid>
      <v-layout row wrap align-center fill-height>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Username'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='ชื่ออาจารย์'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='นามสกุลอาจารย์'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Citizen ID'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='E-mail'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Password'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md4 md4>
          <v-text-field
            label='Confirm Password'
          ></v-text-field>
        </v-flex>
        <v-flex offset-md6 md3>
          <router-link to="/home">
            <v-btn color="primary">Ok</v-btn>
          </router-link>
          <router-link to="/">
            <v-btn color="primary">Cancel</v-btn>
          </router-link>
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
export default {
  name: 'register',
  component: {}
}
</script>
