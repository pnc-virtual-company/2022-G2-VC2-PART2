<template>
  <div class="body-profils">
    <div class="comments">
      <div class="text-show">Teacher's Comments</div>
      <div class="container-comment overflow-y-scroll">

        <div class="card-display">
          <div class="body-comment" @click="PersonalTeacherComents()">
            <div class="account">
              <img id="imageround" src="../../../assets/cut.png" />
              <div class="m-3">
                <p class="names">Narong Nhor</p>
                <p>Web,02-20-2022</p>
              </div>
              <div class="num-comments">5 Comments</div>
              <div class="bells">
                <svg
                  class="h-10 w-10 text-sky-500"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                  <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
                <h1 class="numbs z-20">12</h1>
              </div>
            </div>
          </div>
          <comment-teacher-personal v-show="teacherComents" />
        </div>
        
        <div class="card-display">
          <div class="body-comment" @click="PersonalTeacherComents()">
            <div class="account">
              <img id="imageround" src="../../../assets/cut.png" />
              <div class="m-3">
                <p class="names">Narong Nhor</p>
                <p>Web,02-20-2022</p>
              </div>
              <div class="num-comments">5 Comments</div>
              <div class="bells">
                <svg
                  class="h-10 w-10 text-sky-500"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                  <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
                <h1 class="numbs z-20">12</h1>
              </div>
            </div>
          </div>
          <comment-teacher-personal v-show="teacherComents" />
        </div>

      </div>
    </div>
    <student-contain class="tutors" />
  </div>
</template>
<script>
import StudentViews from "./TutorCommentView.vue";
import TeacerhPersonalComment from "./PersonalTeacherCommentView.vue";
import axiosClient from "../../../axios-http";
export default {
  components: {
    "student-contain": StudentViews,
    "comment-teacher-personal": TeacerhPersonalComment,
  },
  name: "ToggleDiv",
  data: function () {
    return {
      comments:[],
      teacherComents: false,
    };
  },

  methods: {
    PersonalTeacherComents() {
      this.teacherComents = !this.teacherComents;
    },

    getComments() {
      axiosClient.get("comments/get").then((response) => {
        this.comments = response.data;
        console.log(response.data)
      });

    },

  },
};
</script>
<style scoped>
.body-profils {
  display: flex;
  justify-content: space-between;
}
.tutors {
  margin: 5px 5px;
  width: 760px;
}

.comments {
  margin: 5px 5px;
  width: 760px;
  background: rgb(188, 221, 224);
}

.body-comment {
  width: 755px;
  margin: 10px auto 10px;
  justify-content: center;
  align-items: center;
  border-left: solid 10px #4a90f8;
  border-radius: 5px;
  background: #ffffff;
}
.body-comment:hover {
  background: #e9e9e9;
  cursor: pointer;
}

.text-show {
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  font-size: 28px;
  display: flex;
  text-align: center;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  background: #22bbea;
  color: white;
  padding: 3px 3px;
}
.card-display {
  width: 755px;
  border-radius: 5px;
  /* display: flex; */
  justify-content: flex-start;
  background: #f0f0f0;
  margin-right: 4px;
}

.account {
  display: flex;
}
#imageround {
  width: 60px;
  height: 8vh;
  margin: 10px 11px;
  border-radius: 100px;
}

.text-name {
  margin: 5px 5px;
}
.body-text {
  width: 320px;
  padding: 5px;
  margin: 6px;
  font-size: 18px;
  text-align: center;
  display: flex;
  margin: auto;
  justify-content: center;
}
.Allcomments {
  display: flex;
  padding: 10px 10px;
  border-radius: 5px;
  margin: 10px auto 10px;
  color: white;
  font-weight: bold;
  justify-content: center;
}
.names {
  font-size: 20px;
  font-weight: bold;
}
.num-comments {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: auto;
  font-size: 20px;
}
.bells {
  margin: 10px 5px;
}
.numbs {
  display: flex;
  margin-left: 20px;
  width: 20px;
  font-size: 14px;
  text-align: center;
  justify-content: center;
  margin-top: -44px;
  background: red;
  color: white;
  border-radius: 20px;
}

.container-comment {
  width: 945px;
  height: 80vh;
  overflow-x: hidden;
}
</style>
