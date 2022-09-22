<template>
  <div class="card-comment">
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
  .card-comment{
    width: 920px;
  }
  .card-body{
    background: #BBD7E0;
    border-radius: 5px;
  }
  .card-body{
    align-items: center;
    text-align: center;
    margin: 5px 5px;
    display: flex;
  }


  .date-time{
    width: 250px;
    display: flex;
    align-content: center;
    align-items: center;
    text-align: center;
    justify-content: center;
  }
  .year,.day{
    margin: 1.5px 1.5px;
  }
  .card-text{
    display: flex;
    text-align: center;
    justify-content: flex-start;
    align-items: center;
    font-size: 20px;
    width: 800px;
    margin: 5px 5px;
  }

</style>