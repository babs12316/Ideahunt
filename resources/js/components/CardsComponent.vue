<template>
  <div>
  

      <!-- Read ideas array & pass title and description to Card component -->

    <h2> My idea array is {{this.myideasArray}} </h2>
  
    <div v-for="idea in this.ideaArray"   :count="count++" :key="idea.id">
      
         
        <card-component :title="idea.title"  :description="idea.description" :myideaid="myideasArray" :ismyidea="ismyidea" :cardId="idea.id" :likes="idea.likes"  :likestatus="likeArray[count]" ></card-component>
  
     
     </div>
    
  </div>
</template>

<script>
export default {
  props: ["title", "ideas","ismyidea","likestatus","myideas"],
  data: function() {
    return {
      ideaArray: "",
      likeArray:"",
      myideasArray:"",
      count:-1, // To pass status of likes for each idea seperately
      test:"",
      testcount:0
    
      };
  },
  mounted() {
   // alert("props array is"+this.likestatus);
    let vm = this;
    vm.$nextTick(function() {
        vm.ideaArray=JSON.parse(vm.ideas);  // Parse ideas to read as an array in vue
         vm.likeArray=JSON.parse(vm.likestatus);
        vm.myideasArray=JSON.parse(vm.myideas);
      
      });
  }
};
</script>

<style lang="scss" scoped>
</style>