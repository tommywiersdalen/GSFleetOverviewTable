<template>
    <div class="flex flex-col relative rounded-b-2xl shadow-2xl">
        <div class="bg-gray-200 rounded-t-2xl">
            <div class="flex flex-row mx-4 mt-4 gap-x-2">
                <DateFilter v-model:date-from="dateFrom" v-model:date-to="dateTo" />
                <TablePagination v-model="selected" :options="options" :pagination="pagination" />
            </div>
            <RegistrationSearch v-model="registrationSearch" />
        </div>
        <div class="relative flex flex-col w-full h-full  text-black bg-white max-w-7xl min-w-max">
            <table class="w-full table-auto min-w-max">
                <thead>
                    <TableHeader :headers="headers" :sortBy="sortBy" :sortDesc="sortDesc" @sort="setSort" />
                </thead>
                <tbody>
                    <FleetOverviewTableRows :paginated-row-items="paginatedItems" />
                </tbody>
            </table>
        </div>
        <TableFooter>
            <AggregateDistanceDriven :items="sortedItems" />
            <AggregateTimeDriven :items="sortedItems" />
            <AggregateTonnage :items="sortedItems" />
        </TableFooter>
    </div>
</template>
<script setup>

    import { reactive, computed, watch, ref } from 'vue';
    import { sort } from 'fast-sort';

    import FleetOverviewTableRows from './FleetOverviewTableRows.vue';
    import TableHeader from '@/Components/DataTable/TableHeader.vue';
    import RegistrationSearch from './RegistrationSearch.vue';
    import DateFilter from '@/Components/DateFilter.vue';
    import TablePagination from '@/Components/DataTable/TablePagination.vue';
    import AggregateDistanceDriven from './AggregateDistanceDriven.vue'
    import AggregateTonnage from './AggregateTonnage.vue';
    import AggregateTimeDriven from './AggregateTimeDriven.vue';
    import TableFooter from '@/Components/DataTable/TableFooter.vue';

    const headers = ref([
        { text: 'Registration Number', value: 'registration_number' },
        { text: 'Distance Driven(km)', value: 'km_driven' },
        { text: 'Time Driven', value: 'total_drive_time_in_minutes' },
        { text: 'Carried tonnage', value: 'max_tonnage_kg' },
        { text: 'Status', value: 'status' },
        { text: 'Last Driven', value: 'last_driven_date' },
        { text: 'Usage', value: 'usage' },
    ])

    const props = defineProps({
        fleet_vehicles: Array
    })
    const dateFrom = ref(null);
    const dateTo = ref(null);

    let registrationSearch = ref('')

    const selected = ref(5);

    const sortBy = ref(null);
    const sortDesc = ref(null)

    const sortedItems = computed(() => {
        const items = props.fleet_vehicles;
        if (sortDesc.value === null) return items;

        if (sortDesc.value) {
            return sort(items).desc(sortBy.value);
        } else {
            return sort(items).asc(sortBy.value);
        }
    })

    const setSort = (key) => {
        if (sortBy.value === key) {
            if (sortDesc.value === true) sortDesc.value = null;
            else if (sortDesc.value === false) sortDesc.value = true;
            else sortDesc.value = false;
        } else {
            sortBy.value = key;
            sortDesc.value = false;
        }
    };

    const filteredItems = computed(() => {
        if (dateFrom.value && dateTo.value) {
            return sortedItems.value.filter((item) => item.registration_number.toLowerCase().includes(registrationSearch.value.toLowerCase()) && item.last_driven_date >= dateFrom.value && item.last_driven_date <= dateTo.value)
        }
        return sortedItems.value.filter((item) => item.registration_number.toLowerCase().includes(registrationSearch.value.toLowerCase()))
    }
    )

    const options = ref([
        { text: '5', value: 5 },
        { text: '10', value: 10 },
        { text: '20', value: 20 },
        { text: '25', value: 25 },
        { text: '50', value: 50 },
        { text: 'All', value: props.fleet_vehicles.length }
    ])

    const pagination = reactive({
        currentPage: 1,
        perPage: selected,
        totalPages: computed(() =>
            Math.ceil(filteredItems.value.length / pagination.perPage)
        ),
    });

    const paginatedItems = computed(() => {
        const { currentPage, perPage } = pagination;
        const start = (currentPage - 1) * perPage;
        const stop = start + perPage;

        return filteredItems.value.slice(start, stop);
    });

    watch(
        () => pagination.totalPages,
        () => (pagination.currentPage = 1)
    );
</script>