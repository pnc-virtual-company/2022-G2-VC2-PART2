<template>
  <div class="student-list">
    <!---------------------------filter---------------------------------------->
    <div class="flex justify-center space-x-5 mt-[2rem] mb-2">
      <div class="flex">
        <span
          class="bg-span flex justify-center items-center text-center rounded-l-lg py-2 px-4"
          >Filter By Generation</span
        >
        <!--filter-by-generation-->
        <select
          class="w-[396px] p-2 py-2 text-gray-900 rounded-r-lg focus:border-blue-300 outline-none text-slate-500"
          v-model="filter_generation"
        >
          <option disabled value="Choose" aria-placeholder="Choose">
            Choose
          </option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
        </select>
      </div>
      <div class="flex">
        <!--search-by-name-->
        <span
          class="bg-span items-center py-2 px-4 text-gray-900 border-gray-300 rounded-l-lg"
          >Search By Name</span
        >
        <input
          type="search"
          class="w-[396px] rounded-r-lg p-2 py-2 border focus:border-blue-300 outline-none appearance-none"
          placeholder="Search"
          v-model="search_name"
        />
      </div>
    </div>
    <!---------------------------------end------------------------------------>
    <p class="text-3xl ml-[7.3rem] font-bold mt-5">Student Lists</p>
    <table class="bg-white w-[82.6%] m-auto box-border mt-2">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Generation</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr
          class="cursor-pointer show hover:bg-gray-200"
          v-for="student of filter_Generation"
          :key="student"
        >
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center"
              ><img :src="student.users.profile" class="w-10 h-10 rounded-full"
            /></span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm"
              >{{ student.users.first_name }}
              {{ student.users.last_name }}</span
            >
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.generation
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm">
            <span class="flex justify-center text-sm">{{
              student.users.email
            }}</span>
          </td>
          <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center text-sm">
              <p
                class="rounded-full p-2 bg-red-500 hover:bg-red-600 border-none"
              >
                Add-Follow Up
              </p>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-center items-center p-5">
      <svg
        class="h-12 w-12 text-black"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M15 19l-7-7 7-7"
        />
      </svg>
      <div class="flex items-center">
        <div
          class="h-8 w-8 bg-orange-300 text-center text-white font-bold flex justify-center items-center m-1"
        >
          1
        </div>
        <div
          class="h-8 w-8 bg-orange-300 text-center text-white font-bold flex justify-center items-center m-1"
        >
          2
        </div>
        <div
          class="h-8 w-8 bg-orange-300 text-center text-white font-bold flex justify-center items-center m-1"
        >
          3
        </div>
        <div
          class="h-8 w-8 bg-orange-300 text-center text-white font-bold flex justify-center items-center m-1"
        >
          4
        </div>
      </div>
      <svg
        class="h-12 w-12 text-black"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 5l7 7-7 7"
        />
      </svg>
    </div>
  </div>
</template>
<script>
import axiosClient from "../../../axios-http";
// import Swal from "sweetalert2";
export default {
  data() {
    return {
      student_lists: [],
      filter_generation: "",
      search_name: "",
    };
  },
  methods: {
    get_students() {
      axiosClient.get("students/get").then((res) => {
        this.student_lists = res.data;
        console.log(this.student_lists);
      });
    },
  },
  computed: {
    filter_Generation() {
      if (!this.filter_generation) {
        return this.student_lists;
      } else {
        return this.student_lists.filter(
          (student) => (student.generation == this.filter_generation)
        );
      }
    },
  },
  mounted() {
    this.get_students();
  },
};
</script>
<style scoped>
.bg-color,
.bg-span {
  background: #22bbea;
}
</style>
