<template>
  <div class="form">
    <div
      class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
    >
    <slot>
        <div class="container w-2/5">
        <div class="relative w-auto my-6 mx-auto max-w-6xl">
          <div
            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
          >
            <div class="flex items-start justify-center p-3 rounded-t header">
              <h2 class="text-center font-bold text-white text-xl">
                Create Teacher Account
              </h2>
            </div>
            <div class="body-model px-4">
              <div class="relative p-1 mt-6">
                <form @submit.prevent="create_teacher">
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
                      <div class="relative">
                        <select
                          v-model="position"
                          class="w-full border px-4 pr-8 py-1 rounded focus:border-blue-500 focus:shadow-outline outline-none text-slate-500 appearance-none"
                          id="select-item"
                        >
                          <option disabled value="Position">Position</option>
                          <option value="WEB Trainer" class="text-black">WEB Trainer</option>
                          <option value="SNA Trainer" class="text-black">
                            SNA Trainer
                          </option>
                          <option value="English Trainer" class="text-black">English Trainer</option>
                          <option value="PL Trainer" class="text-black">PL Trainer</option>
                          <option value="Social Affair" class="text-black">Social Affair</option>

                        </select>
                        <small v-if="positions">Position is required</small>
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
                </form>
                <div
                class="flex items-center justify-end space-x-1 px-2 border-solid rounded-b mb-4"
              >
                <Button-view
                  class="cancle rounded-b text-white px-2 text-sm rounded shadow hover:shadow-lg hover:bg-orange-400 outline-none focus:outline-none"
                  @click="cancle()"
                  >Cancle</Button-view
                >
                <Button-view
                  class="add rounded-b text-white px-2 text-sm rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none"
                  @click="add()"
                  >Create</Button-view
                >
              </div>
              </div>
              <!--footer-->
             
            </div>
          </div>
        </div>
      </div>
    </slot>
      
    </div>
  </div>
</template>
<script>
import ButtonView from "../../button/ButtonView.vue";
export default {
  components: {
    "Button-view": ButtonView,
  },
  data() {
    return {
      show_model: false,
      first_name: "",
      last_name: "",
      gender: "Gender",
      position: "",
      email: "",
      phone: "",
      firstname: false,
      lastname: false,
      genders: false,
      positions: false,
      emails: false,
      phones: false,
    };
  },
  methods: {
    cancle() {
      this.$emit("change_model", this.show_model);
    },
    add() {
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
        this.$emit("add", this.show_model, info_of_teacher);
        this.first_name = "";
        this.last_name = "";
        this.gender = "";
        this.position = "";
        this.email = "";
      }
    },
  },
};
</script>

<style scoped>
.cancle {
  background-color: #ffad5c;
}
.add {
  background-color: #22bbea;
  margin-left: 10px;
}
.header {
  background-color: #22bbea;
}
.body-model {
  background-color: #bbd7e0;
}

small {
  color: red;
}
</style>
