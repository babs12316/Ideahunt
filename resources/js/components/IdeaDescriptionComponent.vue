<template>
    <div>
      <p :ideaId="this.ideaId" class="idea-description">{{this.description}}</p>
    </div>
</template>

<script>
    export default {
        props:["description","ideaId"]
    }
</script>

<style lang="scss" scoped>
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
  @include multiLineEllipsis(
    $lineHeight: 1.2em,
    $lineCount: 3,
    $bgColor: #fff
  );
}

</style>