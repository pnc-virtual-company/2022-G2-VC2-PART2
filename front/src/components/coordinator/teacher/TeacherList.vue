<template>
<!---------------------------------table-view-teacher------------------------->
<tbody>
    <tr class="cursor-pointer show hover:bg-gray-200" v-for="teacher of teacher_lists" :key="teacher">
        <td class="border-b-2 py-1 lg:text-sm "><span class="flex justify-center"><img :src="teacher.users.profile" class="h-10 w-10 rounded-full"></span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">{{teacher.users.first_name}} {{teacher.users.last_name}}</span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">{{teacher.users.gender}}</span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">{{teacher.position}}</span></td>
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
import axiosClient from '../../../axios-http';
export default {
    data() {
        return {
            teacher_lists: [],
        }
    },
    methods: {
        get_teachers() {
            axiosClient.get('teachers').then((res) => {
                this.teacher_lists = res.data
            })
        },
    },
    mounted() {
    this.get_teachers()
  }
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