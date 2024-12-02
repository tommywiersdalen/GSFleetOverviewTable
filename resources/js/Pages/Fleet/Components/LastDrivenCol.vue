<template>
    <td class="standard-table-data">
        <p class="text-gray-900">
            {{ formattedDate }}
        </p>
    </td>
</template>
<script setup>
    import { computed } from 'vue';
    const props = defineProps({
        last_driven_date: String
    })

    const formattedDate = computed(() => {
        let date = new Date(props.last_driven_date)
        return date.toDateString()
    })

</script>