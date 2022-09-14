<template>
  <form class="px-5 pt-6 mb-4" @submit.prevent="onSubmit">
    <div class="input-group grid grid-cols-2 text-left">
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">First Name</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          placeholder="First Name"
          v-model="first_name"
          @keyup="first_name_validated()"
        />
        <error-message v-if="is_first_name == false"
          >*First Name is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Last Name</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          placeholder="Last Name"
          v-model="last_name"
          @keyup="last_name_validated()"
        />
        <error-message v-if="is_last_name == false"
          >*Last Name is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Gender</label>
        <div class="relative">
          <select
            class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
            id="select-item"
            v-model="gender"
            @click="gender_validated()"
          >
            <option selected disabled>Gender</option>
            <option value="Male" class="text-black">Male</option>
            <option value="Female" class="text-black">Female</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
        <error-message v-if="is_gender == false"
          >*Gender is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Batch</label>
        <div class="relative">
          <select
            class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
            id="select-item"
            v-model="batch"
            @click="batch_validated()"
          >
            <option selected disabled>Batch</option>
            <option value="2023-WEB-A" class="text-black">2023-WEB-A</option>
            <option value="2023-WEB-B" class="text-black">2023-WEB-B</option>
            <option value="2023-SNA" class="text-black">2023-SNA</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
        <error-message v-if="is_batch == false"
          >*Batch is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Email</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          placeholder="Email"
          v-model="email"
          @keyup="email_validated()"
        />
        <error-message v-if="!is_mail">*PNC Email is required</error-message>
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Phone Number</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          placeholder="Phone Number"
          v-model="phone"
          @keyup="phone_validated()"
        />
        <error-message v-if="is_phone == false"
          >*Phone is required</error-message
        >
      </div>
      <div class="div"></div>
      <div class="flex items-center justify-end p-2 border-slate-200 rounded-b">
        <button-add
          class="btn-cancel text-white active:bg-orange-600 text-sm rounded px-2 mr-3 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          type="button"
          @click="onCancel"
        >
          Cancel
        </button-add>
        <button-add
          class="btn-submit text-white active:bg-sky-600 text-sm text-sm px-2 rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          type="submit"
        >
          Edit
        </button-add>
      </div>
    </div>
  </form>
</template>

<script>
import axiosClient from "../../../axios-http";
import ButtonViewVue from "@/components/button/ButtonView.vue";
import ErrorComponent from "../../message/ErrorComponent.vue";

export default {
  props: ["student_id"],
  components: {
    "button-add": ButtonViewVue,
    "error-message": ErrorComponent,
  },
  data() {
    return {
      first_name: "",
      last_name: "zxcvbn",
      email: "",
      gender: "Gender",
      batch: "Batch",
      phone: "",
      email_validattion: true,
      first_name_validattion: true,
      last_name_validattion: true,
      gender_validattion: true,
      batch_validattion: true,
      phone_validattion: true,
      id_student: this.student_id, 
    };
  },
  methods: {
    show_student_data(){
        axiosClient
          .get("students/"+ this.id_student)
          .then((response) => {
            let student_data= response.data[0]
            this.phone = student_data.phone
            this.batch = student_data.batch
            this.first_name = student_data.users.first_name
            this.last_name = student_data.users.last_name
            this.email = student_data.users.email
            this.gender = student_data.users.gender
          })
    },
    onCancel() {
      this.$emit("isShow",false);
   
    },
    onSubmit() {
      this.validations();
      if (
        this.first_name.trim().length > 0 &&
        this.email.includes("@student.passerellesnumeriques.org") &&
        this.last_name.trim().length > 0 &&
        this.gender.trim().length > 0 &&
        this.gender != "Gender" &&
        this.batch.trim().length > 0 &&
        this.batch != "Batch" &&
        this.phone.trim().length > 0
      ) {
        let new_student = {
          first_name: this.first_name,
          last_name: this.last_name,
          email: this.email,
          gender: this.gender,
          batch: this.batch,
          phone: this.phone,
        };
        this.$emit("isShow", false);
        this.$emit("edit-student", new_student,this.id_student);
      }
    },
    validations() {
      if (this.first_name.trim().length == 0) {
        this.first_name_validattion = false;
      } else {
        this.first_name_validattion = true;
      }
      if (this.last_name.trim().length == 0) {
        this.last_name_validattion = false;
      } else {
        this.last_name_validattion = true;
      }
      if (this.phone.trim().length == 0) {
        this.phone_validattion = false;
      } else {
        this.phone_validattion = true;
      }
      if (this.gender == "Gender") {
        this.gender_validattion = false;
      } else {
        this.gender_validattion = true;
      }
      if (this.batch.trim().length == 0 || this.batch == "Batch") {
        this.batch_validattion = false;
      } else {
        this.batch_validattion = true;
      }
      if (
        this.email.trim().length > 0 &&
        this.email.includes("@student.passerellesnumeriques.org")
      ) {
        this.email_validattion = true;
      } else {
        this.email_validattion = false;
      }
    },
    first_name_validated() {
      if (this.first_name.trim().length == 0) {
        this.first_name_validattion = false;
      } else {
        this.first_name_validattion = true;
      }
    },
    last_name_validated() {
      if (this.last_name.trim().length == 0) {
        this.last_name_validattion = false;
      } else {
        this.last_name_validattion = true;
      }
    },
    phone_validated() {
      if (this.phone.trim().length == 0) {
        this.phone_validattion = false;
      } else {
        this.phone_validattion = true;
      }
    },
    email_validated() {
      if (
        this.email.trim().length > 0 &&
        this.email.includes("@student.passerellesnumeriques.org")
      ) {
        this.email_validattion = true;
      } else {
        this.email_validattion = false;
      }
    },
    gender_validated() {
      if (this.gender == "Gender") {
        this.gender_validattion = false;
      } else {
        this.gender_validattion = true;
      }
    },
    batch_validated() {
      if (this.batch == "Batch") {
        this.batch_validattion = false;
      } else {
        this.batch_validattion = true;
      }
    },
  },
  mounted() {
    this.show_student_data()
  },
  computed: {
    is_mail() {
      return this.email_validattion;
    },
    is_first_name() {
      return this.first_name_validattion;
    },
    is_last_name() {
      return this.last_name_validattion;
    },
    is_batch() {
      return this.batch_validattion;
    },
    is_phone() {
      return this.phone_validattion;
    },
    is_gender() {
      return this.gender_validattion;
    },
  },
};
</script>
<style scoped>
.btn-cancel {
  background-color: #ffad5c;
}
.btn-submit {
  background-color: #22bbea;
}
</style>
