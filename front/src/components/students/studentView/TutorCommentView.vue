<template>
  <div class="tutor">
    <div class="body-tutor">
      <div class="text-show">Tutor</div>
      <div class="account-user">
        <img id="user-images" src="../../../assets/logo.png">
        <div class="name-user">Kea Nhor</div>
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

      <div class="card-tutors">
        <div class="coorComment">
          <div class="card-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus tempore nam, saepe eos harum commodi deleniti hic odit magnam aperiam.</div>
          <div class="date-time">
            <div class="year">03-03-2022</div>
            <div class="times">12:00 <small>AM</small></div>
          </div>
        </div>
      </div>

      <div class="card-tutors">
        <div class="coorComment">
          <div class="card-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus tempore nam, saepe eos harum commodi deleniti hic odit magnam aperiam.</div>
          <div class="date-time">
            <div class="year">03-03-2022</div>
            <div class="times">12:00 <small>AM</small></div>
          </div>
        </div>
      </div>

      <div class="card-tutors">
        <div class="coorComment">
          <div class="card-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus tempore nam, saepe eos harum commodi deleniti hic odit magnam aperiam.</div>
          <div class="date-time">
            <div class="year">03-03-2022</div>
            <div class="times">12:00 <small>AM</small></div>
          </div>
        </div>
      </div>
      
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

}
</script>

<style scoped>
  .tutor{
    height: 88vh;
    background: #BBD7E0;
  }
  .body-tutor{
  
    display: flex;
    justify-content: space-between;
    background: #22BBEA;
    border-top-left-radius: 5px;
  }
  .text-show{
    font-size: 28px;
    margin: 3px auto 3px;
    display: flex;
    font-weight: bold;
    color: white;
    justify-content: flex-end;
    align-items: center;
  }

  .scroller{
    height: 80vh;
    overflow-x: hidden;
  }

  .account-user{
    width: 170px;
    border-top-left-radius: 50px;
   border-bottom-left-radius: 50px;
   border-top-right-radius: 5px;
    display: flex;
    background: #51d9f1;
  }


  #user-images{
    width: 47px;
    height: 6vh;
    margin: 2px 3px;
    border-radius: 50px;
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
    display: flex;
  }

  .date-time{
    width: 100px;
    text-align: center;
    font-weight: 450;
    font-size: 15px;
    /* margin-left: 500px; */
    justify-content: flex-end;
  }
  .card-comment{
    display: flex;
    width: 620px;
    text-align: center;
    justify-content: center;
    margin: auto;
  }

</style>