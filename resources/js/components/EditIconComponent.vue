<template>
  <div>
    <a :href="editurl" class="editIcon" :ideaid="this.ideaid" v-if="this.ismyidea==='1'">
      <font-awesome-icon icon="edit" @click="editClicked(ideaid)" />
    </a>
  </div>
</template>

<script>
export default {
  props: ["ismyidea", "ideaid"],
  data() {
    return {
      editurl: "#"
    };
  },

  methods: {
    editClicked: function(clickedCardId) {
      this.editurl = "/home/myideas/edit/" + clickedCardId;
    }
  }
};
</script>

<style lang="scss" scoped>
.editIcon {
  color: #000;
  float: left;
  font-size: 15px;
  margin-right: 30px;
}
</style>