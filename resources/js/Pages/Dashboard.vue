<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FoodCard from '@/Components/FoodCard.vue';
import DropdownInput from '@/Components/DropdownInput.vue';
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
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-5">Menu</h3>
                    <div class="flex justify-end mb-5 mr-8 gap-4">
                        <DropdownInput :input-type="'Pilih Kategori'"></DropdownInput>
                        <DropdownInput :input-type="'Terbaru'"></DropdownInput>
                    </div>
                    <div class="ml-4 flex flex-wrap gap-4">
                        <FoodCard v-for="n in 10"></FoodCard>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
