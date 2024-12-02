<template>
    <tr v-for="item in props.paginatedRowItems" :key="item.id">
        <td class="standard-table-data">
            <p class="standard-text-color">
                {{ item.registration_number }}
            </p>
        </td>
        <td class="standard-table-data">
            <p class="standard-text-color">
                {{ item.km_driven }} KM
            </p>
        </td>
        <DriveTimeCol :total_drive_time_in_minutes="item.total_drive_time_in_minutes" />
        <td class="standard-table-data">
            <p class="standard-text-color">
                {{ item.max_tonnage_kg }} KG
            </p>
        </td>
        <StatusCol :status="item.status" />
        <LastDrivenCol :last_driven_date="item.last_driven_date" />
        <UsageCol :usage="item.usage" />
    </tr>
</template>
<script setup>
    import UsageCol from './UsageCol.vue';
    import StatusCol from './StatusCol.vue';
    import LastDrivenCol from './LastDrivenCol.vue';
    import DriveTimeCol from './DriveTimeCol.vue';
    const props = defineProps({
        paginatedRowItems: Array
    })
</script>