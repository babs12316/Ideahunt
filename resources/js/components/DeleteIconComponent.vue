<template>
  <div>
    <a :href="deleteurl" class="deleteIcon" :ideaid="this.ideaid" v-if="this.ismyidea==='1'">
      <font-awesome-icon icon="trash"  @click="deleteClicked($event)" />
    </a>
  </div>
</template>

<script>
export default {
  props: ["ismyidea", "ideaid"],
  data() {
    return {
      deleteurl: "#"
    };
  },

  methods: {
    deleteClicked: function(event) {
      let clickedCardId = event.target.parentElement.parentElement.getAttribute(
        "ideaid"
      );
      //alert("card clicked is"+clickedCardId);
      this.deleteurl = "/home/myIdeas/delete/" + clickedCardId;
      // send data to submit
      const axios = require("axios");
      let currentObj = this;
      axios
        .post("/home/myIdeas/delete/" + clickedCardId, {
          cardId: clickedCardId
        })
        .then(function(response) {
          location.reload();
          currentObj.output = response.data;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.deleteIcon{
  color: #000;
    float: left;
    font-size: 15px;
    margin-right: 30px;
}
</style>