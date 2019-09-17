<template>
  <div>
  
  
      <!-- Read ideas array & pass title and description to Card component -->
  
    <div v-for="idea in this.ideaArray" :key="idea.id">
          
         <card-component :title="idea.title"  :description="idea.description" :cardId="idea.id" :likes="idea.likes" :myIdeas="myideas" :likeStatus="likeArray"></card-component>
      
    </div>
    
  </div>
</template>

<script>
export default {
  props: ["title", "ideas","myideas","likestatus"],
  data: function() {
    return {
      ideaArray: "",
      likeArray:""
      };
  },
  mounted() {
   // alert("props array is"+this.likestatus);
    let vm = this;
    vm.$nextTick(function() {
        vm.ideaArray=JSON.parse(vm.ideas);  // Parse ideas to read as an array in vue
         vm.likeArray=JSON.parse(vm.likestatus);
        
      });
  }
};
</script>

<style lang="scss" scoped>
</style>