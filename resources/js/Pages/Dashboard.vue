<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ListTables from '@/Components/ListTables.vue'
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-5 h-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <ListTables></ListTables>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight my-5">Promos</h2>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight my-5">Recommendation</h2>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script>
export default {
  data() {
    return {
      showCart: false
    }
  }
}
</script>
