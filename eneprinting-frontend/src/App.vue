<template>
  <v-app>
    <v-toolbar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>ENE Printing </span>
        <v-progress-circular
          indeterminate
          v-show='getLoading'
          color="primary"
        ></v-progress-circular>
      </v-toolbar-title>
    </v-toolbar>
      <router-view></router-view>
  </v-app>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  name: 'App',
  components: {
  },
  data () {
    return {
      //
    }
  },
  computed: {
    ...mapGetters([
      'getLoading'
    ])
  }
}
</script>
