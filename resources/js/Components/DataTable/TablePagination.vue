<template>
    <div class="flex flex-row items-center gap-2">
        <label for="itemsPerPage">Items per page: </label>
        <select name="itemsPerPage" id="itemsPerPage" class="text-black rounded-2xl" v-model="selected">
            <option class="text-black" v-for="option in options" :value="option.value">
                {{ option.text }}
            </option>
        </select>
        <div class="flex grow flex-row items-center gap-2 m-4">
            <button class=" bg-sky-600 text-white rounded-2xl p-2 hover:bg-sky-400 disabled:bg-slate-400
            disabled:cursor-not-allowed disabled:text-slate-100" :disabled="pagination.currentPage <= 1"
                @click="pagination.currentPage--">
                Prev Page
            </button>
            Page {{ pagination.currentPage }} of {{ pagination.totalPages }}
            <button
                class="bg-sky-600 text-white rounded-2xl p-2 hover:bg-sky-400 disabled:bg-slate-400 disabled:cursor-not-allowed disabled:text-slate-100"
                :disabled="pagination.currentPage >= pagination.totalPages" @click="pagination.currentPage++">
                Next Page
            </button>
        </div>
    </div>
</template>
<script setup>
    const props = defineProps({
        options: Array,
        pagination: Object
    })
    const selected = defineModel()
</script>