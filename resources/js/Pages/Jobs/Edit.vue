<template>
    <BreezeAuthenticatedLayout>
        <div class="w-full sm:px-6">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <form @submit.prevent="update">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Job Details
                        </h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div
                                class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Job title
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <input
                                        v-model="form.title"
                                        :error="form.errors.title"
                                        class="w-full pb-8 pr-6 lg:w-1/2"
                                        label="Name"
                                    />
                                </dd>
                            </div>
                            <div
                                class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Job Branch
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <input
                                        v-model="form.branch"
                                        :error="form.errors.branch"
                                        class="w-full pb-8 pr-6 lg:w-1/2"
                                        label="Email"
                                    />
                                </dd>
                            </div>
                            <div
                                class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Job Description
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <input
                                        v-model="form.description"
                                        :error="form.errors.description"
                                        class="w-full pb-8 pr-6 lg:w-1/2"
                                        label="Email"
                                    />
                                </dd>
                            </div>
                            <div
                                class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Job Type
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <input
                                        v-model="form.type"
                                        :error="form.errors.type"
                                        class="w-full pb-8 pr-6 lg:w-1/2"
                                        label="Email"
                                    />
                                </dd>
                            </div>
                           
                        </dl>
                    </div>
                    <div
                        class="flex items-center px-8 py-4 border-t border-gray-100 bg-gray-50"
                    >
                        <button
                            v-if="!job.deleted_at"
                            class="text-red-600 hover:underline"
                            tabindex="-1"
                            type="button"
                            @click="destroy"
                        >
                            Delete Job
                        </button>
                        <loading-button
                            :loading="form.processing"
                            class="ml-auto btn-indigo"
                            type="submit"
                            >Update Job</loading-button
                        >
                    </div>
                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import LoadingButton from "@/Components/LoadingButton";
import Input from "@/Components/Input";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
export default {
    components: {
        Head,
        Link,
        LoadingButton,
        BreezeAuthenticatedLayout,
        Input,
    },

    props: {
        job: Object,
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                title: this.job.title,
                description: this.job.description,
                branch: this.job.branch,
                type: this.job.type,
                skills: this.job.skills,
            }),
        };
    },
    methods: {
        update() {
            this.form.put(`/users/${this.user.id}`);
        },
        destroy() {
            if (confirm("Are you sure you want to delete this organization?")) {
                this.$inertia.delete(`/users/${this.user.id}`);
            }
        },
        restore() {
            if (
                confirm("Are you sure you want to restore this organization?")
            ) {
                this.$inertia.put(`/users/${this.user.id}/restore`);
            }
        },
    },
};
</script>
