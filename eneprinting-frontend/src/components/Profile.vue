<template>
  <v-app>
    <v-content>
      <v-layout justify-center row wrap>
        <v-flex md3>
          <v-text-field
            label='ชื่ออาจารย์'
            disabled
            v-model='user.name'
          ></v-text-field>
        </v-flex>
        <v-flex md3>
          <v-text-field
            label='นามสกุลอาจารย์'
            disabled
            v-model='user.surname'
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md6>
          <v-text-field
            label='E-mail'
            disabled
            v-model='user.email'
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md6>
          <v-text-field
            label='วิชาที่สอน 1'
            disabled
            value='ENE123'
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md6>
          <v-text-field
            label='วิชาที่สอน 2'
            disabled
            value='ENE123'
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md6>
          <v-text-field
            label='วิชาที่สอน 3'
            disabled
            value='ENE123'
          ></v-text-field>
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
export default {
  name: 'profile',
  props: ['user']
}
</script>
