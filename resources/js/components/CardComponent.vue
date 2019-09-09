<template>
  <div class="card" :id="cardId">
    <a href="#" v-on:click="detail">
      <h2 class="card-title">{{this.title}}</h2>
      <p class="card-description">{{this.description}}</p>
      <font-awesome-icon icon="comment" />&nbsp;&nbsp;10
    </a>
    <div>
      <div class="like">
        <font-awesome-icon icon="thumbs-up" />&nbsp;&nbsp;50
      </div>
    </div>
    <card-detail-component :class="hideDetailView" :title="title" :description="description"></card-detail-component>
  </div>
</template>


<script>
export default {
  props: ["title", "description", "cardId"],
  data() {
    return {
     hideDetailView: "hide"
    };
  },
  methods: {
    detail: function(event) {
      if (this.hideDetailView == "hide") {
        this.hideDetailView = "show";
      } else {
        this.hideDetailView = "hide";
      }
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
.card {
  padding: 2%;
  margin: 5%;
}
.card span {
  margin-right: 5%;
}
.card a {
  text-align: left;
  color: #000;
}
.card:hover {
  cursor: pointer;
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}
.like {
  margin-left: 75px;
  margin-top: -23px;
}
.card a:hover {
  text-decoration: none;
}
@mixin multiLineEllipsis($lineHeight: 1.2em, $lineCount: 1, $bgColor: white) {
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
  .card-description {
    line-height: 3.7em !important;
  }
}

.card-description {
  @include multiLineEllipsis(
    $lineHeight: 1.2em,
    $lineCount: 3,
    $bgColor: white
  );
}
</style>