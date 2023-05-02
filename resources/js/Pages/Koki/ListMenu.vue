<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head,router } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import { nextTick, ref } from 'vue';
defineProps({ menus: Object })
const confirmingUserDeletion = ref(false);
const menuId = ref(null);
const confirmUserDeletion = (id) => {
    confirmingUserDeletion.value = true;
    menuId.value = id;
};
const deleteUser = () => {
    console.log(menuId);
    router.delete(route('menu.destroy',menuId.value), {
        preserveScroll: true,
        onSuccess: () => closeModal()
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
};
</script>

<template>
    <Head title="List Menu" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">List Menu</h2>
        </template>
        
        <div class="py-5 h-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <a href="menu/create" class="float-right bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-5">
                        Add Menu
                    </a>
                    <table class="w-full mt-5">
                        <thead class="bg-slate-600 text-white">
                        <tr>
                            <th class="px-6 py-4 border text-left">No.</th>
                            <th class="border px-6 py-4 text-left">Menu Name</th>
                            <th class="border px-6 py-4 text-left">Category</th>
                            <th class="border px-6 py-4 text-left">Stock</th>
                            <th class="border px-6 py-4 text-left">Price</th>
                            <th class="border px-6 py-4 text-left">Image</th>
                            <th class="border px-6 py-4 text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(menu, index) in menus" :key="menu.id">
                            <td class="border px-6 py-4">{{ index + 1 }}</td>
                            <td class="border px-6 py-4">{{ menu.name }}</td>
                            <td class="border px-6 py-4">{{ menu.category }}</td>
                            <td class="border px-6 py-4">{{ menu.stock }}</td>
                            <td class="border px-6 py-4">{{ menu.price }}</td>
                            <td class="border px-6 py-4"><img class="w-24" :src="'storage/images/'+menu.gambar"></td>
                            <td class="border px-6 py-4">
                            <a :href="'menu/'+menu.id+'/edit'" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Edit</a>
                            <button class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 ml-2" @click="confirmUserDeletion(menu.id)">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete the menu?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once menu is deleted, all of its resources and data will be permanently deleted.
                </p>


                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        @click="deleteUser"
                    >
                        Delete
                    </DangerButton>
                </div>
            </div>
        </Modal>

    </AuthenticatedLayout>
</template>

<script>
export default {
  data() {
    return {
      
    }
  }
}
</script>
