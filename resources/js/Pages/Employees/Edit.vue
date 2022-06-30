<template>
  <BreezeAuthenticatedLayout>
  <div class="w-full sm:px-6">
      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <form @submit.prevent="update">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Applicant Information
            </h3>
            <p class="max-w-2xl mt-1 text-sm text-gray-500">
              Personal details and application.
            </p>
          </div>
          <div class="border-t border-gray-200">
            <dl>
              <div
                class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
              >
                <dt class="text-sm font-medium text-gray-500">Full name</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <input
                    v-model="form.name"
                    :error="form.errors.name"
                    class="w-full pb-8 pr-6 lg:w-1/2"
                    label="Name"
                  />
                </dd>
              </div>
              <div
                class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
              >
                <dt class="text-sm font-medium text-gray-500">
                  Application for
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  Backend Developer
                </dd>
              </div>
              <div
                class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
              >
                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <input
                    v-model="form.email"
                    :error="form.errors.email"
                    class="w-full pb-8 pr-6 lg:w-1/2"
                    label="Email"
                  />
                </dd>
              </div>
              <div
                class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
              >
                <dt class="text-sm font-medium text-gray-500">
                  Salary 
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  $120,000
                </dd>
              </div>
            </dl>
          </div>
          <div
            class="flex items-center px-8 py-4 border-t border-gray-100 bg-gray-50"
          >
            <button
              v-if="!user.deleted_at"
              class="text-red-600 hover:underline"
              tabindex="-1"
              type="button"
              @click="destroy"
            >
              Delete User
            </button>
            <Button
              class="inline-flex items-center px-4 py-2 ml-auto text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
              type="submit"
              >Update User</Button
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
import Swal from "sweetalert2";
export default {
  components: {
    Head,
    Link,
    LoadingButton,
    BreezeAuthenticatedLayout,
    Input,
  },

  props: {
    user: Object,
  },
  remember: "form",
  data() {
    return {
      form: this.$inertia.form({
        name: this.user.name,
        email: this.user.email,
      }),
    };
  },
  methods: {
    update() {
      this.form.put(`/dashboard/${this.user.id}`);
       Swal.fire({
        position: 'top-end',
        title: "Updated",
        text: "Profile Updated",
        icon: "success",
        showConfirmButton: false,
        timer: 1500
    });
    },
    destroy() {
      if (confirm("Are you sure you want to delete this organization?")) {
        this.$inertia.delete(`/users/${this.user.id}`);
      }
    },
    restore() {
      if (confirm("Are you sure you want to restore this organization?")) {
        this.$inertia.put(`/users/${this.user.id}/restore`);
      }
    },
  },
};
</script>