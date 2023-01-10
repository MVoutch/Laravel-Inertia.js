<template>
    <Component
        class="px-1"
        v-for="link in links"
        :is="link.url ? 'Link' : 'span'"
        :href="link.url"
        v-html="link.label"
        preserve-scroll
        :class="{
            'text-gray-400': link.url === null,
             'font-bold underline': link.active
        }"
    >

    </Component>
</template>

<script setup>

defineProps({
    links: Array
})

</script>
