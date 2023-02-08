<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '../../Components/Pagination.vue'


defineProps({
    communities:Object
})

</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Available Communitites</h2>
        </template>
    

        <div class="py-12">
            <div class="max-w-7xl max-auto sm:px-6 lg:px-8">
                <div class="flex justify-end">
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <Link as="button" type="button" :href="route('communities.create')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm
                    font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2
                    focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add Community</Link>
                    </div>
                </div>
            </div>

          

             
            <div class="max-w-7xl overflow-x-auto ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                            Id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                description
                            </th>
                            <th scope="col" class="py-3 px-6">
                                slug
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="community in communities.data" :key="community.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{community.id}} 
                            </th>
                            <td class="text-blue-500
                              hover:text-blue-700
                              font-semibold"> 
                            {{community.name}}
                            
                            </td>
                            <td class="py-4 px-6">
                            {{community.description}}
                            </td>
                            <td class="whitespace-nowrap
                            px-3
                            py-4
                            text-sm text-gray-500">
                            {{community.slug}} 
                            </td>
                            <td class="py-4 px-6 ">
                                <Link as="button" type="button" :href="route('communities.edit',community.id)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-orange-500 px-4 py-2 text-sm
                                    font-medium text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2
                                    focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-3">Edit Community
                                </Link> 

                                  <Link as="button" type="button" method="delete" :href="route('communities.destroy',community.id)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm
                                    font-medium text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2
                                    focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto ">Delete Community
                                </Link>                   
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="m-2 p-2">
                   <Pagination :links="communities.links"/>
                </div>
            </div>
            
        </div>
      
    
    </AuthenticatedLayout>

</template>
