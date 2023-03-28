<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

    defineProps({
        inputType: String
    });

    const closeOnEscape = (e) => {
    if (isOpen.value && e.key === 'Escape') {
        isOpen.value = false;
    }

    onMounted(() => document.addEventListener('keydown', closeOnEscape));
    onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

};
const isOpen = ref(false);
</script>
<template>
    <div class="relative">
      <div
        @click="isOpen = !isOpen"
        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray focus:bg-gray-200"
        :class="{'bg-gray-200': isOpen}"
      >
        <span>{{ inputType }}</span>
        <svg
          class="w-5 h-5 ml-2 -mr-1"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
    </div>
    <div v-show="isOpen" class="fixed inset-0 z-40" @click="isOpen = false"></div>
    <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
      <div
        v-show="isOpen"
        class="absolute z-10 w-full mt-2 bg-white rounded-md shadow-lg"
      >
        <div class="flex flex-col max-h-60 overflow-y-auto">
          <label
            v-for="(item, index) in items"
            :key="index"
            class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 cursor-pointer hover:bg-gray-100"
          >
            <input
              type="checkbox"
              class="mr-2 border-gray-300 rounded focus:ring-gray-500"
              :value="item"
              v-model="selectedItems"
            >
            <span>{{ item }}</span>
          </label>
        </div>
      </div>
      </transition>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isOpen:false,
        items: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5'],
        selectedItems: []
      }
    }
  }
  </script>
  