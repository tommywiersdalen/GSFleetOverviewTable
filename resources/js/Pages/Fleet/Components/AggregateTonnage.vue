<template>
    <div>
        <div>Total tonnage: {{ totalTonnage }} KG </div>
        <div> Average tonnage: {{ averageTonnage }} KG </div>
    </div>
</template>
<script setup>
    import { averageOfArray, sumOfArray } from '@/composables/SumAndAverageOfArray';
    import { computed } from 'vue';

    const props = defineProps({
        items: Array
    })

    const tonnageFromItems = computed(() => {
        let tonnages = []
        props.items.forEach(item => {
            tonnages.push(item.max_tonnage_kg)
        });
        return tonnages;
    })
    const totalTonnage = computed(() => {
        let total = 0;
        return total = sumOfArray(tonnageFromItems.value);
    })
    const averageTonnage = computed(() => {
        let avg = 0;
        return avg = averageOfArray(tonnageFromItems.value)
    })
</script>