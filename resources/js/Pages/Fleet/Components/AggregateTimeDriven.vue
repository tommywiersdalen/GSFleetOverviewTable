<template>
    <div>
        <div>Total time: {{ totalTime }} </div>
        <div> Average time: {{ averageTime }}</div>
    </div>
</template>
<script setup>

    import { formatTimeToHoursAndMinutes } from '@/composables/FormatTimeToHoursAndMinutes';
    import { averageOfArray, sumOfArray } from '@/composables/SumAndAverageOfArray';
    import { computed } from 'vue';

    const props = defineProps({
        items: Array
    })
    const timeFromItems = computed(() => {
        let times = []
        props.items.forEach(item => {
            times.push(item.total_drive_time_in_minutes);
        });
        return times;
    })
    const totalTime = computed(() => {
        let total = 0;
        total = sumOfArray(timeFromItems.value);
        return formatTimeToHoursAndMinutes(total);
    })
    const averageTime = computed(() => {
        let avg = 0;
        avg = averageOfArray(timeFromItems.value)
        return formatTimeToHoursAndMinutes(avg);
    })
</script>
