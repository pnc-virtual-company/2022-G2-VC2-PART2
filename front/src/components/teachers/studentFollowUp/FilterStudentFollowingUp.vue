<template>
    <div class="filter-view flex mt-[3.3rem]">
      <!-- <div class="mb-4 px-2 w-full">
        <div class="flex w-full">
          <div
            class="bg-color flex items-center px-4 py-2 border-transparent border-r-0 rounded-l text-sm font-medium text-white select-none"
          >
            Filter By Generation
          </div>
          <div class="flex-1">
            <select
              class="w-full border px-4 py-2  rounded-r focus:border-blue-500 focus:shadow-outline outline-none"
              id="select-item"
              v-model="generation"
              @click="filter_by_generation"
            >
              <option value="All Generation" selected>All Generation</option>
              <option>2022</option>
              <option>2023</option>
              <option>2024</option>
            </select>
          </div>
        </div>
      </div>
      <div class="mb-4 px-2 w-full">
        <div class="flex w-full">
          <div
            class="bg-color flex border-transparent items-center px-4 py-2  border-r-0 rounded-l text-sm font-medium text-white select-none"
          >
            Filter By Name
          </div>
          <div class="flex-1">
            <input
              id="pretext-input"
              class="w-full border px-4 py-2 rounded-r focus:border-blue-500 focus:shadow-outline outline-none"
              type="text"
              v-model="text"
              @keyup="filter_by_name"
              placeholder="Search"
            />
          </div>
        </div>
      </div> -->
    </div>
  </template>
  
  <script>
  export default {
      data(){
          return{
              generation: "All Generation",
              text: "",
          }
      },
      methods:{
          filter_by_generation(){
              this.$emit('by_generation', this.generation)
          },
          filter_by_name(){
              this.$emit('by_name', this.text)
          }
      }
  };
  </script>
  
  <style scoped>
  .bg-color {
    background: #22bbea;
  }
  </style>
  