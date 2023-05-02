<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FoodCard from '@/Components/FoodCard.vue';
import DropdownInput from '@/Components/DropdownInput.vue';
import OrderSidebar from '@/Components/OrderSidebar.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Order" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Order</h2>
        </template>

        <div class="py-5 h-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-5">Order History</h3>
                    <div class="container mx-auto py-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left">No.</th>
                            <th class="px-6 py-4 text-left">Name</th>
                            <th class="px-6 py-4 text-left">Order Date</th>
                            <th class="px-6 py-4 text-left">Status</th>
                            <th class="px-6 py-4 text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(order, index) in orders" :key="order.id">
                            <td class="border px-6 py-4">{{ index + 1 }}</td>
                            <td class="border px-6 py-4">{{ order.name }}</td>
                            <td class="border px-6 py-4">{{ order.orderDate }}</td>
                            <td class="border px-6 py-4">
                                <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2">{{ order.status }}</span>
                            </td>
                            <td class="border px-6 py-4">
                            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Edit</button>
                            <button class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script>
export default {
  data() {
    return {
      orders: [
        {
          id: 1,
          name: "John Doe",
          orderDate: "2023-04-30",
          status: "Processing",
        },
        {
          id: 2,
          name: "Jane Smith",
          orderDate: "2023-05-01",
          status: "Delivered",
        },
        {
          id: 3,
          name: "Bob Johnson",
          orderDate: "2023-05-02",
          status: "Shipped",
        },
      ],
    };
  },
};
</script>

<style>
table {
  border-collapse: collapse;
}

th,
td {
  text-align: left;
}
</style>
