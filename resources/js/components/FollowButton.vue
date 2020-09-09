<template>
  <button class="btn btn-primary ml-3" @click="followUser" v-text="buttonText"></button>
</template>

<script>
export default {

  props: ["userId", "follows"],

  mounted() {},

    data: function(){
        return {
            // "follows" pass passed as a property by profiles/index.blade.php
            status: this.follows,
        }
    },

  methods: {
    followUser() {
      // Send post request to api.
      axios.post("/follow/" + this.userId).then((response) => {
          this.status = ! this.status; // toggle the state of status for the re-render;
      }). catch(errors => {
          // If the error is a 401 : unauthrozied, redirect to the login page.
          if (errors.response.status == 401){
              window.location = '/login';
          }
      });
    },
  },

  computed: {
      buttonText() {
          return(this.status) ? "Unfollow" : "Follow";
      }
  },

};
</script>
