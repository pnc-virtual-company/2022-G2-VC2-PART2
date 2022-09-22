<template>
  <div class="w-full">
     <nav  v-for="student of students" :key="student" class="flex justify-between z-10 flex pl-4 pr-4 text-center items-center w-full">
      <div class="flex items-center">
        <img src="../../../assets/logo.png" class="w-16">
      </div>
      <div class="w-[20%] justify-end flex items-center ">
        <h1 class="p-2 font-bold text-white">
          {{ student.users.first_name }} {{ student.users.last_name }}
        </h1>
        <img
          @click="show_profile"
          class="h-[50px] w-[50px] rounded-full cursor-pointer"
          :src=student.users.profile
        />
        <a href="log_out">
          <log-out @click="log_out" class="cursor-pointer ml-3 mr-3" />
        </a>
      </div>
    </nav>

    <student-profile v-if="is_show" @close_profile="close_profile" >
      <div v-for="student of students" :key="student" class="modal-mask">
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
              class="h-6 w-6 text-red-500 m-auto mr-3 cursor-pointer bg-gray-200 p-1 rounded-full"
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

          <div class="modal-container p-2 bg-blue-200">
            <div class="text-center">
              <div class="img">
                <img
                  class="m-auto h-[100px] w-[100px] rounded-full border border-gray-600"
                  :src="student.users.profile"
                  alt=""
                />
                <label for="file"
                  ><svg
                    class="h-8 w-8 text-gray profile cursor-pointer bg-gray-200 p-1 rounded-full"
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
                <input type="file" id="file" name="image" hidden @change="add_user_profile"/>
              </div>
              <p class="text-xl font-bold mb-5">
                {{ student.first_name}} {{ student.last_name}}
              </p>
            </div>

            <div class="flex justify-center item-center">
              <div>
                <p><span class="font-bold">Major</span></p>
                <p><span class="font-bold">Generation</span></p>
                <p><span class="font-bold">Gendar</span></p>
                <p><span class="font-bold">Role</span></p>
                <p><span class="font-bold">Date Of Birth</span></p>
                <p><span class="font-bold">Phone Number</span></p>
                <p>
                  <span class="font-bold">Email</span>
                </p>
              </div>

              <div class="mr-3 ml-3">
                <p><span class="font-bold">:</span></p>
                <p><span class="font-bold">:</span></p>
                <p><span class="font-bold">:</span></p>
                <p><span class="font-bold">:</span></p>
                <p><span class="font-bold">:</span></p>
                <p><span class="font-bold">:</span></p>
                <p class="mb-5">
                  <span class="font-bold">:</span>
                </p>
              </div>

              <div>
                <p><span class="font-bold"></span>{{ student.major }}</p>
                <p><span class="font-bold"></span>{{ student.generation }}</p>
                <p><span class="font-bold"></span>{{ student.users.gender }}</p>
                <p><span class="font-bold"></span>Student</p>
                 <p><span class="font-bold"></span>{{ student.date_of_birth }}</p>
                  <p><span class="font-bold"></span>{{ student.phone }}</p>
                <p class="mb-5">
                  <span class="font-bold"></span>
                  {{ student.users.email }}
                </p>
              </div>
            </div>
            <div class="text-center">
               <button class="bg-blue-400 text-white p-1 rounded " type="submit">Reset Password</button>
            </div>
          </div>
        </div>
      </div>
    </student-profile>
    <router-view></router-view>
  </div>
</template>
<script>
  import LogoutIcon from '../../coordinators/icons/LogoutIcon.vue';
  import axiosClient from '../../../axios-http'
  import SlotProfile from '../../profiles/SlotProfile.vue';
  import StudentContent from '../studentView/AllTeachersPlaceComment.vue';
  import DetailAccount from '../studentView/StudentDetailAccountview.vue'
export default {
  components:{
    'log-out': Logout,
    StudentContent,
    "detail-account":DetailAccountIcon,
    'student-profile': SlotProfile
  },

  data(){
    return{
      students: [],
      student_profile: "",
      is_show: false
    }
  },
  methods:{
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

    get_students() {
      var stu_id = this.$cookies.get('user_id');
      axiosClient.get("students/get/" + stu_id).then((response) => {
        this.students = response.data;
        
      });
    },
    async add_user_profile(event) {
      const id = this.$cookies.get('user_id');
      this.student_profile = event.target.files[0];
      console.log(this.student_profile);
      const body = new FormData();
      body.append('profile', this.student_profile)
      body.append('_method', 'PUT')
      axiosClient.post("update_img_user/"+ id, body).then((response) => {
        console.log(response.data);
        this.get_students();
      });

    },

  },
  mounted() {
      this.get_students();
    }
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
    width: 40%;
    height: auto;
    margin: 0px auto;
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
    z-index: 10;
  }

  .navbar {
    position:fixed;
    top: 0;
    margin: 0;
    padding: 0;
  }

</style>