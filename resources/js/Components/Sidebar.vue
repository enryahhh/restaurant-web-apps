<script setup>
import NavLink from '@/Components/NavLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
<div class="bg-gray-800 w-32 pt-5 pb-4 border-r border-gray-900 flex flex-col justify-between fixed bottom-0 top-0">
            <div class="">
            <Link :href="route('dashboard')">
                <ApplicationLogo
                    class="block h-9 w-auto fill-current text-white mx-auto mb-10"
                />
            </Link>
        <ul class="text-gray-400 px-6">
            <li class="mb-4"><a href="#" class="text-white hover:text-gray-300">Home</a></li>
            <li class="mb-4"><a href="#" class="text-white hover:text-gray-300">Dashboard</a></li>
            <li class="mb-4"><a href="#" class="text-white hover:text-gray-300">Profile</a></li>
            <li class="mb-4"><a href="#" class="text-white hover:text-gray-300">Settings</a></li>
        </ul>
    </div>

    <div class="text-red-600 bg-slate-400">
        <p>Logout</p>
    </div>
        </div>
</template>