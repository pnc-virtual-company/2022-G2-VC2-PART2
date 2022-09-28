<template>
  <div class="card-comment">
    <div class="card-body">
      <div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, fugit.</div>
      <div class="date-time">
        <div class="year">12-04-2022</div> |
        <div class="day">12:00 <small>AM</small></div>
      </div>
      
    </div>
     <div class="card-body">
      <div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, fugit.</div>
      <div class="date-time">
        <div class="year">12-04-2022</div> |
        <div class="day">12:00 <small>AM</small></div>
      </div>
      
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
  .card-body{
    background: #d4cfa3cb;
    border-radius: 5px;
    margin: 5px;
    display: flex;
    justify-content: space-between;
  }


  .date-time{
    display: flex;
    align-content: center;
    align-items: center;
    text-align: center;
    justify-content: center;
  }
  .year,.day{
    margin: 1.5px 1.5px;
    font-size: 14px;
  }
  .card-text{
    display: flex;
    align-items: center;
    width: 70%;
    margin: 5px 5px;
  }

</style>