<template>
  <v-row>
    <div class="container">
      <v-col cols="12" sm="4">
        <Menu class="menu" :hover="'crawler'" />
      </v-col>
      <v-col>
        <Form />
      </v-col>
    </div>
  </v-row>
</template>

<script>
export default {
  name: 'IndexPage',
  data() {
    return {

    }
  }
}
</script>

<style scoped>
.container {
  display:flex;
}
.menu {
  float:left;
}
</style>