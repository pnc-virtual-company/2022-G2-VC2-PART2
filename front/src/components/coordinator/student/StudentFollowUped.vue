<template>
  <div class="follow">
    <div class="student">
      <FilterFollowed/>
    <table class="bg-white w-[82.6%] m-auto box-border mt-4">
      <thead class="text-white">
        <tr>
          <th class=" text-xl lg:p-3 bg-color">Profile</th>
          <th class="text-xl lg:p-3 bg-color">Full Name</th>
          <th class="flex text-xl  justify-center lg:p-3 bg-color">Emial</th>
          <th class=" text-xl lg:p-3 bg-color">Generation</th>
          <th class=" text-xl lg:p-3 bg-color">Totor</th>
          <th class=" text-xl lg:p-3 bg-color">Actions</th>
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
          <td class="border-b-2 py-1 lg:text-xl">
            <span class="flex justify-center text-xl m-3"
              >Narong
               Hong</span
            >
          </td>
          <td class="border-b-2 py-1 lg:text-xl">
            <span class="flex justify-center text-xl m-3">narongbunyon@student.passerellesnueriques.org</span>
          </td>

          <td class="border-b-2 py-1 lg:text-xl">
            <span class="flex justify-center text-xl">2022</span>
          </td>

          <td class="border-b-2 py-1 lg:text-xl">
            <span class="flex justify-center text-xl">Rady</span>
          </td>

          <td class="border-b-2 py-1 lg:text-xl text-white">
            <span class="flex justify-center space-x-2 icons">
              <icon-detail />
              <icon-edit/>
              <icon-delete />
            </span>
            <svg id="hiss" class="h-10 w-10 text-orange-900 justify-center flex"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="12 8 12 12 14 14" />  <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>





          </td>
        </tr>
        <div
          class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
          <div class="form-container shadow-md rounded w-2/5">
            <!-- <h2 class="header text-center text-white py-3">
              Edit Student Account
            </h2>
            <form-edit-student
            ></form-edit-student> -->
          </div>
        </div>
        <div
          class="opacity-30 fixed inset-0 z-40 bg-black"
        ></div>
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
  </div>
</template>

<script>

// import axiosClient from "../../../axios-http";
// import Swal from "sweetalert2";

import FilterFollows from './FilterFollowedUp.vue';

export default {

    components:{
      "FilterFollowed":FilterFollows

    }

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
.header {
  background: #22bbea;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  font-weight: bold;
  font-size: 20px;
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