<template>
  <div>
    <div class="addIcon">
      <font-awesome-icon
        icon="plus-circle"
        title="Add your own idea"
        class="icon alt"
        v-b-modal.modal-prevent-closing
      />
    </div>
    <b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Submit Your Idea"
      @show="resetModal"
      @hidden="resetModal"
      @ok="submit"
    >
      <form @submit.prevent="submit">
        <b-form-group id="title-input-group" label="Title" label-for="title">
          <b-form-input
            placeholder="Enter title of your idea"
            :class="{ 'form-group--error': $v.title.$error }"
            v-model.trim="$v.title.$model"
          ></b-form-input>
        </b-form-group>
        <div class="error" v-if="submitStatus==='ERROR'&&!$v.title.required">Title is required</div>
        <div
          class="error"
          v-if="!$v.title.minLength"
        >Title must have at least {{$v.title.$params.minLength.min}} letters.</div>
        <div
          class="error"
          v-if="!$v.title.maxLength"
        >Title can have at maximum {{$v.title.$params.maxLength.max}} letters.</div>
        <b-form-group id="description-input-group" label="Description" label-for="Description">
          <b-form-textarea
            placeholder="Describe your idea here..."
            rows="3"
            max-rows="6"
            :class="{ 'form-group--error': $v.description.$error }"
            v-model.trim="$v.description.$model"
          ></b-form-textarea>
        </b-form-group>
        <div
          class="error"
          v-if="submitStatus==='ERROR'&&!$v.description.required"
        >Description is required</div>
        <div
          class="error"
          v-if="!$v.description.minLength"
        >Description must have at least {{$v.description.$params.minLength.min}} letters.</div>
        <div
          class="error"
          v-if="!$v.description.maxLength"
        >Description can have at maximum {{$v.description.$params.maxLength.max}} letters.</div>
      </form>
    </b-modal>
  </div>
</template>
<style lang="scss" scoped>
.addIcon {
  position: inherit;
  float: right;
  margin-top: -66px;
  font-size: 30px;
  color: green;
}
.addIcon:hover {
  cursor: pointer;
}
.error {
  color: red;
}
</style>
<script>
import { required, minLength, maxLength } from "vuelidate/lib/validators";
export default {
  data() {
    return {
      title: "",
      description: "",
      submittedTitle: "",
      submittedDescription: "",
      submitStatus: null
    };
  },
  validations: {
    title: {
      required,
      minLength: minLength(4),
      maxLength: maxLength(50)
    },
    description: {
      required,
      minLength: minLength(100),
      maxLength: maxLength(400)
    }
  },
  methods: {
    resetModal() {
      this.title = "";
      this.description = "";
    },
    submit(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.submitStatus = "ERROR";
      } else {
        this.submitStatus = "PENDING";
        setTimeout(() => {
          this.submitStatus = "OK";
        }, 500);
        this.submittedTitle = this.title;
        this.submittedDescription = this.description;

        // send data to submit
        const axios = require("axios");
        let currentObj = this;
        axios
          .post("/home", {
            title: this.title,
            description: this.description
          })
          .then(function(response) {
            window.location.replace("/home");
            currentObj.output = response.data;
          })
          .catch(function(error) {
            currentObj.output = error;
          });
        // Hide the modal manually
        this.$nextTick(() => {
          this.$refs.modal.hide();
        });
      }
    }
  }
};
</script>
