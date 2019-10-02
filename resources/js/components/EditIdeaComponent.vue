<template>
  <div>
    <b-modal id="bv-modal-example" ref="modal" hide-footer>
      <template v-slot:modal-title>
        <code>Edit your Idea</code>
      </template>
      <div class="d-block text-center">
        <div v-for="idea in this.ideaArray" :key="idea.id" :id="idea.id" class="submit">
          <b-form-input id="title" v-model="idea.title" placeholder="Enter your name"></b-form-input>
          <b-form-textarea
            id="description"
            v-model="idea.description"
            placeholder="Enter something..."
            rows="3"
            max-rows="6"
          ></b-form-textarea>
        </div>
      </div>
      <b-button class="mt-1" @click="save()">Save</b-button>
      <b-button class="mt-1" @click="close()">Cancel</b-button>
    </b-modal>
  </div>
</template>



<style lang="scss">
.close {
  display: none;
}

.form-control {
  margin-bottom: 20px;
}
</style>


<script>
export default {
  props: ["editidea"],
  data() {
    return {
      title: "",
      description: "",
      ideaArray: "",
      ideaId: ""
    };
  },
  mounted() {
    this.$refs["modal"].show();
    let vm = this;
    vm.$nextTick(function() {
      vm.ideaArray = JSON.parse(vm.editidea); // Parse ideas to read as an array in vue
    });
  },
  methods: {
    close() {
      this.$refs["modal"].hide();
      window.history.go(-1);
    },
    save() {
      // send data to submit
      const axios = require("axios");
      let currentObj = this;
      axios
        .post("/home/myideas", {
          title: $("#title").val(),
          description: $("#description").val(),
          id: $("div.submit").attr("id")
        })
        .then(function(response) {
          alert("Changes are saved!");
          window.history.go(-1);
          currentObj.output = response.data;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
      this.$refs["modal"].hide();
      // window.history.go(-1);
    }
  }
};
</script>
