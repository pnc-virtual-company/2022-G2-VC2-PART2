<template>
  <div class="all-cards">
    <div class="message-card p-1 m-2" v-for="item of display_data" :key="item">
      <div class="profile flex">
        <img class="w-10 h-10 rounded-full"
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLpz9XagsQVIrjmM6VIBxt6tvBagwpYxZabA&usqp=CAU"
          alt="" />
        <div class="infor ml-1">
          <div class="name font-bold">{{item.teachers.users.first_name}} {{item.teachers.users.last_name}}</div>
          <div class="date text-sm mt-[-5px]">{{item.created_at}}</div>
        </div>
      </div>
      <div class="message p-2">{{item.comment}}</div>
    </div>
  </div>
  <!------------------------------------end-card-------------------------------->
</template>
<script>
import axiosClient from "../../../axios-http";
import CryptoJS from 'crypto-js';
export default {
  props: ["students_id"],
  data() {
    return {
      data_id_student: this.students_id,
      teacher_id: '',
      student_data: [],
    };
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
    get_data() {
      let user_id = this.decrypt_id();
      axiosClient.get("teachers/get_teacher_id/" + user_id).then((res) => {
        this.teacher_id = res.data[0].teachers.id;
        axiosClient.get("comments/get/").then((res) => {
          let datas = res.data
          datas.forEach(element => {
            if (this.data_id_student == element.student_id) {
              this.student_data.push(element);

            }
          });

        });
      });
    },
  },
  computed: {
    display_data() {
      this.get_data()
      return this.student_data;
    },
  },
};
</script>

<style scoped>
/* card-detail */
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

.hr {
  height: 2px;
  margin: 9px 0;
}

.message-card {
  background: rgba(134, 133, 133, 0.233);
  border-radius: 3px;
}

.modal-wrapper {
  margin-top: 5rem;
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

.all-cards {
  height: 48vh;
  border: 1px solid black;
  overflow: auto;
  margin-bottom: 1rem;
}
</style>
