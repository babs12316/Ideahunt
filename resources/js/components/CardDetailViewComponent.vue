<template>
    <div class="detailView">
        
<div>
   <b-modal id="detail-model" title="BootstrapVue">
    <p class="my-4">Hello from modal! {{title}}</p>
  </b-modal>
</div>
</div>
</template>

<script>
    export default {
        props: ["title", "description"],
        
    }
</script>

<style lang="scss" scoped> 

</style>