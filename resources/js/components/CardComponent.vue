<template>
  <div>
    <div class="idea" :ideaid="ideaid" @click="cardClicked($event)">
      <editicon-component :ismyidea="this.isthismyidea" :ideaid="ideaid"></editicon-component>
      <deleteicon-component :ismyidea="this.ismyidea" :ideaid="ideaid"></deleteicon-component>
      <a :href="url" :ideaid="ideaid">
        <ideatitle-component :title="this.title" :ideaid="ideaid" :ismyidea="this.ismyidea"></ideatitle-component>
        <ideadescription-component :ideaid="ideaid" :description="this.description"></ideadescription-component>
      </a>
    </div>

    <likeicon-component
      :ideaid="ideaid"
      :myideaid="this.myideaid"
      :ismyidea="this.ismyidea"
      :likestatus="this.likestatus"
      :likes="this.likes"
    ></likeicon-component>
  </div>
</template>   

<script>
export default {
  props: [
    "title",
    "description",
    "ideaid",
    "likes",
    "ismyidea",
    "likestatus",
    "myideaid",
    "isthismyidea"
  ],
  data() {
    return {
      url: "#",
      numberLikes: this.likes,
      editurl: "#",
      currentLikeStatus: this.likeStatus
    };
  },
  methods: {
    cardClicked: function(event) {
      // alert("i am clicked"+event.target.getAttribute('ideaId'));
      console.log(event.target.getAttribute("ideaid"));
      const axios = require("axios");
      let currentObj = this;
      let clickedCardId = event.target.getAttribute("ideaid");
      this.url = "/home/idea/" + clickedCardId;
      axios
        .get("/home/?id=" + clickedCardId)
        .then(function(response) {
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
.hide {
  display: none;
}
.show {
  display: inherit;
}
.idea {
  padding: 2%;
  margin: 5%;
  z-index: -1;
  position: inherit;
  padding-bottom: 5%;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.idea span {
  margin-right: 5%;
}
.idea a {
  text-align: left;
  color: #000;
}
.idea a:nth-child(2) {
  margin-left: 5%;
  margin-top: -2.7%;
}

.idea:hover {
  cursor: pointer;
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}
.like {
  margin-left: 7%;
  margin-top: -9%;
}
.like:hover {
  cursor: pointer;
}

.myIdeasviewTitle {
  margin-top: 2%;
}
.myIdeasviewLike {
  margin-top: -10%;
}
svg.svg-inline--fa.fa-thumbs-up.fa-w-16 {
  font-size: 20px;
}

.idea a:hover {
  text-decoration: none;
}
@mixin multiLineEllipsis($lineHeight: 1.2em, $lineCount: 1, $bgColor: #fff) {
  overflow: hidden;
  position: relative;
  line-height: $lineHeight;
  max-height: $lineHeight * $lineCount;
  text-align: left;
  margin-right: 0em;
  padding-right: 1em;
  &:before {
    content: "...";
    position: absolute;
    right: 1em;
    bottom: 0;
    background: $bgColor;
  }
  &:after {
    content: "";
    position: absolute;
    right: 0;
    width: 1em;
    height: 1em;
    margin-top: 0.2em;
    background: $bgColor;
  }
}

@media (min-width: 992px) {
  .idea-description {
    line-height: 3.7em !important;
  }
}

.idea-description {
  @include multiLineEllipsis($lineHeight: 1.2em, $lineCount: 3, $bgColor: #fff);
}

@media (max-width: 992px) {
  .idea {
    padding-bottom: 10%;
  }
  .like {
    margin-left: 7%;
    margin-top: -14%;
  }
}
</style>