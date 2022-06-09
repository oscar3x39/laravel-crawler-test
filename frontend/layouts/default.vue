<template>
  <v-app>
    <Nuxt />
    <v-footer>
      <span>crawler-test &copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: 'DefaultLayout',
  data () {
    return {
      title: 'Vuetify.js'
    }
  }
}
</script>
<style>
.v-application a {
  text-decoration: none;
  color: black;
}
</style>