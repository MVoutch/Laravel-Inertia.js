<template>
    <Head title="Login" />
    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded max-w-lg mx-auto border">
            <h1 class="text-3xl mb-6">Login</h1>
            <form @submit.prevent="submit" class="w-60">
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="nickname"
                    >
                        nickname
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full rounded"
                        type="text"
                        name="nickname"
                        id="nickname"
                        v-model="form.name"
                        required
                    >
                    <div>
                        <span v-if="form.errors.name" v-text="form.errors.name" class="text-red-600 text-sm mt-1"/>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                        password
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full rounded"
                        type="password"
                        name="password"
                        id="password"
                        v-model="form.password"
                        required
                    >

                    <div>
                        <span v-if="form.errors.password" v-text="form.errors.password" class="text-red-600 text-sm mt-1"/>
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
        </section>
    </main>
</template>

<script>
export default {
    layout: null
}
</script>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let form = useForm({
    'name': '',
    'password': '',
})

let submit = () => {
    form.post('/login')
}

</script>
