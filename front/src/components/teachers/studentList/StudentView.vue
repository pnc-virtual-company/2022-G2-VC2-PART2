<template>
  <div class="student-list">
    <!---------------------------filter---------------------------------------->
    <div class="flex justify-center space-x-5">
      <div class="flex">
        <span
          class="bg-span text-white flex justify-center items-center text-center rounded-l py-2 px-4"
          >Filter By Generation</span
        >
        <!--filter-by-generation-->
        <select
          class="w-80 p-2 py-2 text-gray-900 rounded-r focus:border-blue-300 outline-none text-slate-500"
          v-model="filter_generation"
        >
          <option disabled value="Choose" aria-placeholder="Choose">
            Choose
          </option>
          <option value="">Show All</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
        </select>
      </div>
      <div class="flex">
        <!--search-by-name-->
        <span
          class="bg-span text-white items-center py-2 px-4 border-gray-300 rounded-l"
          >Search By Name</span
        >
        <input
          type="search"
          class="w-80 rounded-r p-2 py-2 border focus:border-blue-300 outline-none appearance-none"
          placeholder="Search"
          v-model="search_name"
        />
      </div>
    </div>
    <!---------------------------------end------------------------------------>
    <p class="text-2xl ml-[4.3rem] mt-2">Student Lists</p>
    <table class="bg-white w-[87.5%] m-auto box-border mt-2">
      <thead class="text-white">
        <tr>
          <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Generation</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Email</th>
          <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
        </tr>
      </thead>
      <tbody v-for="student of filter_Generation"
          :key="student">
        <tr 
          class="cursor-pointer show hover:bg-gray-200"
          :class="{'bg-follow-up':student.status==true}"
          
        >
          <td  class="border-b-2 py-1 lg:text-sm">
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
              <svg 
                v-if="student.status!=true"
                @click="add_to_follow_up(student.id)"
                class="h-8 w-8 text-red-500"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="8.5" cy="7" r="4" />
                <line x1="18" y1="8" x2="23" y2="13" />
                <line x1="23" y1="8" x2="18" y2="13" />
              </svg>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="pagination-student w-[82.6%] m-auto box-border mt-4">
      <vue-awesome-paginate
        class="text-orange-600"
        :current-page="currentPage"
        :total-items="total"
        :items-per-page="perPage"
        :on-click="pageChange"
      >
      </vue-awesome-paginate>
    </div>
  </div>
</template>
<script>
import axiosClient from "../../../axios-http";
import Swal from "sweetalert2";
export default {
  data() {
    return {
      student_lists: [],
      filter_generation: "",
      search_name: "",
      is_follow_up: false,
      currentPage : 1,
      total: 0,
      perPage: 5,
    };
  },
  methods: {
    pageChange(pageNumber) {
      this.currentPage = pageNumber;
      this.getData();
    },
    async getData() {
      let response = await axiosClient.get(
        `get_student_display_follow_up/?page=${this.currentPage}`
      );
      let responseData = response.data;
      this.student_lists = responseData.data;
      this.perPage = responseData.per_page;
      this.total = responseData.total;
    },
    add_to_follow_up(student_id) {
      let body = {};
      body["status"] = true;
      Swal.fire({
        title: "Are you sure?",
        text: "You want to move student to follow up list!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#22BBEA",
        cancelButtonColor: "#FFAD5C",
        confirmButtonText: "Move",
      }).then((result) => {
        if (result.isConfirmed) {
          this.is_follow_up = !this.is_follow_up;
          axiosClient.put("teachers/update_status/" + student_id, body);
          this.getData();
        }
      });
    },
  },
  computed: {
    filter_Generation() {
      if (this.filter_generation != "") {
        return this.student_lists.filter(
          (student) =>
            student.generation == this.filter_generation &&
            (student.users.first_name
              .toLowerCase()
              .includes(this.search_name.toLowerCase()) ||
              student.users.last_name
                .toLowerCase()
                .includes(this.search_name.toLowerCase()))
        );
      } else if (this.search_name != "") {
        return this.student_lists.filter(
          (student) =>
            student.users.first_name
              .toLowerCase()
              .includes(this.search_name.toLowerCase()) ||
            student.users.last_name
              .toLowerCase()
              .includes(this.search_name.toLowerCase())
        );
      } else {
        return this.student_lists;
      }
    },
  },
  mounted() {
    this.currentPage = 1;
    this.getData();
  },
};
</script>
<style scoped>
.bg-color,
.bg-span {
  background: #22bbea;
}
.bg-follow-up{
    background: rgba(237, 212, 86, 0.743);
}
</style>
