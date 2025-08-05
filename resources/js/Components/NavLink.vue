<script setup>
defineProps({
    routeName: String
})
</script>

<template>
   <Link :href="route(routeName)" class="px-3 py-2 hover:bg-slate-700 rounded-lg">
    <slot />
   </Link>
</template>

<style scoped>

</style>