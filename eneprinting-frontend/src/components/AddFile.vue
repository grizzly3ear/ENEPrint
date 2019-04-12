<template>
  <v-app>
    <v-content>
      <v-layout justify-center wrap>
        <v-flex md1>
          <AddFileModal />
        </v-flex>
      </v-layout>
      <v-layout justify-center>
        <v-flex>
          <FileList />
        </v-flex>
      </v-layout>
    </v-content>
  </v-app>
</template>
<script>
import AddFileModal from './AddFileModal'
import FileList from './FileList'
import { mapGetters, mapActions } from 'vuex'
export default {
  name: 'addFile',
  data: () => ({
  }),
  components: {
    AddFileModal,
    FileList
  },
  computed: {
    ...mapGetters([
      'getFiles'
    ])
  },
  methods: {
    ...mapActions([
      'setFiles'
    ])
  }
}
</script>
