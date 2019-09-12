<template>
  <div>
    <b-modal id="cardDetailModal" ref="cardDetailModal" hide-footer>
      <template v-slot:modal-title>
     <h2> {{title}} </h2>
      </template>
      <div class="d-block text-center">
        <p>{{description}}</p>
      </div>
       <font-awesome-icon icon="thumbs-up" />&nbsp;&nbsp;{{this.likes}}
      <b-button class="mt-3" block @click="$bvModal.hide('cardDetailModal');close();">Close (X)</b-button>
    </b-modal>
  </div>
</template>

<script>
export default {
  props: ["title", "description","likes"],
  mounted() {
    this.$refs["cardDetailModal"].show();
  },
  methods: {
    close: function() {
     window.history.go(-1);
    }
  }
};
</script>

<style lang="scss">
#cardDetailModal button.close {
  display: none !important;
}
#cardDetailModal p{
    text-align: left;
}

</style>