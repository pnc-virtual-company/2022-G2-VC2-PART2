<template>
<!---------------------------------table-view-teacher------------------------->
<tbody>
    <tr class="cursor-pointer show hover:bg-gray-200">
        <td class="border-b-2 py-1 lg:text-sm "><span class="flex justify-center"><img :src="require('../../../assets/user_male.png')" width="54"></span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm"></span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm"></span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm"></span></td>
        <td class="border-b-2 py-1 lg:text-sm text-white">
            <span class="flex justify-center space-x-2 icons">
                <icon-detail/>
                <icon-edit/>
                <icon-delete @click="deleteStudent"/>
            </span>
        </td>
    </tr>
</tbody>
<!-------------------------------------end-view-------------------------------->
</template>
<script>
// import axios from "../../http.js";
import Swal from 'sweetalert2';
export default {
    props: {data: Object},
    data() {
        return {

        }
    },
    methods: {
        deleteStudent(id) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$emit('remove-list', id)
                }
            })
        }
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