<template>
    <MainLayout>
        <div class="flex flex-col items-center gap-y-3">
            <h1 class="font-bold text-3xl"> Fleet Overview</h1>
            <FleetOverviewTable :fleet_vehicles="fleetWithUsage" />
        </div>
    </MainLayout>
</template>
<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import FleetOverviewTable from './Components/FleetOverviewTable.vue';

    const props = defineProps({
        fleet_vehicles: Array
    })

    const fleetWithUsage = props.fleet_vehicles.map(vehicle => {
        if (vehicle.km_driven >= 2001 && vehicle.total_drive_time_in_minutes >= 7001) {
            return {
                ...vehicle, usage: 3
            }
        } else if (vehicle.km_driven <= 300 && vehicle.total_drive_time_in_minutes <= 500) {
            return {
                ...vehicle, usage: 1
            }
        } else {
            return {
                ...vehicle, usage: 2
            }
        }
    })

</script>