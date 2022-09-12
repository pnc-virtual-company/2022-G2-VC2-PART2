<template>
    <div class="student">
      <div class="container w-10/12 m-auto flex justify-between">
        <div class="side-left"></div>
        <div class="side-right">

          <add-student-button type="button"
            class="btn-add text-white text-sm px-3 py-1 mt-3 font-bold rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            v-on:click="toggleModal()">
            Create Student
          </add-student-button>
          
        </div>
        <div v-if="showModal"
          class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
          <div class="form-container shadow-md rounded w-2/5">
            <h2 class="header text-center text-white py-3">Create Student Account</h2>
            <form-create-student @isShow="onChange"></form-create-student>
          </div>
        </div>
        <div v-if="showModal" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
      </div>
    </div>
  </template>
  
  <script>
  import ButtonViewVue from "@/components/button/ButtonView.vue";
  import FormComponent from "./FormComponent.vue"
 
  export default {
    components: {
      'add-student-button': ButtonViewVue,
      'form-create-student': FormComponent,
    },
    emits: [''],
    data(){
      return {
        showModal: false,
      }
    },
    methods: {
      toggleModal: function(){
        this.showModal = !this.showModal;
      },
      onChange(isShow,data){
        this.showModal = isShow;
        this.$emit('add-student',data);
      },
    }
  }
  </script>
  
  <style scoped>
  .btn-add {
    background: #22BBEA;
  }
  .header {
      background: #22BBEA;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      font-weight: bold;
      font-size: 20px;
  }
  
  .form-container {
      background: #BBD7E0;
  }
  </style>