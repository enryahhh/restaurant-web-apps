<script setup>
import ListTables from '@/Components/ListTables.vue'
</script>
<template>
    <!-- Cart Sidebar -->
    <div class="fixed inset-y-0 right-0 w-1/2 bg-white z-10 shadow-lg transform transition duration-300 overflow-y-scroll" :class="{ '-translate-x-full': !showCart }">
      <div class="flex items-center justify-between bg-blue-500 text-white p-4">
        <h2 class="text-lg font-bold">Order</h2>
        <button @click="$emit('showingOrderItem',false)" class="text-white hover:text-gray-200">
          <i class="fa fa-times"></i>
        </button>
      </div>
      <!-- <input type="radio" id="dinein" value="dinein" v-model="typeOrder"> Dine In
      <input type="radio" id="takeaway" value="takeaway" v-model="typeOrder"> Take Away
      <ListTables v-if="typeOrder=='dinein'"></ListTables> -->
      <div class="bg-white rounded-lg shadow-lg p-4 m-4">
			  <h2 class="text-lg font-semibold mb-2">Customer Name: {{ $page.props.auth.user.name }}</h2>
			  <p class="text-gray-500">Table Number: 5</p>
		  </div>
      <div class="px-4 py-1">
        <div class="container mx-auto">
          <h1 class="text-2xl font-bold mb-4 text-center">Your Order</h1>
          <h1 class="text-2xl font-bold mb-4 text-center" v-if="cartItems.length == 0">No Items In Cart</h1>
          <div v-if="cartItems.length > 0">
            <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="px-4 py-2">Item Name</th>
          <th class="px-4 py-2">Price</th>
          <th class="px-4 py-2">Quantity</th>
          <th class="px-4 py-2">Subtotal</th>
          <th class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in cartItems" :key="index">
          <td class="border-b px-4 py-2">{{ item.name }}</td>
          <td class="border-b px-4 py-2">{{ item.price }}</td>
          <td class="border-b px-4 py-2">
            <button
              @click="decrementQuantity(index)"
              class="bg-gray-200 text-gray-700 rounded px-2 py-1"
            >
              -
            </button>
            <span class="mx-2">{{ item.quantity }}</span>
            <button
              @click="incrementQuantity(index)"
              class="bg-gray-200 text-gray-700 rounded px-2 py-1"
            >
              +
            </button>
          </td>
          <td class="border-b px-4 py-2">{{ item.price * item.quantity }}</td>
          <td class="border-b px-4 py-2"><a href="#" class="text-red-600" @click="removeItem(index)">X</a></td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-between mt-4">
          <h4 class="text-lg font-bold">Total:</h4>
          <span class="text-lg font-bold">{{ totalPrice }}</span>
        </div>
        <div class="col-span-full">
          <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
            <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
          <p class="mt-3 text-sm leading-6 text-gray-600">Add a Description.</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-4">
			<h2 class="text-lg font-semibold mb-4">Choose a Payment Type:</h2>
			<ul class="space-y-4">
				<li class="bg-gray-200 p-3 rounded-lg">
					<label class="block font-medium text-lg mb-2">
						<input type="radio" class="mr-2" name="paymentType" value="creditCard">
						Cash
					</label>
				</li>

        <li class="bg-gray-200 p-3 rounded-lg">
					<label class="block font-medium text-lg mb-2">
						<input type="radio" class="mr-2" name="paymentType" value="creditCard">
						OVO
					</label>
				</li>
			</ul>
		</div>
        <div class="mt-4">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="makeOrder">Make Order</button>
        </div> 
  </div>
        
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
        { name: 'Item 1', description: 'Description of Item 1', price: 10 , quantity:1},
        { name: 'Item 2', description: 'Description of Item 2', price: 15 , quantity:2},
        { name: 'Item 3', description: 'Description of Item 3', price: 20 , quantity:3}
      ]
    };
  },
  computed: {
    totalPrice() {
      return this.cartItems.reduce((total, item) => total + item.price*item.quantity, 0);
    }
  },
  methods: {
    removeItem(index){
      this.cartItems.splice(index,1);
    },
    makeOrder() {
      // Make order logic goes here
      // ...
      // Hide the cart sidebar after making the order
      this.showCart = false;
    },
    incrementQuantity(index) {
      this.cartItems[index].quantity++;
    },
    decrementQuantity(index) {
      if (this.cartItems[index].quantity > 1) {
        this.cartItems[index].quantity--;
      }
    },
  }
};
</script>