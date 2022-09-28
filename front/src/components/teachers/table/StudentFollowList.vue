<template>
  <div class="student-list">
    <!--------------------------card-detail------------------------------------>
    <card-detail :user_info="user_info" v-if="is_show" @close_detail="close_detail"/>
    <!---------------------------filter---------------------------------------->
    <div class="flex justify-center space-x-5 mt-[2rem] mb-2">
      <div class="flex">
        <span
          class="bg-span flex text-white justify-center items-center text-center rounded-l py-2 px-4"
          >Filter By Generation</span
        >
        <!--filter-by-generation-->
        <select
          class="w-[396px] p-2 py-2 text-gray-900 rounded-r focus:border-blue-300 outline-none text-slate-500"
          v-model="filter_generation"
        >
          <option disabled value="Choose" aria-placeholder="Choose">
            Choose
          </option>
          <option value="">All Generation</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
        </select>
      </div>
      <div class="flex">
        <!--search-by-name-->
        <span
          class="bg-span items-center text-white py-2 px-4 border-gray-300 rounded-l"
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
    <table class="bg-white w-[82.6%] m-auto box-border mt-2 mt-9">
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
          v-for="student of data_filters"
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
            <span class="flex justify-center">
              <detail-icon class="icons" @click="show_detail(student.id)"/>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import axiosClient from "../../../axios-http";
import DetailIcon from '../../coordinators/icons/DetailIcon.vue';
import CardDetail from '../../coordinators/StudentList/CardDetail.vue'
export default {
  components: { DetailIcon, CardDetail },
  data() {
    return {
      student_lists: [],
      user_info: [],
      filter_generation: "",
      search_name: "",
      is_show: false
    };
  },
  methods: {
    get_students() {
      axiosClient.get("students/get").then((res) => {
        this.student_lists = res.data;
      });
    },
    show_detail(id) {
      this.is_show = true
      for(let value of this.student_lists) {
        if(value.id == id) {
          this.user_info = value
          console.log(this.user_info);
        }
      }
    },
    close_detail(close){
      this.is_show = close;
    },
  },
  computed: {
    data_filters() {
      if(this.filter_generation != "") {
        return  this.student_lists.filter(student => (student.generation == this.filter_generation)
        && (student.users.first_name.toLowerCase().includes(this.search_name.toLowerCase()) || student.users.last_name.toLowerCase().includes(this.search_name.toLowerCase())));
      }else if(this.search_name != "") {
        return this.student_lists.filter(student => (student.users.first_name.toLowerCase().includes(this.search_name.toLowerCase()) || student.users.last_name.toLowerCase().includes(this.search_name.toLowerCase())));
      }else {
        return this.student_lists
      }
    },
  },
  mounted() {
    this.get_students();
  }
}
</script>
<style scoped>
.bg-color,
.bg-span {
  background: #22bbea;
}
.icons {
  display: none;
}
.show:hover .icons {
  display: flex;
  padding: 0;
  margin: 0;
}
</style>
