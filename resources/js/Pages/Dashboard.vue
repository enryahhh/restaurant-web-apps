<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FoodCard from '@/Components/FoodCard.vue';
import DropdownInput from '@/Components/DropdownInput.vue';
import OrderSidebar from '@/Components/OrderSidebar.vue';
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
                        <div class="relative w-64">
                        <input type="text" placeholder="Cari Menu" class="pl-10 pr-4 py-2 w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:outline-none transition duration-500 ease-in-out">
                            <div class="absolute top-0 left-0 mt-2 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M15.71 14.29l-3.32-3.32a5.5 5.5 0 111.42-1.42l3.32 3.32a1 1 0 010 1.42zM6.5 11a4.5 4.5 0 100-9 4.5 4.5 0 000 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <DropdownInput :input-type="'Pilih Kategori'"></DropdownInput>
                        <DropdownInput :input-type="'Terbaru'"></DropdownInput>
                    </div>
                    <div class="ml-4 flex flex-wrap gap-4">
                        <FoodCard v-for="n in 10"></FoodCard>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed bottom-0 right-0 p-4 m-4">
            <button class="bg-black hover:bg-slate-800 text-white font-bold px-7 py-6 rounded-full" @click="showCart = !showCart">
                <i class="fa fa-shopping-cart text-lg"></i>
                <span class="bg-red-500 rounded-full text-white px-2 py-0.5 text-xs font-bold absolute top-8">3</span>
            </button>
        </div>

        <OrderSidebar v-if="showCart" @showingOrderItem="showCart=false"></OrderSidebar>

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
