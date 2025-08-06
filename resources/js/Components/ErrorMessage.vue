<script setup>
defineProps({
    errors: Object
})
</script>

<template>
    <div class="mb-2" v-if="Object.keys(errors).length">
        <p class="text-sm text-red-500">
           Something went wrong 
        </p>
        <ul class="ml-4 list-disc list-inside">
            <li 
              v-for="(error, key) in errors" :key="key" 
              class="text-sm text-red-500">{{ error }}</li>
        </ul>
    </div>
</template>

<style scoped>

</style>