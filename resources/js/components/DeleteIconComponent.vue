<template>
  <div>
    <a :href="deleteurl" class="deleteIcon" :ideaId="this.ideaId" v-if="this.ismyidea==='1'">
      <font-awesome-icon icon="trash" :ideaId="cardId" @click="deleteClicked($event)" />
    </a>
  </div>
</template>

<script>
export default {
  props: ["ismyidea", "ideaId"],
  data() {
    return {
      deleteurl: "#"
    };
  },

  methods: {
    deleteClicked: function(event) {
      let clickedCardId = event.target.parentElement.parentElement.getAttribute(
        "ideaId"
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