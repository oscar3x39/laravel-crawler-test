<template>
  <v-form v-model="valid">
    <v-container>

      <v-row>
        <v-col
          cols="12"
          md="12"
        >
          <v-toolbar>
            <v-text-field
              v-model="urlString"
              placeholder="Enter Url"
              :rules="urlRules"
              hide-details
              prepend-icon="mdi-application-outline"
            ></v-text-field>

            <v-btn icon @click="postUrl">
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
          </v-toolbar>

        </v-col>
      </v-row>

      <!-- loading -->
      <div class="text-center loading" v-show="loading">
        <v-progress-circular
          indeterminate
          color="primary"
        ></v-progress-circular>
      </div>

      <!-- detail -->
      <v-card
          class="mx-auto my-12"
          max-width="100%"
          v-show="submit && !loading"
        >
          <template slot="progress">
            <v-progress-linear
              color="deep-purple"
              height="10"
              indeterminate
            ></v-progress-linear>
          </template>
          <v-img
            width="700"
            :src="`/api/crawler/image/${imageUrl}`"
          ></v-img>
          <v-card-title>Title: {{ title }}</v-card-title>
          <v-card-text>Description: {{ description }}</v-card-text>
      </v-card>

    </v-container>
  </v-form>
</template>

<script>
  export default {
    axios: {
      credentials: true,
      proxy: true,
      debug: process.env.NODE_ENV !== 'production',
    },
    data () {
      return {
        submit: false,
        // detail
        title: "",
        description: "",
        imageUrl: "",
        loading: false,
        // input crawler
        valid: false,
        urlString: 'http://google.com',
        urlRules: [
          (value) => !!value || "Required.",
          (value) => this.isURL(value) || "URL is not valid",
          this.valid = true,
        ],
      }
    },
    methods: {
      isURL(str) {
        let url;

        try {
          url = new URL(str);
        } catch (_) {
          return false;
        }

        return url.protocol === "http:" || url.protocol === "https:";
      },
      async postUrl() {
        this.submit = true
        this.loading = true

        if (this.valid == false) {
          return false;
        }

        const res = await this.$axios.post('/api/crawler/action', {
          url: this.urlString
        });

        this.title = res.data.title
        this.description = res.data.description
        this.imageUrl = res.data.screenshot
        this.loading = false
      }
    },
  }
</script>

<style>
.loading {
  padding-top: 100px;
}
</style>