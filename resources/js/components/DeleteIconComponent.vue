<template>
  <div>
    <a
      :href="deleteurl"
      class="deleteIcon"
      v-b-modal="'my-modal-delete'+this.ideaid"
      :ideaid="this.ideaid"
      v-if="this.ismyidea==='1'"
    >
      <font-awesome-icon icon="trash" />
    </a>
    <b-modal
      :id="'my-modal-delete'+this.ideaid"
      ref="modal-delete"
      :ideaid="this.ideaid"
      hide-footer
    >
      <template v-slot:modal-title>
        <code>Are you sure, you want to delete this idea?</code>
      </template>
      <b-button class="mt-1" @click="deleteClicked(ideaid)">Yes, I am sure!</b-button>
      <b-button class="mt-1" @click="close()">Cancel</b-button>
    </b-modal>
  </div>
</template>

<script>
export default {
  props: ["ismyidea", "ideaid"],
  data() {
    return {
      deleteurl: "#"
    };
  },

  methods: {
    close() {
      this.$refs["modal-delete"].hide();
      window.history.go(-1);
    },
    deleteClicked: function(clickedCardId) {
      this.deleteurl = "/home/myideas/delete/" + clickedCardId;
      // send data to submit

      const axios = require("axios");
      let currentObj = this;
      axios
        .post("/home/myideas/delete/" + clickedCardId, {
          cardId: clickedCardId
        })
        .then(function(response) {
          window.location.replace("/home/myideas");
          // location.reload();
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
.deleteIcon {
  color: #000;
  float: left;
  font-size: 15px;
  margin-right: 30px;
}
</style>