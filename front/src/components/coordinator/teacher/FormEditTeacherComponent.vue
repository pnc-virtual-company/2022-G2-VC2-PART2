<template>
  <div class="form">
    <div
      class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
    >
      <div class="container w-2/5">
        <div class="relative w-auto my-6 mx-auto max-w-6xl">
          <div
            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
          >
            <div class="flex items-start justify-center p-3 rounded-t header">
              <h2 class="text-center font-bold text-white text-xl">
                Edit Teacher Account
              </h2>
            </div>
            <div class="body-model px-4">
              <div class="relative p-1 mt-6">
                <form>
                  <div class="grid grid-cols-2">
                    <div class="mb-4 px-2 w-full">
                      <label class="block mb-1 text-sm" for="input1"
                        >FirstName</label
                      >
                      <input
                        id="input1"
                        class="w-full border px-4 py-1 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                        type="text"
                        autofocus
                        placeholder="First Name"
                        v-model="first_name"
                      />
                      <small v-if="firstname">First name is required</small>
                    </div>
                    <div class="mb-4 px-2 w-full">
                      <label class="block mb-1 text-sm" for="input1"
                        >LastName</label
                      >
                      <input
                        id="input1"
                        class="w-full border px-4 py-1 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                        type="text"
                        autofocus
                        placeholder="Last Name"
                        v-model="last_name"
                      />
                      <small v-if="lastname">Last Name is required</small>
                    </div>
                    <div class="mb-4 px-2 w-full">
                      <label class="block mb-1 text-sm" for="input1"
                        >Gender</label
                      >
                      <div class="relative">
                        <select
                          v-model="gender"
                          class="w-full border px-4 pr-8 py-1 rounded focus:border-blue-500 focus:shadow-outline outline-none text-slate-500 appearance-none"
                          id="select-item"
                        >
                          <option>Gender</option>
                          <option value="Male" class="text-black">Male</option>
                          <option value="Female" class="text-black">
                            Female
                          </option>
                        </select>
                        <small v-if="genders">Gender is required</small>
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
                    </div>
                    <div class="mb-4 px-2 w-full">
                      <label class="block mb-1 text-sm" for="input1"
                        >Position</label
                      >
                      <input
                        id="input1"
                        class="w-full border px-4 py-1 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                        type="text"
                        autofocus
                        placeholder="Position"
                        v-model="position"
                      />
                      <small v-if="positions">Position is required</small>
                    </div>
                    <div class="mb-4 px-2 w-full">
                      <label class="block mb-1 text-sm" for="input1"
                        >Email</label
                      >
                      <input
                        id="input1"
                        class="w-full border px-4 py-1 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                        type="text"
                        autofocus
                        placeholder="Email"
                        v-model="email"
                      />
                      <small v-if="emails">Email is required</small>
                    </div>
                    <div class="mb-4 px-2 w-full">
                      <label class="block mb-1 text-sm" for="input1"
                        >Phone</label
                      >
                      <input
                        id="input1"
                        class="w-full border px-4 py-1 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                        type="text"
                        autofocus
                        placeholder="Phone"
                        v-model="phone"
                      />
                      <small v-if="phones">Phone is required</small>
                    </div>
                  </div>
                  <div
                class="flex items-center justify-end p-2 border-slate-200 mt-2 rounded-b"
              >
                <Button-view
                  class="cancle text-white active:bg-orange-600 text-sm rounded px-2 mr-3 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  @click="onCancel()"
                  >Cancle</Button-view
                >
                <Button-view
                  class="add text-white active:bg-sky-600 text-sm text-sm px-2 rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  @click="edit_teacher()"
                  >Edit</Button-view
                >
                  </div>
                </form>
              </div>
              <!--footer-->
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axiosClient from "../../../axios-http";
import ButtonView from "../../button/ButtonView.vue";
export default {
  components: {
    "Button-view": ButtonView,
  },
  props: ["teacher_id"],
  data() {
    return {
      first_name: "",
      last_name: "",
      gender: "Gender",
      position: "",
      email: "",
      phone: "",
      id_teacher: this.teacher_id,
    };
  },
  methods: {
    onCancel() {
      this.$emit("cancel", false);
    },
    show_teacher_data() {
      axiosClient.get("teachers/" + this.id_teacher).then((response) => {
        let teacher_data = response.data[0];
        this.first_name = teacher_data.users.first_name;
        this.last_name = teacher_data.users.last_name;
        this.gender = teacher_data.users.gender;
        this.position = teacher_data.position;
        this.email = teacher_data.users.email;
        this.phone = teacher_data.phone;
      });
    },
    edit_teacher() {
      if (this.first_name.trim().length == 0) {
        this.firstname = true;
      } else {
        this.firstname = false;
      }
      if (this.last_name.trim().length == 0) {
        this.lastname = true;
      } else {
        this.lastname = false;
      }

      if (this.gender == "Gender") {
        this.genders = true;
      } else {
        this.genders = false;
      }

      if (this.position.trim().length == 0) {
        this.positions = true;
      } else {
        this.positions = false;
      }
      if (this.email.trim().length == 0) {
        this.emails = true;
      } else {
        this.emails = false;
      }
      if (this.phone.trim().length == 0) {
        this.phones = true;
      } else {
        this.phones = false;
      }

      if (
        this.first_name.trim().length > 0 &&
        this.last_name.trim().length > 0 &&
        this.gender.trim().length > 0 &&
        this.gender != "Gender" &&
        this.position.trim().length > 0 &&
        this.email.trim().length > 0 &&
        this.phone.trim().length > 0
      ) {
        let info_of_teacher = {
          first_name: this.first_name,
          last_name: this.last_name,
          gender: this.gender,
          position: this.position,
          email: this.email,
          phone: this.phone,
        };
        console.log(info_of_teacher);
        this.$emit("cancel", false);
        this.$emit("edit-teacher",this.id_teacher,info_of_teacher);
        this.first_name = "";
        this.last_name = "";
        this.gender = "";
        this.position = "";
        this.email = "";
      }
    },
  },
  mounted() {
    this.show_teacher_data();
  },
};
</script>

<style scoped>
.cancle {
  background-color: #ffad5c;
}
.add {
  background-color: #22bbea;
}
.header {
  background-color: #22bbea;
}
.body-model {
  background-color: #bbd7e0;
}
</style>
