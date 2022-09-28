<template>
  <div class="tutor">
    <div class="body-tutor">
      <div></div>
      <div class="text-show">Tutor</div>
      <div class="account-user">
        <img id="user-images" src="../../../assets/logo.png">
        <div class="name-user">Sarath Orn</div>
      </div>
    </div>
    <div class="scroller  overflow-y-scroll">

    
      <!-- ------Contain comment -->
      <div class="card-tutors">
        <div class="coorComment">
          <div class="card-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus tempore nam, saepe eos harum commodi deleniti hic odit magnam aperiam.</div>
          <div class="date-time">
            <div class="year">03-03-2022</div>
            <div class="times">12:00 <small>AM</small></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>

export default {
  data(){
    return{
      
    }

  },
   methods:{
   


  },
  mounted() {
    // this.get_tutor();
    // this.get_comment_tutor();
  }

}
</script>

<style scoped>
  .tutor{
    height: 86vh;
    background: #BBD7E0;
  }
  .body-tutor{
    display: flex;
    justify-content: space-between;
    background: #22BBEA;
    border-top-left-radius: 5px;
  }
  .text-show{
    font-size: 22px;
    padding: 10px;
    display: flex;
    font-weight: bold;
    color: white;
    justify-content: flex-end;
    align-items: center;
  }

  .scroller{
    height: 77vh;
    overflow-x: hidden;
  }

  .account-user{
    width: 28%;
    padding: 5px;
    border-top-left-radius: 50px;
   border-bottom-left-radius: 50px;
   border-top-right-radius: 5px;
    display: flex;
    align-items: center;
    background: #51d9f1;
  }


  #user-images{
    width: 46px; 
    height: 46px;
    border-radius: 50%;
  }
  .name-user{
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: center;
    margin: auto;
    color: white;
    font-size: 17px;
    font-weight: bold;
  }

  .card-tutors{
    display: flex;
    justify-content: center;
    align-content: center;
    margin:10px 10px;
    border-radius: 4px;
    background: #FFFFFF;
    border-left: solid 10px #4A90F8;
  }
  .coorComment{
    padding: 12px 10px;
    display: flex;
    justify-content: space-between;
  }

  .date-time{
    width: 100px;
    text-align: center;
    font-size: 15px;
    justify-content: flex-end;
  }
  .card-comment{
    width: 84%;
    display: flex;
  }

</style>