<template>
    <div class="student">
    <table class="bg-white w-[82.6%] m-auto box-border mt-4">
      <thead class="text-white ">
        <tr>
          <th class="  lg:p-3 bg-color">Profile</th>
          <th class=" lg:p-3 bg-color">Full Name</th>
          <th class="flex  justify-center lg:p-3 bg-color">Emial</th>
          <th class="lg:p-3 bg-color">Generation</th>
          <th class=" lg:p-3 bg-color">Totor</th>
          <th class=" lg:p-3 bg-color">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr
          class="cursor-pointer show hover:bg-gray-200">
          <td class="border-b-2 py-1 lg:text-xl">
            <span class="flex justify-center"
              ><img src="student.users.profile" class="w-10 h-10 rounded-full"
            /></span>
          </td>
          <td class="border-b-2 py-1">
            <span class="flex justify-center m-3"
              >Narong
               Hong</span>
          </td>
          <td class="border-b-2 py-1 ">
            <span class="flex justify-center m-3">narongbunyon@student.passerellesnueriques.org</span>
          </td>
          <td class="border-b-2 py-1">
            <span class="flex justify-center">2022</span>
          </td>
          <td class="border-b-2 py-1">
            <span class="flex justify-center">Rady</span>
          </td>
          <td class="border-b-2 py-1 text-white">
            <span class="flex justify-center space-x-2 icons">
              <svg class="h-8 w-8 text-orange-500"  
              viewBox="0 0 24 24"  fill="none"  stroke="currentColor"
                stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"> 
                 <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /> 
                  <polyline points="22 4 12 14.01 9 11.01" />
                </svg>

            </span>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-center mt-[50px]">
      <div>
        <img src="img_null" class="flex justify-center m-auto w-40" />
        <h1 class="text-red-500 text-center text-2xl mt-2">
          No Student in list
        </h1>
      </div>
    </div>
  </div>
</template>
<script>
// import axiosClient from "../../../axios-http";
// import Swal from "sweetalert2";
export default { 
}
</script>
<style scoped>
.icons {
  display: none;
}
.show:hover .icons {
  display: flex;
  margin: 0 -10px;
  padding: 0;
}
.btn-add {
  background: #22bbea;
}
.form-container {
  background: #bbd7e0;
}
.bg-color {
  background: #22bbea;
}
#hiss{
  display: flex;
  margin-left:60px;
}
#hiss:hover{
  background: teal;
 
}
</style>