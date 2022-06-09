<template>
    <v-card
        height="100%"
        width="100%"
      >
        <v-navigation-drawer
          height="100%"
          width="100%"
          floating
          left
          permanent
        >
          <template v-slot:prepend>
            <v-list-item two-line>
              <v-list-item-avatar>
                <img src="https://randomuser.me/api/portraits/women/81.jpg">
              </v-list-item-avatar>

              <v-list-item-content>
                <v-list-item-title>Adminstrator</v-list-item-title>
                <v-list-item-subtitle>Logged In</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </template>
          <v-divider></v-divider>
          <v-list
            dense
            nav
          >
            <v-list-item
              v-for="item in items"
              :key="item.title"
              link
            >
              <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content @click="open(item.link)">
                <v-list-item-title>
                  {{ item.title }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
      </v-card>
</template>

<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Crawler', icon: 'mdi-snake', link: '/' },
          { title: 'List', icon: 'mdi-format-list-bulleted', link: '/list' },
        ],
        right: null,
      }
    },
    methods: {
      open(link) {
        this.$router.push(link)
      },
    },
    props: [
      'hover'
    ]
  }
</script>

<style>
.menu-hover {
  color: white;
  background: black;
}
</style>