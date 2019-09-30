<template>
    <div>
    <h2 :ideaid="this.ideaid" v-bind:class = "this.ismyidea==='1'?'myIdeasviewTitle':''" >{{this.title}}</h2>
    </div>
</template>

<script>
    export default {
        props:["title","ismyidea","ideaid"]
    }
</script>

<style lang="scss" scoped>
.myIdeasviewTitle{
  margin-top:6%;
}

</style>