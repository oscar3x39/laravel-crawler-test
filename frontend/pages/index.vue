<template>
  <v-row>
    <v-col cols="12" sm="2">
      <Menu class="menu" :hover="'crawler'"></Menu>
    </v-col>
    <v-col>
      <Form></Form>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'IndexPage',
  data() {
    return {
      
    }
  },
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