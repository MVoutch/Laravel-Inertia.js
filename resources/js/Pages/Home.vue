<template>
        <Head title="Home">
            <meta property="description" content="Someday all of this will end" head-key="description">
        </Head>
        <h1 class="mb-5 font-bold text-2xl">Home (slide to bottom)</h1>

    <div class="mb-5" style="margin-top: 850px">
        <p>Current time is: {{time}}</p>
        <Link href="/" preserve-scroll as="button" class="text-sky-600 bg-sky-200 px-2 py-px">Refresh</Link>
    </div>
</template>

<script setup>
defineProps({
    'time': String
})
</script>
