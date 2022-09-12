<template>
<!---------------------------------table-view-teacher------------------------->
<tbody>
    <tr class="cursor-pointer show hover:bg-gray-200" v-for="student of student_lists" :key="student">
        <td class="border-b-2 py-1 lg:text-sm "><span class="flex justify-center"><img :src="student.users.profile" class="w-10 h-10 rounded-full"></span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">{{student.users.first_name}} {{student.users.last_name}}</span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">{{student.users.gender}}</span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">{{student.batch}}</span></td>
        <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center space-x-2 icons">
                <icon-detail/>
                <icon-edit/>
                <icon-delete/>
            </span>
        </td>
    </tr>
</tbody>
<!-------------------------------------end-view-------------------------------->
</template>
<script>
import axiosClient from "../../../axios-http";
// import Swal from 'sweetalert2';
export default {
    data() {
        return {
            student_lists:[]
        }
    },
    methods: {
        get_students() {
            axiosClient.get("students").then((res) => {
                this.student_lists = res.data;
            })
        },
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
</style>