<template>
  <div class="student-following-up">
    <div class="p w-[82.6%] m-auto box-border mt-4 flex justify-between">
      <vue-awesome-paginate class="text-orange-600" :current-page="currentPage" :total-items="total"
        :items-per-page="perPage" :on-click="pageChange">
      </vue-awesome-paginate>
      <div class="bg-sky-300 w-12 h-12 rounded-full hover:bg-light_blue flex justify-center items-center cursor-pointer" @click="showModal=true">
        <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
          stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" />
          <line x1="12" y1="5" x2="12" y2="19" />
          <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
      </div>
    </div>
    <div v-if="showModal">
      <add-to-follow-up>
        <div class="container w-full">
          <div class="relative w-auto my-6 mx-auto max-w-6xl">
            <div
              class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-gray-300 outline-none focus:outline-none">
              <div class="flex items-start justify-center p-3 rounded-t header bg-primary">
                <h2 class="text-center font-bold text-white text-xl">
                  Add student to follow up
                </h2>
              </div>
              <div class="body-model px-4 py-4">
                <div @click="back_page"
                  class="back bg-sky-300 w-12 h-12 rounded-full hover:bg-light_blue cursor-pointer flex justify-center items-center">
                  <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                  </svg>
                </div>
                <student-list :students="data" @student_id="add_to_follow_up"></student-list>
              </div>
            </div>
          </div>
        </div>
      </add-to-follow-up>
      <div v-if="showModal" class="opacity-50 fixed inset-0 z-40 bg-black"></div>
    </div>
    <student-table :students="data" @student_id="add_to_follow_up"></student-table>
  </div>
</template>

<script>
import FormView from "../../coordinators/teacher/FormCreateTeacherComponent.vue";
import StudentFollowingTable from "../table/StudentFollowingUpTable.vue";
import axiosClient from "../../../axios-http";
import StudentFollowList from '.././../teachers/studentList/StudentView.vue'
export default {
  components: {
    "student-table": StudentFollowingTable,
    'add-to-follow-up': FormView,
    'student-list': StudentFollowList
  },
  data() {
    return {
      currentPage: 1,
      total: 0,
      perPage: 10,
      data: [],
      showModal: false,
    };
  },
  methods: {
    pageChange(pageNumber) {
      this.currentPage = pageNumber;
      this.getData();
    },
    async getData() {
      let response = await axiosClient.get(
      `get_student_follwing_up/?page=${this.currentPage}`
      );
      let responseData = response.data;
      this.data = responseData.data;
      this.perPage = responseData.per_page;
      this.total = responseData.total;
    },
    add_to_follow_up(student_id) {
      let body = {}
      body['status'] = false;
      axiosClient.put("teachers/student_status/" + student_id, body)
      this.getData()
    },
    add_student_list() {
      this.showModal = true;
    },
    back_page(){
      this.showModal=false
       this.getData()

    }
  },
  mounted() {
    this.currentPage = 1;
    this.getData();
  },
};
</script>

<style>
.pagination-container {
  display: flex;
  column-gap: 10px;
}

.paginate-buttons {
  height: 40px;
  width: 40px;
  border-radius: 20px;
  cursor: pointer;
  background-color: rgb(242, 242, 242);
  border: 1px solid rgb(217, 217, 217);
  color: black;
}

.paginate-buttons:hover {
  background-color: #d8d8d8;
}

.active-page {
  background: #22bbea;
  border: 1px solid #22bbea;
  color: white;
}

.active-page:hover {
  background-color: rgb(14 165 233);

}
</style>