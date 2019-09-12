<template>
  <div>
 
      <b-modal id="cardDetailModal" ref="cardDetailModal"  hide-footer>
      <template v-slot:modal-title>
     <h2> {{title}} </h2>
      </template>
   
      <b-button class="mt-3" block @click="$bvModal.hide('cardDetailModal');close();">Close (X)</b-button>
    </b-modal>

    
    <div v-for="idea in this.editIdeaArray" :key="idea.id">
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
            v-model="idea.title"
            :class="{ 'form-group--error': $v.title.$error }"
            placeholder="testing"
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
            :placeholder="idea.description"
            rows="3"
            max-rows="6"
            v-model="idea.description"
            :class="{ 'form-group--error': $v.description.$error }"
          ></b-form-textarea>
        </b-form-group>
        <!--  <div
          class="error"
          v-if="submitStatus==='ERROR'&&!$v.description.required"
        >Description is required</div>-->
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
  </div>
</template>

<script>
import { required, minLength, maxLength } from "vuelidate/lib/validators";

export default {
  props: ["editidea"],
  data: function() {
    return {
      editIdeaArray: "",
      title: "",
      description: "",
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
      minLength: minLength(4),
      maxLength: maxLength(300)
    }
  },

  mounted() {
      this.$refs["cardDetailModal"].show();
    let vm = this;
    vm.$nextTick(function() {
      vm.editIdeaArray = JSON.parse(vm.editidea); // Parse ideas to read as an array in vue
    });
  },
  methods: {
       resetModal() {
      this.title = "";
      this.description = "";
    },
    submit(bvModalEvt) {
        bvModalEvt.preventDefault();
         if (this.$v.$invalid) {
        this.submitStatus = "ERROR";
      } else {
        // do your submit logic here
        this.submitStatus = "PENDING";
        setTimeout(() => {
          this.submitStatus = "OK";
        }, 500);
      }  
        // Hide the modal manually
        this.$nextTick(() => {
          this.$refs.modal.hide();
        });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>