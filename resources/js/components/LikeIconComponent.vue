<template>
  <div :ideaid="ideaid" v-bind:class="this.ismyidea==='1'?'myIdeasviewLike':'likeButton'">
    <font-awesome-icon
      icon="thumbs-up"
      :ideaid="ideaid"
      v-bind:class="(this.currentlikestatus===1  &&this.isthismyidea===1) ?'alreadyLiked':'notLiked'"
      @click="likeClicked(ideaid)"
    />
    &nbsp;&nbsp;{{this.numberLikes}}
  </div>
</template>

<script>
export default {
  props: ["ismyidea", "likes", "likestatus", "ideaid", "myideaid"],
  data() {
    return {
      numberLikes: this.likes,
      currentlikestatus: this.likestatus,
      isthismyidea: ""
    };
  },

  beforeMount() {
    for (let i = 0; i < this.myideaid.length; i++) {
      if (this.myideaid[i]["id"] === this.ideaid) {
        this.isthismyidea = 1;
        this.currentlikestatus = this.myideaid[i]["likeStatus"];
      }
    }
  },
  methods: {
    likeClicked: function(clickedCardId) {
      if (this.currentlikestatus === 0) {
        this.currentlikestatus = 1;
      } else if (this.currentlikestatus === 1) {
        this.currentlikestatus = 0;
      }

      const axios = require("axios");
      let currentObj = this;
      axios
        .post("/home/idea/" + clickedCardId, {
          cardId: clickedCardId,
          likestatus: this.currentlikestatus
        })
        .then(function(response) {
          currentObj.numberLikes = response.data;
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
.myIdeasviewLike {
  margin-top: -10%;
  margin-left: 7%;
}
.likeButton {
  margin-left: 5%;
  margin-top: -12%;
  padding: 2%;
  font-size: 15px;
}
.alreadyLiked {
  color: green;
}

svg.svg-inline--fa.fa-thumbs-up.fa-w-16:hover {
  cursor: pointer;
}
</style>