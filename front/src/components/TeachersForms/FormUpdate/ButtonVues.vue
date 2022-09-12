<template>
  <div id="ends" class="ends">
    <button type="button" class="focus1 active1">Cancel</button>
    <button type="button" class="focus2 active2">Save</button>

    
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
  .ends{
    margin: auto;
    justify-content: flex-end;
    display: flex;
    padding: 10px 5px;
  }

  .focus1{
    background: #FFAD5C;
  }
  .focus2{
    background: #22BBEA;

  }


  .focus1,
  .focus2{
    width: 120px;
    margin: 10px 15px;
    border-radius: 5px;
    padding: 8px;
    font-size: 18px;
    color: white;
    font-weight: bold;
  }

</style>