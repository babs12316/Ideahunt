<template>
  <div class="card">
    <h2 class="card-title">{{this.title}}</h2>
    <p class="card-description">
      {{this.description}}
    </p>
    <div>
      <span>
        <font-awesome-icon icon="comment" />
      </span>
      <span>
        <font-awesome-icon icon="thumbs-up" />&nbsp;&nbsp;50
      </span>
    </div>
  </div>
</template>

<script>
export default {
  props:['title','description']
};
</script>

<style lang="scss" scoped>
.card {
  padding: 2%;
  margin: 5%;
}
.card span {
  margin-right: 5%;
}
@mixin multiLineEllipsis($lineHeight: 1.2em, $lineCount: 1, $bgColor: white) {
  overflow: hidden;
  position: relative;
  line-height: $lineHeight;
  max-height: $lineHeight * $lineCount;
  text-align: left;
  margin-right: -1em;
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
.card-description {
  @include multiLineEllipsis(
    $lineHeight: 1.2em,
    $lineCount: 3,
    $bgColor: white
  );
}
</style>