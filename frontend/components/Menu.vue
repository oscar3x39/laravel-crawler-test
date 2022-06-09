<template>
    <v-card
        height="400"
        width="256"
        class="mx-auto"
      >
        <v-navigation-drawer permanent>
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

              <v-list-item-content>
                <v-list-item-title :class="hover == item.title ? 'menu-hover' : ''">
                  <a :href="item.link">
                    {{ item.title }}
                  </a>
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