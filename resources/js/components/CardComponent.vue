<template>
<div>
  <div class="card" :id="cardId" :ideaId="cardId"  @click="cardClicked($event)">
    <a :href="url" :ideaId="cardId"  >
      <h2 class="card-title" :ideaId="cardId">{{this.title}}</h2>
      <p class="card-description" :ideaId="cardId">{{this.description}}</p>
     <!-- <font-awesome-icon icon="comment" />&nbsp;&nbsp;10-->
    </a>
 </div>
   <div class="like" >
      <font-awesome-icon icon="thumbs-up" :ideaId="cardId"  @click="likeClicked($event)" />&nbsp;&nbsp;{{this.numberLikes}}
      </div>
  </div>    
</template>

<script>
export default {
  props: ["title", "description", "cardId","likes"],
  data() {
    return {
      url: "#",
      numberLikes:this.likes
    };
  },
  methods: {
    cardClicked: function(event) {
      alert("i am clicked"+event.target.getAttribute('ideaId'));
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
    likeClicked:function(event) {
        this.numberLikes++;
       let clickedCardId=event.target.parentElement.getAttribute('ideaId');
          // send data to submit
        const axios = require("axios");
        let currentObj = this;
        axios
          .post("/home/idea/"+clickedCardId, {
            cardId: clickedCardId,
            likes:this.numberLikes         
          })
          .then(function(response) {
            currentObj.output = response.data;
          })
          .catch(function(error) {
            currentObj.output = error;
          });
     
    }  
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
.card {
  padding: 2%;
  margin: 5%;
  z-index:-1;
  position:inherit;
}
.card span {
  margin-right: 5%;
}
.card a {
  text-align: left;
  color: #000;
}
 .card:hover{
  cursor: pointer;
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}
.like {
  margin-left: 45px;
  margin-top: -60px;
}
.like:hover{
  cursor: pointer;
}


.card a:hover {
  text-decoration: none;
}
@mixin multiLineEllipsis($lineHeight: 1.2em, $lineCount: 1, $bgColor: white) {
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
  .card-description {
    line-height: 3.7em !important;
  }
}

.card-description {
  @include multiLineEllipsis(
    $lineHeight: 1.2em,
    $lineCount: 3,
    $bgColor: white
  );
}

@media (max-width: 992px) {
.card{
  padding-bottom:10%;
}  
.like{
    margin-left: 7%;
    margin-top: -14%; 
   }
}    
</style>