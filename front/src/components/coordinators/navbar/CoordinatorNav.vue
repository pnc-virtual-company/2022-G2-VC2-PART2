<template>
  <div>
    <nav class="flex pl-4 pr-4 text-center w-full drop-shadow-lg sticky">
      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="w-20" />
      </div>

      <div class="flex justify-center items-center w-full">
        <router-link
          class="px-3 py-2 rounded-md text-white text-xl active"
          to="/coordinator/teacher_list"
          >All Teachers</router-link
        >
        <router-link
          class="px-3 py-2 rounded-md text-white text-xl active"
          to="/coordinator/student_list"
          >All Students</router-link
        >
        <router-link
          class="px-3 py-2 rounded-md text-white text-xl active"
          to="/coordinator/student_follow_up"
          >Student Follow Up</router-link
        >
      </div>

     <div v-for="coordinate of coordinator" :key="coordinate" class="flex items-center">
        <h1 class="w-full font-bold text-white">{{coordinate.first_name}} {{coordinate.last_name}}</h1>
        <div>
          <img @click="show_profile" class="w-24 h-11 rounded-full cusor-pointer" :src=coordinate.profile alt="">
        </div>
        <a href="log_out"
          ><LogoutIcon @click="log_out" class="cusor-pointer ml-3 mr-3"
        /></a>
      </div>
    </nav>

    <coor-profile v-if="is_show" @close_profile="close_profile">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div
            class="
              flex
              items-start
              justify-center
              py-2
              rounded-t
              header
              bg-blue-400
            "
          >
            <h2 class="flex justify-center w-full text-white text-xl">
              Profile
            </h2>
            <svg
              @click="close_profile"
              class="h-6 w-6 text-red-500 m-auto mr-3 cursor-pointer"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </div>

          <div
            class="modal-container p-2 bg-blue-200"
            v-for="coordinate of coordinator"
            :key="coordinate"
          >
            <div class="text-center">
              <div>
                <img
                  class="m-auto w-24 h-24 rounded-full"
                  :src="coordinate.profile"
                  alt=""
                />
                <label for="file"
                  ><svg
                    class="h-8 w-8 text-gray profile"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path
                      d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"
                    />
                    <circle cx="12" cy="13" r="3" /></svg
                ></label>
                <input type="file" id="file" name="image" hidden />
              </div>
              <p class="text-xl font-bold mb-5">
                {{ coordinate.first_name }} {{ coordinate.last_name }}
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
                <p><span class="font-bold"></span>{{ coordinate.gender }}</p>
                <p v-if="coordinate.role == 1">
                  <span class="font-bold"></span>Coordinator
                </p>
                <p class="mb-5">
                  <span class="font-bold"></span>{{ coordinate.email }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </coor-profile>

    <router-view />
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
      id: null,
      coordinator: [],
    };
  },
  methods: {
    log_out() {
      localStorage.clear();
    },

    show_profile() {
      this.is_show = true;
    },

    close_profile() {
      this.is_show = false;
    },

    get_coordinator() {
      this.id = localStorage.getItem('id');
      axiosClient.get("coordinator/get/1").then((response) => {
        this.coordinator = response.data;
      });
      console.log(this.coordinator);
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

  .modal-container,
  .header {
    width: auto;
    width: 30%;
    height: auto;
    margin: 0px auto;
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
    z-index: 10;
  }

  .profile {
    text-decoration: none;
    position: absolute;
    font-size: 1.3rem;
    margin: -2.5rem 13.5rem;
    color: gray;
  }
</style>