<template>
    <div class="flex flex-col my-4 mx-4">
        <input class="rounded-2xl" type="text" id="search" name="search" placeholder="Search registration number"
            v-model="registrationSearch">
    </div>
</template>
<script setup>
    const registrationSearch = defineModel()
</script>