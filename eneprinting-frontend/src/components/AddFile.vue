<template>
  <v-app>
    <v-content>
      <v-layout justify-center wrap>
        <v-flex md5>
          <v-text-field
            label='เลือกไฟล์'
            disabled
            value='ENE123'
          ></v-text-field>
        </v-flex>
        <v-flex md1>
          <v-btn
            color='primary'
          >
            Add
          </v-btn>
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
export default {
  name: 'addFile'
}
</script>
