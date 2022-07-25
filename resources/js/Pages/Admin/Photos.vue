<template>
<app-layout title="Dashboard">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Photos</h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Posts sont ici -->
            <div class="flex justify-between mb-4">

                <h1 class="text-2xl">Photos</h1>
                <Link
                    class="inline-block px-5 py-3 bg-sky-900 text-white rounded-md"
                    :href="route('admin.photos.create')">Create </Link>
            </div>
                <table-component>
                    <template #header>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                </template>
                    <template #table-body>
                        <tr v-for="photo in photos">
                            <td class="px-6 py-4 whitespace-nowrap"> {{photo.id}} </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img width="100" :src="'/storage/' + photo.path"/>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"> <div class="text-sm text-gray-500"></div> {{photo.description.slice(0,100)}} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 p-2">View</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 p-2">Edit</a>
                            </td>
                        </tr>
                    </template>
                </table-component>
            </div>
        </div>
</app-layout>
</template>
<script>
import {defineComponent}  from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import TableComponent from "@/Components/TableComponent.vue";
import Link  from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        AppLayout,
        Link,
        TableComponent
    },
    props:{
        photos:Array
    }
});
</script>
