<template>
    <div class="student-list">
        <create-student @add-student="create_student"></create-student>
        <!---------------------------------table-view-teacher------------------------->
        <table class="w-[82.6%] m-auto mt-4">
            <thead class="text-white">
                <tr>
                    <th class="lg:text-md text-md lg:p-3 bg-color">Profile</th>
                    <th class="lg:text-md text-md lg:p-3 bg-color">Full Name</th>
                    <th class="lg:text-md text-md lg:p-3 bg-color">Gender</th>
                    <th class="lg:text-md text-md lg:p-3 bg-color">Batch</th>
                    <th class="lg:text-md text-md lg:p-3 bg-color">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="cursor-pointer show hover:bg-gray-200" v-for="student of student_lists" :key="student">
                    <td class="border-b-2 py-1 lg:text-sm "><span class="flex justify-center"><img
                                :src="student.users.profile" class="w-10 h-10 rounded-full"></span></td>
                    <td class="border-b-2 py-1 lg:text-sm"><span
                            class="flex justify-center text-sm">{{student.users.first_name}}
                            {{student.users.last_name}}</span>
                    </td>
                    <td class="border-b-2 py-1 lg:text-sm"><span
                            class="flex justify-center text-sm">{{student.users.gender}}</span></td>
                    <td class="border-b-2 py-1 lg:text-sm"><span
                            class="flex justify-center text-sm">{{student.batch}}</span>
                    </td>
                    <td class="border-b-2 py-1 lg:text-sm text-white">
                        <span class="flex justify-center space-x-2 icons">
                            <icon-detail />
                            <icon-edit />
                            <icon-delete @click="delete_student(student.users.id)" />
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-center mt-[50px]">
            <div v-if="student_lists.length == 0">
                <img :src="img_null" class="flex justify-center m-auto w-40">
                <h1 class="text-red-500 text-center text-2xl mt-2">No Student in list</h1>
            </div>
        </div>
        <!-------------------------------------end-view-------------------------------->
    </div>
</template>
<script>
import axiosClient from "../../../axios-http"
import Swal from 'sweetalert2';
import CreateStudent from './CreateStudent.vue'
export default {
    components: {
        'create-student': CreateStudent,
    },
    data() {
        return {
            student_lists: [],
            img_null: 'https://icons.veryicon.com/png/o/education-technology/qiniu-cloud-service-icon/content-audit.png'
        }
    },
    methods: {
        get_students() {
            axiosClient.get("students").then((res) => {
                this.student_lists = res.data;
            })
        },
        delete_student(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete student!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#22BBEA',
                cancelButtonColor: '#FFAD5C',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axiosClient.delete('students/' + id)
                    this.get_students();
                   
                }
            })
        },
        create_student(student) {
            console.log(student)
            axiosClient.post('students', student);
            this.get_students();
        }
    },
    computed:{
        student_data(){
            return this.student_lists;
        }
    },
    mounted() {
        this.get_students()
    },
}
</script>

<style scoped>
.icons {
    display: none;
}

.show:hover .icons {
    display: flex;
    margin: 0 -10px;
    padding: 0;
}

.bg-color {
    background: #22BBEA;
}

/* .table-view {
    width: 100%;
} */
</style>