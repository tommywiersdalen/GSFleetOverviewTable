<template>
    <div>
        <div>Total distance driven: {{ totalDistance }} KM </div>
        <div> Average distance driven: {{ averageDistanceDriven }} KM </div>
    </div>
</template>
<script setup>
    import { averageOfArray, sumOfArray } from '@/composables/SumAndAverageOfArray';
    import { computed } from 'vue';

    const props = defineProps({
        items: Array
    })

    const distancesFromItems = computed(() => {
        let distances = []
        props.items.forEach(item => {
            distances.push(item.km_driven)
        });
        return distances;
    })
    const totalDistance = computed(() => {
        let total = 0;
        return total = sumOfArray(distancesFromItems.value);
    })
    const averageDistanceDriven = computed(() => {
        let avg = 0;
        return avg = averageOfArray(distancesFromItems.value)
    })

</script>