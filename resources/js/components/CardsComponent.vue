<template>
  <div>
    <!-- Read ideas array & pass title and description to Card component -->
    <!--props: title-idea title, description: idea description-->
    <div v-for="idea in this.ideaArray" :count="count++" :key="idea.id">
      <card-component
        :title="idea.title"
        :description="idea.description"
        :myideaid="myideasArray"
        :ismyidea="ismyidea"
        :ideaid="idea.id"
        :likes="idea.likes"
        :likestatus="likeArray[count]"
        :isthismyidea="ismyidea"
      ></card-component>
    </div>
  </div>
</template>

<script>
export default {
  props: ["ideas", "likestatus", "myideas", "ismyidea"], // ideas- array of all users ideas,likestatus- array of status of likes for logged in user, myideas-array of ideas for logged in user
  data: function() {
    //ismyidea- to check if user is checking own ideas
    return {
      ideaArray: "",
      likeArray: "",
      myideasArray: "",
      count: -1, // To pass status of likes for each idea seperately
      test: "",
      testcount: 0
    };
  },
  mounted() {
    // alert("props array is"+this.likestatus);
    let vm = this;
    vm.$nextTick(function() {
      vm.ideaArray = JSON.parse(vm.ideas); // Parse php array to read as an array in vue
      vm.likeArray = JSON.parse(vm.likestatus);
      vm.myideasArray = JSON.parse(vm.myideas);
    });
  }
};
</script>

<style lang="scss" scoped>
</style>