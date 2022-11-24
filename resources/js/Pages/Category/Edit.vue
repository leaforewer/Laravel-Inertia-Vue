<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit {{ form.name }} <br /> Id: {{ form.id }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <label for="name">Category Name</label>
                                <input type="text" v-model="form.name" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                                <div class="bg-red-100 my-3 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert" v-if="errors.name">
                                    <strong class="font-bold">{{ errors.name }}</strong>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="name">Slug Name</label>
                                <input type="text" v-model="form.slug" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                                <div class="bg-red-100 my-3 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert" v-if="errors.slug">
                                    <strong class="font-bold">{{ errors.slug }}</strong>
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button class="
                                        px-6
                                        py-2
                                        text-white
                                        bg-gray-900
                                        rounded
                                    ">
                                    Save
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
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AuthenticatedLayout,
        Head,
    },
    setup(props) {
        const form = useForm({
            id: props.category.id,
            slug: props.category.slug,
            name: props.category.name,
        });

        return { form };
    },
    props: {
        category: Object,
        errors: Object
    },
    methods: {
        submit() {
            this.form.put(route("categories.update", this.category.id));
        },
    },
};
</script>