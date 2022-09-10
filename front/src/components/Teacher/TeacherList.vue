<template>
<!---------------------------------table-view-teacher------------------------->
<tbody>
    <tr class="cursor-pointer hover:bg-gray-300">
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span class="flex justify-center"><img :src="require('../../assets/user_male.png')" width="54"></span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span>Sopha</span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span>Rath</span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span>Trainer</span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all text-white justify-center">
            <span class="flex justify-center space-x-2">
                <svg class="h-6 w-6 hover:text-orange-400"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />  <polyline points="14 2 14 8 20 8" />  <line x1="16" y1="13" x2="8" y2="13" />  <line x1="16" y1="17" x2="8" y2="17" />  <polyline points="10 9 9 9 8 9" /></svg>
                <svg class="h-6 w-6 hover:text-blue-500"  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></svg>
                <svg class="h-6 w-6 hover:text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
            </span>
        </td>
    </tr>
    <tr class="cursor-pointer hover:bg-gray-300">
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span class="flex justify-center"><img :src="require('../../assets/user_male.png')" width="54"></span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span>Sopha</span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span>Rath</span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all"><span>Trainer</span></td>
        <td class="border-b-2 py-1 lg:text-sm text-xs break-all text-white justify-center">
            <span class="flex justify-center space-x-2">
                <svg class="h-6 w-6 hover:text-orange-400"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />  <polyline points="14 2 14 8 20 8" />  <line x1="16" y1="13" x2="8" y2="13" />  <line x1="16" y1="17" x2="8" y2="17" />  <polyline points="10 9 9 9 8 9" /></svg>
                <svg class="h-6 w-6 hover:text-blue-500"  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></svg>
                <svg class="h-6 w-6 hover:text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
            </span>
        </td>
    </tr>
</tbody>
<!-------------------------------------end-view-------------------------------->
</template>
<script>
// import axios from "../../http.js";
// import Swal from 'sweetalert2';
export default {
    props: {data: Object},
    data() {
        return {

        }
    },
}
</script>

<style scoped>

</style>