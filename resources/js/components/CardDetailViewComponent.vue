<template>
    <div class="detailView">
   
      <h2 class="card-title">{{title}}</h2>
      <p class="card-description">{{description}}</p>

     <!--   <table>
           <thead>
              <tr>
                <th></th>
                <th>Idea Title</th>
                <th>Description</th>
              </tr>
           </thead> 
           <tbody>
              <tr>
                  <td>{{title}}</td>
                   <td>{{description}}</td>
              </tr>
           </tbody>  
           </table>  -->     
    </div>
</template>

<script>
    export default {
        props: ["title", "description"],
        
    }
</script>

<style lang="scss" scoped>
.detailView{
padding: 7%;
width: 100%;
height: 75%;
margin-top:-0.8%;
position: absolute;
background-color: #fff;
z-index: 4;
float: left;
border: 84px solid grey;
border-radius: 35px;
transform: rotateY(360deg);
}
</style>