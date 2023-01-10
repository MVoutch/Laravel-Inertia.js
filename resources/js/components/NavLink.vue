<template>
    <Link
        class="text-sky-600"
        :class="{'font-bold underline': param}"
    >
        <slot />
    </Link>
</template>


<script>
export default {
    props: {
        param: Boolean
    }
}
</script>
