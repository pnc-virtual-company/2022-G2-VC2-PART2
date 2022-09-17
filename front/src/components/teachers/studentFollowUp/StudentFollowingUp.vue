<template>
  <div class="student-following-up">
    <div class="p w-[82.6%] m-auto box-border mt-4">
      <vue-awesome-paginate class="text-orange-600"
        :current-page="currentPage"
        :total-items="total"
        :items-per-page="perPage"
        :on-click="pageChange"
      >
      </vue-awesome-paginate>
    </div>
    <student-table :students="data" @student_id="add_to_follow_up"></student-table>
  </div>
</template>

<script>
import StudentFollowingTable from "../table/StudentFollowingUpTable.vue";
import axiosClient from "../../../axios-http";
import Swal from "sweetalert2";
export default {
  components: {
    "student-table": StudentFollowingTable,
  },
  data() {
    return {
      currentPage: 1,
      total: 0,
      perPage: 10,
      data: [],
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
    add_to_follow_up(student_id){
      let body={}
      body['status']=false; 
      Swal.fire({
          title: "Are you sure?",
          text: "You want to unfollow this student!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#22BBEA",
          cancelButtonColor: "#FFAD5C",
          confirmButtonText: "Unfollow-Up",
        }).then((result) => {
          if (result.isConfirmed) {
               axiosClient.put("teachers/student_status/"+ student_id, body);
              this.getData()
          }
          });
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
  background-color:  rgb(14 165 233);

}

</style>
