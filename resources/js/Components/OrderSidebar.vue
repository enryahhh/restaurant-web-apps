<script setup>
import ListTables from '@/Components/ListTables.vue'
</script>
<template>
    <!-- Cart Sidebar -->
    <div class="fixed inset-y-0 right-0 w-1/2 bg-white z-10 shadow-lg transform transition duration-300" :class="{ '-translate-x-full': !showCart }">
      <div class="flex items-center justify-between bg-blue-500 text-white p-4">
        <h2 class="text-lg font-bold">Order</h2>
        <button @click="$emit('showingOrderItem',false)" class="text-white hover:text-gray-200">
          <i class="fa fa-times"></i>
        </button>
      </div>
      <input type="radio" id="dinein" value="dinein" v-model="typeOrder"> Dine In
      <input type="radio" id="takeaway" value="takeaway" v-model="typeOrder"> Take Away
      <ListTables v-if="typeOrder=='dinein'"></ListTables>
      <div class="p-4">
        <ul class="divide-y divide-gray-200">
          <li v-for="(item, index) in cartItems" :key="index" class="py-4">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-medium">{{ item.name }}</h3>
              <span class="text-gray-500">{{ item.price }}</span>
            </div>
            <p class="text-gray-400">{{ item.description }}</p>
          </li>
        </ul>
        <div class="flex justify-between mt-4">
          <h4 class="text-lg font-bold">Total:</h4>
          <span class="text-lg font-bold">{{ totalPrice }}</span>
        </div>
        <div class="mt-4">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="makeOrder">Make Order</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      showCart: false,
      typeOrder: 'dinein',
      cartItems: [
        { name: 'Item 1', description: 'Description of Item 1', price: 10 },
        { name: 'Item 2', description: 'Description of Item 2', price: 15 },
        { name: 'Item 3', description: 'Description of Item 3', price: 20 }
      ]
    };
  },
  computed: {
    totalPrice() {
      return this.cartItems.reduce((total, item) => total + item.price, 0);
    }
  },
  methods: {
    makeOrder() {
      // Make order logic goes here
      // ...
      // Hide the cart sidebar after making the order
      this.showCart = false;
    }
  }
};
</script>