<template>
  <div>
    <b-modal id="cardDetailModal" ref="cardDetailModal" hide-footer>
      <template v-slot:modal-title>
        <ideatitle-component :title="title"></ideatitle-component>
      </template>
      <div class="d-block text-center">
        <ideadescription-component
          :ideaid="ideaid"
          :description="this.description"
          class="idea-description-detail"
        ></ideadescription-component>
      </div>
      <likeicon-component
        :ideaid="this.id"
        :myideaid="this.id"
        ismyidea="1"
        :likestatus="this.like[0]"
        :likes="this.likes"
        v-bind:class="this.like[0]===1  ?'alreadyLiked':'notLiked'"
      ></likeicon-component>
       <b-button class="mt-3" block @click="$bvModal.hide('cardDetailModal');close();">Close (X)</b-button>
    </b-modal>
  </div>
</template>

<script>
export default {
  props: ["id", "title", "description", "likes", "likestatus"],
  data: function() {
    //ismyidea- to check if user is checking own ideas
    return {
      like: ""
    };
  },
  mounted() {
    let vm = this;
    vm.$nextTick(function() {
      vm.like = JSON.parse(vm.likestatus); // Parse php array to read as an array in vue
    });

    this.$refs["cardDetailModal"].show();
  },
  methods: {
    close: function() {
     window.history.go(-1);
    }
  }
};
</script>

<style scoped lang="scss">
#cardDetailModal button.close {
  display: none !important;
}
#cardDetailModal p {
  text-align: left;
}
.alreadyLiked {
  color: green;
  margin-top: 3% !important;
    margin-left: 1% !important;
}
.notLiked{
    margin-top: 3% !important;
    margin-left: 1% !important;
}
</style>