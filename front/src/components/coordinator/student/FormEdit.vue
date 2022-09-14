<template>
  <form class="px-5 pt-6 mb-5 box-border" @submit.prevent="onSubmit">
        <div class="input-group grid grid-cols-2 text-left">
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">First Name</label>
                <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus type="text" placeholder="First Name" v-model="first_name" />
                <error-message v-if="first_name_validation==false">*First Name is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Last Name</label>
                <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus placeholder="Last Name" v-model="last_name" />
                <error-message v-if="last_name_validation== false">*Last Name is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Gender</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="gender">
                        <option selected disabled>Gender</option>
                        <option value="Male" class="text-black">Male</option>
                        <option value="Female" class="text-black">Female</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Date of Birth</label>
                <input type="date" class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus v-model="date_of_birth">
                <error-message v-if="!date_validation">*Date is required</error-message>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Generation</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="generation">
                        <option selected disabled>Generation</option>
                        <option value="2022" class="text-black">2022</option>
                        <option value="2023" class="text-black">2023</option>
                        <option value="2024" class="text-black">2024</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Class</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="student_class">
                        <option selected disabled>Class</option>
                        <option value="Class A" class="text-black">Class A</option>
                        <option value="Class B" class="text-black">Class B</option>
                        <option value="Class C" class="text-black">Class C</option>
                        <option value="Class D" class="text-black">Class D</option>
                        <option value="None" class="text-black">None</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Major</label>
                <div class="relative">
                    <select
                        class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
                        id="select-item" v-model="major">
                        <option selected disabled>Major</option>
                        <option value="WEB-A" class="text-black">WEB</option>
                        <option value="SNA" class="text-black">SNA</option>
                        <option value="None" class="text-black">None</option>
                    </select>
                </div>
            </div>
            <div class="px-2 w-full">
                <label class="block mb-1 text-sm" for="input1">Phone Number</label>
                <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus placeholder="Phone Number" v-model="phone" />
                <error-message v-if="phone_validation == false">*Phone is required</error-message>
            </div>
        </div>
        <div class="mb-2 px-2 w-full">
            <label class="block mb-1 text-sm " for="input1">Email</label>
            <input class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded" autofocus placeholder="Email" v-model="email" />
            <error-message v-if="email_validation == false">*PNC Email is required</error-message>
        </div>
        <div class="flex items-center justify-end p-2 border-slate-200 mt-2 rounded-b">
        <button-add
          class="btn-cancel text-white active:bg-orange-600 text-sm rounded px-2 mr-3 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
          type="button"
          @click="onCancel"
        >
          Cancel
        </button-add>
        <button-add
          class="btn-submit text-white active:bg-sky-600 text-sm text-sm px-2 rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
          type="submit"
        >
          Save
        </button-add>
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
      last_name: "",
      email: "",
      gender: "Gender",
      generation: "Generation",
      student_class: "Class",
      major: 'Major',
      phone: "",
      date_of_birth: "",
      //
      email_validation: true,
      first_name_validation: true,
      last_name_validation: true,
      phone_validation: true,
      date_validation: true,
      id_student: this.student_id,
    };
  },
  methods: {
    show_student_data() {
      axiosClient.get("students/" + this.id_student).then((response) => {
        let student_data = response.data[0];
        this.phone = student_data.phone;
        this.generation = student_data.generation;
        this.first_name = student_data.users.first_name;
        this.last_name = student_data.users.last_name;
        this.email = student_data.users.email;
        this.gender = student_data.users.gender;
        this.major=student_data.major;
        this.student_class=student_data.class;
        this.date_of_birth=student_data.date_of_birth;
      });
    },
    onCancel() {
      this.$emit("isShow", false);
    },
    onSubmit() {
      this.validations();
      if (
        this.first_name.trim().length > 0 &&
        this.email.includes("@student.passerellesnumeriques.org") &&
        this.last_name.trim().length > 0 &&
        this.gender.trim().length > 0 &&
        this.gender != "Gender" &&
        this.generation.trim().length > 0 &&
        this.generation != "generation" &&
        this.phone.trim().length > 0
      ) {
        let new_student = {
          first_name: this.first_name,
          last_name: this.last_name,
          email: this.email,
          gender: this.gender,
          generation: this.generation,
          class: this.student_class,
          major: this.major,
          phone: this.phone,
          date_of_birth:this.date_of_birth
          
        };
        this.$emit("isShow", false);
        this.$emit("edit-student", new_student, this.id_student);
      }
    },
    validations() {
            if (this.first_name.trim().length == 0) {
                this.first_name_validation = false;
            } else {
                this.first_name_validation = true;
            }
            if (this.last_name.trim().length == 0) {
                this.last_name_validation = false;
            } else {
                this.last_name_validation = true;
            }
            if (this.phone.trim().length > 0) {
                this.phone_validation = true;
            } else {
                this.phone_validation = false;
            }
            if (this.date_of_birth.trim().length > 0) {
                this.date_validation = true;
            } else {
                this.date_validation = false;
            }
            if (this.email.trim().length > 0 && this.email.includes('@student.passerellesnumeriques.org')) {
                this.email_validation = true;
            } else {
                this.email_validation = false;
            }
     }
  },
  mounted() {
    this.show_student_data();
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
    is_phone() {
      return this.phone_validattion;
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
