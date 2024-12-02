<template>
    <div class="flex flex-row items-center gap-2 my-6">
        <label for="dateFrom">Date from:</label>
        <input class="rounded-2xl" type="date" id="dateFrom" name="dateFrom" v-model="dateFrom">
        <label for="dateTo">Date to:</label>
        <input class="rounded-2xl" type="date" id="dateTo" name="dateTo" v-model="dateTo">
    </div>
</template>
<script setup>
    const dateFrom = defineModel('dateFrom')
    const dateTo = defineModel('dateTo')
</script>