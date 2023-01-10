<template>
    <Head title="Create User" />
    <h1 class="mb-5 font-bold text-4xl">Create User</h1>

    <form class="max-w-md mx-auto mt-7" @submit.prevent="submit">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="nickname"
            >
                nickname
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="nickname"
                id="nickname"
                v-model="form.name"
                required
            >
            <div>
                <span v-if="form.errors.name" v-text="form.errors.name" class="text-red-600 text-sm"/>
            </div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="email"
            >
                email
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                type="email"
                name="email"
                id="email"
                v-model="form.email"
                required
            >
            <div>
                <span v-if="form.errors.email" v-text="form.errors.email" class="text-red-600 text-sm"/>
            </div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password"
            >
                password
            </label>

            <input
                class="border border-gray-400 p-2 w-full"
                type="password"
                name="password"
                id="password"
                v-model="form.password"
                required
            >

            <div>
                <span v-if="form.errors.password" v-text="form.errors.password" class="text-red-600 text-sm"/>
            </div>
        </div>
        <div>
            <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    :disabled="form.processing"
            >
                Submit
            </button>
        </div>
    </form>
</template>

<script setup>
    import InputBlock from "../../components/InputBlock"
    import {useForm} from "@inertiajs/inertia-vue3";

    let form = useForm({
        name: '',
        email: '',
        password: '',
    })

    let submit = () => {
        form.post('/user')
    }

</script>
