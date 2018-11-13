<template>
  <v-app>
    <v-content>
      <v-layout justify-center wrap>
        <v-flex md5>
          <v-text-field
            label='วิชาที่สอน 1'
            disabled
            value='ENE123'
          ></v-text-field>
        </v-flex>
        <v-flex md1>
          <v-btn
            color='primary'
          >
            edit
          </v-btn>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md5>
          <v-text-field
            label='วิชาที่สอน 2'
            disabled
            value='ENE123'
          ></v-text-field>
        </v-flex>
        <v-flex md1>
          <v-btn
            color='primary'
          >
            edit
          </v-btn>
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex md5>
          <v-text-field
            label='วิชาที่สอน 3'
            disabled
            value='ENE123'
          ></v-text-field>
        </v-flex>
        <v-flex md1>
          <v-btn
            color='primary'
          >
            edit
          </v-btn>
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
export default {
  name: 'editCourse'
}
</script>
