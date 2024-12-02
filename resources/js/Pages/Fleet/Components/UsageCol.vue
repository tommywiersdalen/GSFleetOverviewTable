<template>
    <td v-if="props.usage === 3" class="standard-table-data bg-red-200">
        <p class="standard-text-color">
            {{ usageToString }}
        </p>
    </td>
    <td v-else-if="props.usage === 1" class="standard-table-data bg-yellow-200">
        <p class="standard-text-color">
            {{ usageToString }}
        </p>
    </td>
    <td v-else class="standard-table-data bg-green-200">
        <p class="standard-text-color">
            {{ usageToString }}
        </p>
    </td>
</template>
<script setup>
    import { computed } from 'vue';

    const props = defineProps({
        usage: Number
    })

    const usageToString = computed(() => {
        if (props.usage === 3) {
            return 'Overused'
        } else if (props.usage === 1) {
            return 'Underused'
        } else {
            return 'Normal use'
        }
    })



</script>