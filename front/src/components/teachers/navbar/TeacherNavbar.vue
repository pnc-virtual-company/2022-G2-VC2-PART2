<template>
  <div>
    <nav class="flex pl-4 pr-4 text-center w-full">
      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="w-20">
      </div>

      <div class="flex justify-center items-center w-full">
        <router-link class="px-3 py-2 rounded-md text-white text-xl mr-5 active" to="/teachers/student_list">All
          students</router-link>
        <router-link class="px-3 py-2 rounded-md text-white text-xl ml-5 active" to="/teachers/student_follow_up">Follow
          Up</router-link>
      </div>

      <div class="flex items-center">
        <h1 class="w-full font-bold text-white">{{user.first_name}} {{user.last_name}}</h1>
        <div>
          <img @click="show_profile()" class="w-24 rounded-full" :src=user.profile alt="">
        </div>
        <a href="log_out">
        <LogoutIcon @click="log_out" class="cusor-pointer ml-3 mr-3" />
        </a>
      </div>
    </nav>
    <teacher-profile v-if="is_show" @close_profile="close_profile">
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
              <div class="img ">
                <img class="m-auto w-full w-32 h-32 rounded-full" :src="user.profile" alt="" />
                <label for="file"><svg class="h-8 w-8 text-gray profile" width="32" height="32" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path
                      d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                    <circle cx="12" cy="13" r="3" />
                  </svg></label>
                <input type="file" id="file" name="image" hidden @change="add_user_profile" />
              </div>
              <p class="text-xl font-bold mb-5">

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
                <p><span class="font-bold"></span>{{user.gender}}</p>
                <p v-if="user.role == 2">
                  <span class="font-bold"></span>Teacher
                </p>
                <p class="mb-5">
                  <span class="font-bold"></span>
                  {{user.email}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </teacher-profile>
    <router-view />
  </div>
</template>

<script>
import LogoutIcon from '../../coordinators/icons/LogoutIcon.vue'
import axiosClient from '../../../axios-http'
import TeacherProfile from '../../profiles/SlotProfile.vue';
import CryptoJS from 'crypto-js';
export default {
  components: {
    LogoutIcon,
    'teacher-profile': TeacherProfile
  },
  data() {
    return {
      user: {},
      is_show: false,
      studentProfile: "",
      studentId: null,
    }
  },

  methods: {
    decrypt_id() {
      var cookiesId = this.$cookies.get('id');
      if (cookiesId != null) {
        var encryptedId = CryptoJS.AES.decrypt(cookiesId, 'user_id');
        var oringinId = encryptedId.toString(CryptoJS.enc.Utf8);
        return oringinId;
      }
    },
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

    get_teacher() {
      axiosClient.get("teachers/get_teacher_id/" + this.decrypt_id())
        .then((response) => {
          this.user = response.data[0]
          console.log(response.data[0]);
          console.log(this.decrypt_id());
        });
    },
    async add_user_profile(event) {
      var id = this.decrypt_id();
      this.studentProfile = event.target.files[0];
      console.log(this.studentProfile);
      const body = new FormData();
      body.append('profile', this.studentProfile)
      body.append('_method', 'PUT')
      axiosClient.post("update_img_user/" + id, body).then((reponse) => {
        console.log(reponse.data);
        this.get_teacher()
      });
    },
  },
  mounted() {
    this.get_teacher()
  }
}
</script>


<style scoped>
nav {
  background-color: #22BBEA;
}

nav a.router-link-exact-active.active {
  background-color: #FFAD5C;
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
  vertical-align: top;

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

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}

.modal-enter-active .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.profile {
  text-decoration: none;
  position: absolute;
  font-size: 1.3rem;
  margin: -2.5rem 14rem;
  color: gray;
}
</style>