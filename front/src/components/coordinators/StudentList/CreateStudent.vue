<template>
  <div>
    <div class="container w-10/12 m-auto flex justify-between box-border">
      <div class="side-left"></div>
      <div class="side-right flex space-x-3">
        <div class="mt-[1.5rem]">
          <input
            type="file"
            name="file"
            id="file"
            hidden
            @change="import_student"
          />
          <label class="import_excel cursor-pointer" for="file">
            <img
              class="flex items-center cursor-pointer mt-[3.5rem] w-[65px] h-11"
              :src="require('../../../assets/excel-icon.png')"
            />
          </label>
        </div>
        <div class="w-full justify-end">
          <add-student-button
            type="button"
            class="
            flex justify-center 
              mt-[5rem]
              btn-add
              bg-sky-400
              text-white text-sm
              py-1
              font-bold
              rounded
              shadow
              hover:shadow-lg
              outline-none
              focus:outline-none
              mr-1
              ease-linear
              transition-all
              duration-150
            "
            v-on:click="toggleModal()"
          >
            Create Student
          </add-student-button>
        </div>
      </div>
      <div
        v-if="showModal"
        class="
          overflow-x-hidden overflow-y-auto
          fixed
          inset-0
          z-50
          outline-none
          focus:outline-none
          justify-center
          items-center
          flex
        "
      >
        <div class="form-container shadow-md rounded w-2/5">
          <h2 class="header text-center text-white py-3">
            Create Student Account
          </h2>
          <form-create-student
            @isShow="onChange"
            @cancel="on_cancel"
          ></form-create-student>
        </div>
      </div>
      <div
        v-if="showModal"
        class="opacity-30 fixed inset-0 z-40 bg-black"
      ></div>
    </div>
  </div>
</template>

<script>
import axiosClient from "../../../axios-http";

import ButtonViewVue from "@/components/button/ButtonView.vue";
import FormComponent from "./FormComponent.vue";

export default {
  components: {
    "add-student-button": ButtonViewVue,
    "form-create-student": FormComponent,
  },

  data() {
    return {
      showModal: false,
    };
  },
  methods: {
    toggleModal: function () {
      this.showModal = !this.showModal;
    },
    on_cancel(cancel) {
      this.showModal = cancel;
    },
    onChange(isShow, data, isCreated, isExist) {
      this.showModal = isShow;
      this.$emit("add-student", data, isCreated, isExist);
    },
    import_student(event) {
      const body = new FormData();
      body.append("file", event.target.files[0]);
      body.append("_method", "post");
      axiosClient.post("import_file", body).then((response) => {
        console.log(response.data);
        window.location.reload();
      });
    },
  },
};
</script>

<style scoped>
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

</style>
