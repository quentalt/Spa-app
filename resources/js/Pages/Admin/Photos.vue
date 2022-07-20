<template>
<app-layout title="Dashboard">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Photos</h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-2xl">Photos</h1>
                <a class="px-4 bg-sky-900 text-white rounded-md" href="">Create </a>
                <table class="table-auto w-full text-left">
                    <thead>
                    <tr>
                        <th> ID</th>
                        <th> Photo</th>
                        <th>Description</th>
                        <th> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="photo in photos">
                    <td>{{photo.id}}</td>
                    <td> <img width="60" :src="photo.path" alt=""></td>
                    <td>{{photo.description}}</td>
                    <td>View - Edit - Delete</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</app-layout>
</template>
<script>
import {defineComponent}  from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({
    components: {
        AppLayout,
    },
    props:{
        photos:Array
    }
});
</script>
