<template>
    <div class="mx-2">
      <h2 class="text-xl font-bold mb-4">Available Tables</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div v-for="(table, index) in tables" :key="index" class=" shadow-lg rounded-lg p-4 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out" :class="[ table.isUsed ? 'bg-red-600' : 'bg-white']">
          <h3 class="text-lg font-medium mb-2">{{ table.name }}</h3>
          <p :class="[ table.isUsed ? 'text-white' : 'text-grey-500']">{{ table.description }}</p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        tables: [
          { name: 'Table 1', description: 'Table for two people'    ,isUsed:true },
          { name: 'Table 2', description: 'Table for four people'   ,isUsed:false },
          { name: 'Table 3', description: 'Table for six people'    ,isUsed:false },
          { name: 'Table 4', description: 'Table for eight people'  ,isUsed:false },
          { name: 'Table 5', description: 'Table for ten people'    ,isUsed:false },
          { name: 'Table 6', description: 'Table for twelve people' ,isUsed:false }
        ]
      };
    }
  };
  </script>
  