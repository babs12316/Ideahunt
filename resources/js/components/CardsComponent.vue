<template>
  <div>
      <!-- Read ideas array & pass title and description to Card component -->
    <div v-for="idea in this.ideaArray" :key="idea.id">
         <card-component :title="idea.title" :description="idea.description" :cardId="idea.id"></card-component>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "ideas"],
  data: function() {
    return {
      ideaArray: ""
    };
  },
  mounted() {
    let vm = this;
    vm.$nextTick(function() {
        vm.ideaArray=JSON.parse(vm.ideas);  // Parse ideas to read as an array in vue
      });
  }
};
</script>

<style lang="scss" scoped>
</style>