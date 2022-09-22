<template>
  <section>
    <student-list class="mt-[5rem]"
    />

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
  </section>
</template>

<script>
  import StudentFollowList from '../table/StudentFollowList.vue'
  // import axiosClient from '../../../axios-http'
export default {
  components:{
    "student-list":StudentFollowList
  },

  // methods: {
  //   pageChange(pageNumber) {
  //     this.currentPage = pageNumber;
  //     this.getData();
  //   },
  //   async getData() {
  //     let response = await axiosClient.get(
  //       `students/get/?page=${this.currentPage}`
  //     );
  //     let responseData = response.data;
  //     this.student_lists = responseData.data;
  //     this.perPage = responseData.per_page;
  //     this.total = responseData.total;
  //   },
  // },

  // mounted() {
  //   this.currentPage = 1;
  // }

}
</script>

<style scoped>

</style>
