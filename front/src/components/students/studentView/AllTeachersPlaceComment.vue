<template>
  <div class="body-profils">
    <div class="comments">
      <div class="text-show">Teacher's Comments</div>
      <div class="container-comment overflow-y-scroll">
        <div class="card-display" v-for="item of teacher_infor" :key="item">
          <div class="body-comment" @click="is_show(item.id)">
            <div class="account">
              <img id="imageround" :src="item.users.profile" />
              <div class="m-3">
                <p class="names">
                  {{ item.users.first_name }} {{ item.users.last_name }}
                </p>
                <p class="date">{{item.position}}</p>
              </div>
              <div class="num-comments">
                {{ item.list_comments.length }} comments
              </div>
              <div class="bells">
                <svg
                  class="h-10 w-10 text-sky-500"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                  <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
                <h1 class="numbs z-20">{{ item.notification }}</h1>
              </div>
            </div>
          </div>
          <div class="card-comment" v-if="item.show_comments">
            <div class="card-body" v-for="com of item.list_comments" :key="com">
              <div class="card-text">
                {{ com.comment }}
              </div>
              <div class="date-time">
                <div class="year">{{ com.created_at }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <student-contain class="tutors" />
  </div>
</template>
<script>
import StudentViews from "./TutorCommentView.vue";
import axiosClient from "../../../axios-http";
export default {
  components: {
    "student-contain": StudentViews,
  },
  name: "ToggleDiv",
  data: function () {
    return {
      teacher_infor: [],
      teacherComents: false,
    };
  },

  methods: {
    is_show(id) {
      for (let value of this.teacher_infor) {
        if (value.id == id) {
          value.show_comments = !value.show_comments;
        }
      }
      let user_id = this.$cookies.get("user_id");
      for (let i = 0; i < this.teacher_infor.length; i++) {
        let comment_user = this.teacher_infor[i].comments;
        for (let i = 0; i < comment_user.length; i++) {
          if (comment_user[i].students.user_id == user_id) {
            axiosClient.put('update_notification/'+id, {
              student_id: comment_user[i].student_id,
            })
          }
        }
      }
    },
    get_teacher() {
      let user_id = this.$cookies.get("user_id");
      axiosClient.get("teachers/get").then((response) => {
        this.teacher_infor = response.data;
        for (let i = 0; i < this.teacher_infor.length; i++) {
          let comment_user = this.teacher_infor[i].comments;
          let num_comments = [];
          let notifications = 0;
          for (let i = 0; i < comment_user.length; i++) {
            if (comment_user[i].students.user_id == user_id) {
              console.log(comment_user[i]);
              num_comments.push(comment_user[i]);
              if (comment_user[i].is_check == false) {
                notifications += 1;
              }
            }
          }
          this.teacher_infor[i].list_comments = num_comments;
          this.teacher_infor[i].notification = notifications;
        }
      });
    },
  },
  mounted() {
    this.get_teacher();
  },
};
</script>
<style scoped>
.body-profils {
  margin-top: 1rem;
  display: flex;
  justify-content: space-between;
}
.tutors {
  margin: 5px 5px;
  width: 49%;
}

.comments {
  margin: 5px 5px;
  width: 49%;
  height: 86vh;
  background: #000;
  background: rgb(188, 221, 224);
}

.body-comment {
  width: 100%;
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
  font-size: 22px;
  display: flex;
  text-align: center;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  background: #22bbea;
  color: white;
  padding: 10px;
}
.card-display {
  width: 99%;
  border-radius: 5px;
  justify-content: flex-start;
  background: #f0f0f0;
  margin-right: 4px;
}

.account {
  display: flex;
}
#imageround {
  width: 55px;
  height: 55px;
  margin: 10px 11px;
  border-radius: 100px;
}

.text-name {
  margin: 5px 5px;
}
.body-text {
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
  font-size: 18px;
  font-weight: bold;
}
.date {
  font-size: 14px;
}
.num-comments {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: auto;
  font-size: 17px;
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
  height: 77vh;
  overflow-x: hidden;
}
.card-body {
  background: #d4cfa3cb;
  border-radius: 5px;
  margin: 5px;
  display: flex;
  justify-content: space-between;
}

.date-time {
  display: flex;
  align-content: center;
  align-items: center;
  text-align: center;
  justify-content: center;
}
.year,
.day {
  margin: 1.5px 1.5px;
  font-size: 14px;
}
.card-text {
  display: flex;
  align-items: center;
  width: 70%;
  margin: 5px 5px;
}
</style>
