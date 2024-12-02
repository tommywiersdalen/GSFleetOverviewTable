<template>
    <td class="standard-table-data">
        <p class="standard-text-color">
            {{ formattedTime }}
        </p>
    </td>
</template>
<script setup>
    import { formatTimeToHoursAndMinutes } from '@/composables/FormatTimeToHoursAndMinutes';
    import { computed, ref } from 'vue';

    const props = defineProps({
        total_drive_time_in_minutes: Number
    })

    const timeInMinutes = ref(props.total_drive_time_in_minutes)


    const formattedTime = computed(() => {
        return formatTimeToHoursAndMinutes(timeInMinutes.value)
    })

</script>