<template>
  <div>
    <nav class="flex navbar z-10 pl-4 pr-4 text-center w-full drop-shadow-lg">
      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="w-20" />
      </div>

      <div class="flex justify-center items-center w-full">
        <router-link class="px-3 py-2 rounded-md text-white text-xl active" to="/coordinator/teacher_list">All Teachers
        </router-link>
        <router-link class="px-3 py-2 rounded-md text-white text-xl active" to="/coordinator/student_list">All Students
        </router-link>
        <router-link class="px-3 py-2 rounded-md text-white text-xl active" to="/coordinator/student_follow_up">Student
          Follow Up</router-link>
      </div>

      <div class="flex items-center w-[20%]">
        <h1 class="p-2 font-bold text-white">
          {{ coordinator.first_name }} {{ coordinator.last_name }}
        </h1>
        <img
          @click="show_profile"
          class="h-[50px] w-[50px] rounded-full cursor-pointer"
          :src="coordinator.profile"
        />
        <a href="log_out">
          <LogoutIcon @click="log_out" class="cursor-pointer ml-3 mr-3" />
        </a>
      </div>
    </nav>

    <coor-profile v-if="is_show" @close_profile="close_profile">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="
              flex
              items-start
              justify-center
              py-2
              rounded-t
              header
              bg-blue-400
            ">
            <h2 class="flex justify-center w-full text-white text-xl">
              Profile
            </h2>
            <svg @click="close_profile" class="h-6 w-6 text-red-500 m-auto mr-3 cursor-pointer" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </div>

          <div class="modal-container p-2 bg-blue-200">
            <div class="text-center">
              <div>
                <img class="m-auto w-32 h-32 rounded-full w-[100px] h-[100px] border-sky-300" :src="coordinator.profile" alt="" />
                <label for="file">
                  <svg class="h-8 w-8 p-1 rounded-full bg-gray-300 text-gray profile" width="32" height="32" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path
                      d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                    <circle cx="12" cy="13" r="3" />
                  </svg></label>
                <input type="file" id="file" name="image" hidden @change="add_user_profile" />
              </div>
              <p class="text-xl font-bold mb-5">
                {{ coordinator.first_name }} {{ coordinator.last_name }}
              </p>
            </div>

            <div class="flex justify-center item-center">
              <div>
                <p><span class="font-bold">Gendar</span></p>
                <p><span class="font-bold">Role</span></p>
                <p>
                  <span class="font-bold">Email</span>
                </p>
              </div>

              <div class="mr-3 ml-3">
                <p><span class="font-bold">:</span></p>
                <p><span class="font-bold">:</span></p>
                <p class="mb-5">
                  <span class="font-bold">:</span>
                </p>
              </div>

              <div>
                <p><span class="font-bold"></span>{{ coordinator.gender }}</p>
                <p v-if="coordinator.role == 1">
                  <span class="font-bold"></span>Coordinator
                </p>
                <p class="mb-5">
                  <span class="font-bold"></span>{{ coordinator.email }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </coor-profile>
    <router-view></router-view>
  </div>
</template>
<script>
import LogoutIcon from "../icons/LogoutIcon.vue";
import SlotProfile from "../../profiles/SlotProfile.vue";
import axiosClient from "../../../axios-http";
export default {
  components: {
    LogoutIcon,
    "coor-profile": SlotProfile,
  },
  data() {
    return {
      is_show: false,
      coordinator: {},
      studentId: null,
      studentProfile: "",
    };
  },
  methods: {
    log_out() {
      this.$cookies.remove('token');
      this.$cookies.remove('role');
      this.$cookies.remove('id');
      this.$emit('logout', '0');
    },

    show_profile() {
      this.is_show = true;
    },

    close_profile() {
      this.is_show = false;
    },

    get_coordinator() {
      axiosClient.get("coordinators/get/1").then((response) => {
        this.coordinator = response.data;
      });
    },
    async add_user_profile(event) {
      var id = this.decrypt_id();
      console.log(id);
      this.studentProfile = event.target.files[0];
      console.log(this.studentProfile);
      const body = new FormData();
      body.append('profile', this.studentProfile)
      body.append('_method', 'PUT')
      axiosClient.post("update_img_user/" + id, body).then((reponse) => {
        console.log(reponse.data);
        this.get_coordinator();
      });

    },
  },

  mounted() {
    this.get_coordinator();
  },
};
</script>


<style scoped>
nav {
  background-color: #22bbea;
}

nav a.router-link-exact-active.active {
  background-color: #ffad5c;
}

.modal-mask {
  position: fixed;
  z-index: 10;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: center;

}

.modal-container,
.header {
  width: auto;
  width: 40%;
  height: auto;
  margin: 0px auto;
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
  z-index: 10;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}
.navbar {
    position:fixed;
    top: 0;
    margin: 0;
    padding: 0;
  }

  .profile{
      text-decoration: none;
      position: absolute;
      font-size: 1.3rem;
      margin:-2.5rem 18.5rem;
      color: black;
  }
</style>