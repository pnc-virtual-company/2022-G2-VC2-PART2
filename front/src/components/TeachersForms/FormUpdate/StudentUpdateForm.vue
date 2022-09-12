<template>
   <form>
    <div class="adders">Update Stuent's Account</div>
    <div class="grid grid-cols-2 gap-1">
      <div class=" p-2">
        <label for="text" class="block font-medium text-gray-900 dark:text-gray-300 text-xl p-2">First Name</label>
        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 
        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
        dark:focus:border-blue-500 text-lg" placeholder="First Name" required>
      </div>

      <div class=" p-2">
        <label for="email" class="block font-medium text-gray-900 dark:text-gray-300 text-xl p-2">Last Name</label>
        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500
         block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
         dark:focus:border-blue-500 text-lg" placeholder="Last Name" required>
      </div>
    </div>

    <div class="grid grid-cols-2">
      <div class="grid grid-cols-1 p-2">
        <label class="text-2xl p-2">Gender</label>
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500
         block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
         dark:focus:border-blue-500 text-lg">
          <option selected>Gender</option>
          <option value="male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
          <option value="Gay">Gay</option>
        </select>
      </div>

      <div class="grid grid-cols-1 p-2">
        <label class="text-2xl p-2">Batch</label>
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500
         block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
         dark:focus:border-blue-500 text-lg">
          <option selected>Batch</option>
          <option value="US">2022 WEB A</option>
          <option value="CA">2022 WEB B</option>
          <option value="FR">2022 SNA</option>
          <option value="DE">2023 WEB A</option>
          <option value="DE">2023 WEB B</option>
          <option value="DE">2023 SNA</option>
        </select>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-1">
      <div class="p-2">
        <label for="email" class="block font-medium text-gray-900 dark:text-gray-300 text-xl p-2">Email</label>
        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 
        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
        dark:focus:border-blue-500 text-lg" placeholder="Email" required>
      </div>

      <div class=" p-2">
        <label for="email" class="block font-medium text-gray-900 dark:text-gray-300 text-xl p-2">Phone</label>
        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500
         block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
         dark:focus:border-blue-500 text-lg" placeholder="Phone" required>
      </div>
    </div>
    <ButtonsCLiker/>
  </form>
</template>

<script>
  import ButtonsCLiker from './ButtonVues.vue'
export default {
  components:{
    ButtonsCLiker

  }

}
</script>

<style scoped>
  form{
    margin: 10px auto 10px;
    align-items: center;
    width: 750px;
    background: #BBD7E0;
    border-radius: 5px;
  }
  .adders{
    display: flex;
    margin: auto;
    justify-content: center;
    background: #22BBEA;
    padding: 15px;
    font-size: 25px;
    color: white;
    font-weight: bold;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
  }
  .formFlexs{
    display: flex;
    width: 100px;
  }


</style>