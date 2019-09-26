<template>
    <div>
    <h2 :ideaId="this.ideaId" v-bind:class = "this.ismyidea==='1'?'myIdeasviewTitle':''" >{{this.title}}</h2>
    </div>
</template>

<script>
    export default {
        props:["title","ismyidea","ideaId"]
    }
</script>

<style lang="scss" scoped>
.myIdeasviewTitle{
  margin-top:6%;
}

</style>