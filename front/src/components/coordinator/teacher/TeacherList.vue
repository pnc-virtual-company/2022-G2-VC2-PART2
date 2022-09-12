<template>
<!---------------------------------table-view-teacher------------------------->
<tbody>
    <tr class="cursor-pointer show hover:bg-gray-200">
        <td class="border-b-2 py-1 lg:text-sm "><span class="flex justify-center"><img :src="require('../../../assets/user_male.png')" width="54"></span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">Him</span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">Hey</span></td>
        <td class="border-b-2 py-1 lg:text-sm"><span class="flex justify-center text-sm">Trainer</span></td>
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
// import axios from "../../http.js";
export default {
    props: {data: Object},
    data() {
        return {

        }
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