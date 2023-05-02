<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
      name: '',
      category: '',
      stock: '',
      price: '',
      image: '',
      description:''
    });

    function handleImageUpload(event) {
      form.image = event.target.files[0]
    }

    function addMenu(){
        console.log('tes');
        form.post('/menu',{
            onSuccess: () => reset(),
        });
    }
</script>

<template>
    <Head title="List Menu" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Menu</h2>
        </template>
        
        <div class="py-5 h-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <div class="max-w-2xl mx-auto py-8">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="addMenu">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name">
          Name
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring-2 focus:ring-inset focus:ring-indigo-600"
          id="name"
          type="text"
          placeholder="Enter name"
          v-model="form.name"
        >
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="category">
          Category
        </label>
        <div class="relative">
          <select
            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-2 focus:ring-inset focus:ring-indigo-600"
            id="category"
            v-model="form.category"
          >
            <option value="">Choose category</option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.95 6.707L10 11.664l-4.95-4.957L4 8.293l6 6 6-6-1.05-1.586z"/></svg>
          </div>
        </div>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="stock">
          Stock
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring-2 focus:ring-inset focus:ring-indigo-600"
          id="stock"
          type="number"
          placeholder="Enter stock"
          v-model="form.stock"
        >
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="price">
          Price
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring-2 focus:ring-inset focus:ring-indigo-600"
          id="price"
          type="number"
          placeholder="Enter price"
          v-model="form.price"
        >
      </div>
      <div class="mb-4">
  <label class="block text-gray-700 font-bold mb-2" for="image">
    Image
  </label>
  <input
    type="file"
    name="image"
    id="image"
    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
    @change="handleImageUpload"
  >
</div>
<div class="col-span-full mb-4">
          <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
            <textarea id="about" v-model="form.description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
        </div>
      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script>


export default {
  data(){
    return {
    }
  }
}
</script>
