<template>
  <v-row>
    <div class="container">
      <v-col cols="12" sm="4">
        <Menu class="menu" :hover="'crawler'" />
      </v-col>
      <v-col>
        <!-- <v-data-table
          :headers="headers"
          :items="desserts"
          :items-per-page="5"
          class="elevation-1"
        ></v-data-table> -->

        <v-data-table
          :headers="headers"
          :items="items"
          :items-per-page="5"
        >
          <template v-slot:item.imageUrl="{ item }">
            <a :href="`/api/crawler/image/${item.imageUrl}`" target="_blank">
              <img :src="`/api/crawler/image/${item.imageUrl}`" style="width: 300px;">
            </a>
          </template>
        </v-data-table>

      </v-col>
    </div>
  </v-row>
</template>

<script>
  export default {
    axios: {
      credentials: true,
      proxy: true,
      debug: process.env.NODE_ENV !== 'production',
    },
    async mounted() {
      let res = await this.$axios.get('/api/crawler/list');
      this.items = res.data;
    },
    data () {
      return {
        headers: [
          { text: 'Title', value: 'title' },
          { text: 'Descrption', value: 'description' },
          { text: 'Screenshot', value: 'imageUrl' },
          { text: 'Datetime', value: 'created_at' },
        ],
        items: [
        //   {
        //     title: '',
        //     description: '',
        //     imageUrl: '',
        //     created_at: '',
        //   },
        ],
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