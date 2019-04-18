<template>
  <v-app>
    <v-container>
      <v-img
        v-bind:src="`${image}`"
        width='100%'
      >
      </v-img>
    </v-container>
      <div
      >
        <router-view></router-view>
      </div>
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
      image: require('./assets/banner.png')
    }
  },
  computed: {
    ...mapGetters([
      'getLoading'
    ])
  }
}
</script>
