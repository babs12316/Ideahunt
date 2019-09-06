<template>
    <div>
        <p> Hello {{title}} </p>
        <p> I am idea </p>
      <li v-for="idea in ideas" :key="idea.id">
          {{idea}}
       </li>

        <card-component></card-component>   
        <card-component></card-component> 
    </div>
</template>

<script>
    export default {
        props:['title','ideas'],
      

    }
</script>

<style lang="scss" scoped>


</style>