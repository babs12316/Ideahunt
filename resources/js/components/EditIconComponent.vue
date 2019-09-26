<template>
  <div>
    <a :href="editurl"  class="editIcon" :ideaId="this.ideaId" v-if="this.ismyidea==='1'">
      <font-awesome-icon icon="edit" :ideaId="cardId" @click="editClicked($event)" />
    </a>
  </div>
</template>

<script>
export default {
  props: ["ismyidea", "ideaId"],
  data() {
    return {
      editurl: "#"
    };
  },

  methods: {
    editClicked: function(event) {    
    //  alert("i am clicked" + event.target.parentElement.parentElement.getAttribute("ideaId"));
      //  console.log("my edit id is"+ event.target.parentElement.getAttribute('ideaId'));
      let clickedCardId = event.target.parentElement.parentElement.getAttribute("ideaId");
      this.editurl = "/home/myIdeas/edit/" + clickedCardId;
    }
  }
};
</script>

<style lang="scss" scoped>
.editIcon{
  color: #000;
    float: left;
    font-size: 15px;
    margin-right: 30px;
}
</style>