<template>
  <div class="student-following-up">
    <div class="paginate w-[82.6%] m-auto box-border mt-4">
      <VueTailwindPagination class="bg-none"
      :current="currentPage"
        :total="total"
        :per-page="perPage"
        @page-changed="pageChange($event)"
      >
      </VueTailwindPagination>
    </div>
    <student-table :students="data"></student-table>
  </div>
</template>

<script>
import StudentFollowingTable from './table/StudentFollowingUpTable.vue';
import "@ocrv/vue-tailwind-pagination/styles";
import VueTailwindPagination from "@ocrv/vue-tailwind-pagination";
import axiosClient from "../../axios-http";
export default {
components: {
  'student-table' : StudentFollowingTable,
  VueTailwindPagination,
},
data(){
  return{
    currentPage: 0,
      total: 0,
      perPage: 0,
      data: [],
  }
},
methods: {
    pageChange(pageNumber) {
      this.currentPage = pageNumber;
      this.getData();
    },
    async getData(){
      let response = await axiosClient.get (`get_student_follwing_up/?page=${this.currentPage}`);
      let responseData = response.data;
      this.data = responseData.data;
      this.perPage = responseData.per_page;
      this.total = responseData.total;

    }
  },
  mounted() {
    this.currentPage = 1;
    this.getData();
    
  },
}
</script>

<style>

</style>