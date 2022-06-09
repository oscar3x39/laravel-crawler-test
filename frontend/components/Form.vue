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
        valid: false,
        urlString: '',
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

        if (this.valid == false) {
          return false;
        }

        const res = await this.$axios.post('/api/crawler', {
          url: this.urlString
        })

        console.log(res)
      }
    },
  }
</script>