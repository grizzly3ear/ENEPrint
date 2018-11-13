<template>
  <v-app>
    <v-content>
      <v-layout justify-center row wrap>
        <v-flex md3>
          <v-text-field
            label='ชื่ออาจารย์'
            disabled
            value='Somsak'
          ></v-text-field>
        </v-flex>
        <v-flex md3>
          <v-text-field
            label='นามสกุลอาจารย์'
            disabled
            value='Saksom'
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md6>
          <v-text-field
            label='E-mail'
            disabled
            value='test@gmail.com'
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
  name: 'profile'
}
</script>
