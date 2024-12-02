<template>
    <td class="standard-table-data">
        <p class="standard-text-color">
            {{ statusToString(props.status) }}
        </p>
    </td>
</template>
<script setup>
    const props = defineProps(
        { status: Number })

    const statusToString = (status) => {
        if (status === 1) {
            return 'Active'
        } else {
            return 'Inactive'
        }
    }
</script>