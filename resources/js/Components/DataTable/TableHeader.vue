<template>
    <tr>
        <th class="p-4 border border-gray-400  bg-gray-300 hover:bg-gray-400" v-for="(heading, index) in props.headers"
            :key="index">
            <button class="flex flex-row gap-1 font-sans text-sm antialiased font-normal leading-none opacity-70"
                @click="$emit('sort', heading.value)">
                <p>{{ heading.text }}</p>
                <template v-if="props.sortBy === heading.value">
                    <span v-if="props.sortDesc === true">↑</span>
                    <span v-else-if="props.sortDesc === false">↓</span>
                </template>
            </button>
        </th>
    </tr>
</template>
<script setup>
    const props = defineProps({
        headers: Array,
        sortBy: String,
        sortDesc: Boolean
    })

</script>