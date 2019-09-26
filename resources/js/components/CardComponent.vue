<template>
<div>
  <div class="idea" :id="cardId" :ideaId="cardId"   @click="cardClicked($event)">
   <!--<a :href="editurl" :ideaId="cardId" v-if="this.myIdeas==='1'"><font-awesome-icon icon="edit" :ideaId="cardId"  @click="editClicked($event)" /></a>
    <a :href="deleteurl" :ideaId="cardId" v-if="this.myIdeas==='1'"><font-awesome-icon icon="trash" :ideaId="cardId"  @click="deleteClicked($event)" /></a>-->
      <editicon-component :ismyidea="this.ismyidea" :ideaId="cardId"></editicon-component>
      <deleteicon-component  :ismyidea="this.ismyidea" :ideaId="cardId"> </deleteicon-component>
    <a :href="url" :ideaId="cardId"  >
       
          <ideatitle-component :title="this.title" :ideaId="cardId" :ismyidea="this.ismyidea"></ideatitle-component>
          <ideadescription-component :ideaId="cardId" :description="this.description"></ideadescription-component>
      <!--<h2 class="idea-title" :ideaId="cardId" v-bind:class = "this.myIdeas==='1'?'myIdeasviewTitle':''">{{this.title}}</h2>-->
    <!--  <p class="idea-description" :ideaId="cardId">{{this.description}}</p>-->
     <!-- <font-awesome-icon icon="comment" />&nbsp;&nbsp;10-->
    </a>
 </div>
  
      <!-- Need to increment this array from 0 to its last element   {{this.likeStatus[this.count]}} -->
    <!--  <font-awesome-icon icon="thumbs-up" :ideaId="cardId"  @click="likeClicked($event)" />&nbsp;&nbsp;{{this.numberLikes}}-->
    <likeicon-component :ideaId="cardId" :myideaid="this.myideaid" :ismyidea="this.ismyidea" :likestatus="this.likestatus" :likes="this.likes"></likeicon-component> 

  </div>    
</template>   

<script>
export default {
  props: ["title", "description", "cardId","likes","ismyidea","likestatus","myideaid"],
  data() {
    return {
      url: "#",
      numberLikes:this.likes,
      editurl:"#",
      currentLikeStatus:this.likeStatus,
  //    cardNumber:this.count,
    
    };
  },
   
  methods: {
   
    cardClicked: function(event) {
     // alert("i am clicked"+event.target.getAttribute('ideaId'));
      console.log(event.target.getAttribute('ideaId'));
      const axios = require("axios");
      let currentObj = this;
      let clickedCardId = event.target.getAttribute('ideaId');
      this.url = "/home/idea/" + clickedCardId;
      axios
        .get("/home/?id=" + clickedCardId)
        .then(function(response) {
          currentObj.output = response.data;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
    },
  /*  likeClicked:function(event) {
     //  let count=0;
       this.numberLikes++;
       let clickedCardId=event.target.parentElement.getAttribute('ideaId');
      this. currentLikeStatus=!this. currentLikeStatus;
          // send data to submit
      // if(count==0){   
        const axios = require("axios");
        let currentObj = this;
        axios
          .post("/home/idea/"+clickedCardId, {
            cardId: clickedCardId,
            likes:this.numberLikes,
            likestatus:this.currentLikeStatus      
          })
          .then(function(response) {
            currentObj.output = response.data;
          })
          .catch(function(error) {
            currentObj.output = error;
          });
     //  } 
      // count++; 
     
    },*/
   /* editClicked:function(event) {
    
          let clickedCardId=event.target.parentElement.getAttribute('ideaId');
            this.editurl = "/home/myIdeas/edit/" + clickedCardId;

    },
     deleteClicked:function(event) {
        let clickedCardId=event.target.parentElement.getAttribute('ideaId');
         this.deleteurl = "/home/myIdeas/delete/" + clickedCardId;
              // send data to submit
        const axios = require("axios");
        let currentObj = this;
        axios
          .post("/home/myIdeas/delete/"+clickedCardId, {
            cardId: clickedCardId,
           })
          .then(function(response) {
            location.reload();
            currentObj.output = response.data;
          })
          .catch(function(error) {
            currentObj.output = error;
          });
     

    }  */
  }
};
</script>

<style lang="scss" scoped>
.hide {
  display: none;
}
.show {
  display: inherit;
}
.idea {
  padding: 2%;
  margin: 5%;
  z-index:-1;
  position:inherit;
  padding-bottom:5%;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.idea span {
  margin-right: 5%;
}
.idea a {
  text-align: left;
  color: #000;
}
.idea a:nth-child(2){
  margin-left: 5%;
    margin-top: -2.7%;
}

 .idea:hover{
  cursor: pointer;
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}
.like {
  margin-left: 7%;
  margin-top: -9%;
}
.like:hover{
  cursor: pointer;
}

.myIdeasviewTitle{
  margin-top:2%;
}
.myIdeasviewLike{
  margin-top:-10%;
}
svg.svg-inline--fa.fa-thumbs-up.fa-w-16{
  font-size:20px;
}

.idea a:hover {
  text-decoration: none;
}
@mixin multiLineEllipsis($lineHeight: 1.2em, $lineCount: 1, $bgColor: #fff) {
  overflow: hidden;
  position: relative;
  line-height: $lineHeight;
  max-height: $lineHeight * $lineCount;
  text-align: left;
  margin-right: 0em;
  padding-right: 1em;
  &:before {
    content: "...";
    position: absolute;
    right: 1em;
    bottom: 0;
    background: $bgColor;
  }
  &:after {
    content: "";
    position: absolute;
    right: 0;
    width: 1em;
    height: 1em;
    margin-top: 0.2em;
    background: $bgColor;
  }
}



@media (min-width: 992px) {
  .idea-description {
    line-height: 3.7em !important;
  }
}

.idea-description {
  @include multiLineEllipsis(
    $lineHeight: 1.2em,
    $lineCount: 3,
    $bgColor: #fff
  );
}

@media (max-width: 992px) {
.idea{
  padding-bottom:10%;
}  
.like{
    margin-left: 7%;
    margin-top: -14%; 
   }
}    
</style>