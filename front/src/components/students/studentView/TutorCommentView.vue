<template>
  <div class="tutor">
    <div class="body-tutor">
      <div></div>
      <div class="text-show">Tutor</div>
      <div class="account-user" v-if="user != null">
        <img id="user-images" :src="user.profile">
        <div class="name-user">{{user.first_name}} {{user.last_name}}</div>
      </div>
      <div class="account-user" v-else>
        <img id="user-images" :src="tutor_profile">
        <div class="name-user ">Not assigned</div>
      </div>
    </div>
    <div class="scroller  overflow-y-scroll">
      <!-- ------Contain comment -->
      <div v-if="comments.length == 0" class="flex justify-center items-center">
        <img src="../../../assets/nocomment.png">
      </div>
      <div v-else class="card-tutors" v-for="comment of comments" :key="comment.id">
        <div class="coorComment">
          <div class="card-comment">{{comment.comment}}</div>
          <div class="year">{{comment.created_at}}</div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import axiosClient from "../../../axios-http";
export default {
  data() {
    return {
      comments: [],
      student: {},
      tutor_id: null,
      tutor_info: [],
      user: {},
      id: null,
      tutor_profile: null,
    }

  },
  methods: {
    get_tutor() {
      let user_id = this.$cookies.get('user_id');
      axiosClient.get("students/get/" + user_id).then((res) => {
        this.student = res.data[0];
        this.tutor_id = res.data[0].tutor;
        this.id = res.data[0].user_id;
        this.tutor_profile = this.student['users'].profile;
        this.get_tutor_comment();
      });
    },
    get_tutor_comment() {
      axiosClient.get('teachers/get_teacher_by_id/' + this.tutor_id).then((response) => {
        this.tutor_info = response.data;
        this.user = this.tutor_info.users;
        let tutor_comments = this.tutor_info.comments;
        for (let i = 0; i < tutor_comments.length; i++) {
          if (tutor_comments[i].students.user_id == this.id) {
            this.comments.push(tutor_comments[i]);
          }
        }
      })
    }

  },
  mounted() {
    this.get_tutor();
  }

}
</script>

<style scoped>
.tutor {
  height: 86vh;
  background: #BBD7E0;
}

.body-tutor {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #22BBEA;
  border-top-left-radius: 5px;
}

.text-show {
  font-size: 22px;
  padding: 10px;
  display: flex;
  font-weight: bold;
  color: white;
  justify-content: flex-end;
  align-items: center;
}

.scroller {
  height: 77vh;
  overflow-x: hidden;
}

.account-user {
  width: 25%;
  padding: 5px;
  border-top-left-radius: 50px;
  border-bottom-left-radius: 50px;
  border-top-right-radius: 5px;
  display: flex;
  align-items: left;
  background: #51d9f1;
}


#user-images {
  width: 46px;
  height: 46px;
  border-radius: 50%;
}
.year{
  font-size: 11px;
  width: 20%;
  text-align: right;
}
.name-user {
  display: flex;
  text-align: center;
  align-items: center;
  justify-content: center;
  margin: auto;
  color: white;
  font-size: 17px;
  font-weight: bold;
}

.card-tutors {
  margin: 10px auto;
  width: 95%;
  border-radius: 4px;
  background: #FFFFFF;
}

.coorComment {
  padding: 10px 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.date-time {
  width: 100px;
  text-align: center;
  font-size: 15px;
  justify-content: flex-end;
}

.card-comment {
  width: 84%;
  display: flex;
}
</style>