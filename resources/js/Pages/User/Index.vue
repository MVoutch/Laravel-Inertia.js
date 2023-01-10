<template>
    <Head title="User" />
    <div class="flex justify-between items-center">
        <div class="flex mb-5 items-center">
            <h1 class="font-bold text-4xl">User</h1>
            <Link v-if="can.createUser" href="/user/create" class="ml-5 text-ms text-sky-500 mt-2">Create User</Link>
        </div>
        <input v-model="search" type="text" class="border border-stone-400 border-2 px-2 py-1 rounded-xl" placeholder="Search...">
    </div>
    <div class="flex-flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="user in users.data" :key="user.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="font-medium text-gray-900">
                                                {{user.name}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td v-if="user.can.edit" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a :href="'/user/'+user.id+'/edit'" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <Paginate :links="users.links" ></Paginate>
    </div>
</template>

<script setup>
    import Paginate from '../../components/Paginate.vue'
    import {ref, watch} from "vue";
    import {Inertia} from "@inertiajs/inertia";
    import throttle from "lodash/throttle";

    let props = defineProps({
        users: Object,
        filters: Object,
        can: Object
    })

    let search = ref(props.filters.search);

    watch(search, throttle(function (value) {
        Inertia.get('/user', {'search': value}, {preserveState: true, preserveScroll: true, replace: true})
    }, 600))

</script>
