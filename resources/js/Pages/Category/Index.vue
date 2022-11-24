<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Category
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="bg-green-100 my-3 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert" v-if="flash.cat_message">
                            <strong class="font-bold">{{ flash.cat_message }}</strong>
                        </div>
                        <div class="mb-4">
                            <Link class="
                                    px-6
                                    py-2
                                    mb-2
                                    text-green-100
                                    bg-green-500
                                    rounded
                                " :href="route('categories.create')">
                            Category Create
                            </Link>
                        </div>
                        <table class="w-full">
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Name</td>
                                <td class="px-4 py-2">Slug</td>
                                <td class="px-4 py-2 text-right">Action</td>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories.data" :key="category.id">
                                    <td class="px-4 py-2">{{ category.id }}</td>
                                    <td class="px-4 py-2">{{ category.name }}</td>
                                    <td class="px-4 py-2">{{ category.slug }}</td>
                                    <td class="px-4 py-2 font-extrabold text-right">
                                        <Link class="text-green-700" :href="route('categories.edit', category.id)">
                                        Edit
                                        </Link>
                                        <Link @click="destroy(category.id)" class="text-red-700">Delete</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="categories.links.length > 3">
                            <div class="flex flex-wrap -mb-1 mt-3 justify-center">
                                <template v-for="(link, p) in categories.links" :key="p">
                                    <div v-if="link.url === null"
                                        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                        v-html="link.label" />
                                    <Link v-else
                                        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                        :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url"
                                        v-html="link.label" />
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AuthenticatedLayout,
        Head,
        Link,
    },
    props: {
        categories: Object,
        links: Array,
        flash: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("categories.destroy", id));
        },
    },
};
</script>