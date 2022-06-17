<template>
<BreezeAuthenticatedLayout>
<div>
    <Head :title="form.name" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard">Back to dashboard</Link>
      <span class="font-medium text-indigo-400">/</span>
      {{ form.name }}
    </h1>
    <div class="max-w-3xl overflow-hidden bg-white rounded-md shadow">
      <form @submit.prevent="update">
        <div class="flex flex-wrap p-8 -mb-8 -mr-6">
          <input v-model="form.name" :error="form.errors.name" class="w-full pb-8 pr-6 lg:w-1/2" label="Name" />
          <input v-model="form.email" :error="form.errors.email" class="w-full pb-8 pr-6 lg:w-1/2" label="Email" />
      
        </div>
        <div class="flex items-center px-8 py-4 border-t border-gray-100 bg-gray-50">
          <button v-if="!user.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete User</button>
          <loading-button :loading="form.processing" class="ml-auto btn-indigo" type="submit">Update User</loading-button>
        </div>
      </form>
    </div>
  </div>
</BreezeAuthenticatedLayout>
  
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import LoadingButton from '@/Components/LoadingButton'
import Input from '@/Components/Input'
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
    user: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        name: this.user.name,
        email: this.user.email,
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/users/${this.user.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this organization?')) {
        this.$inertia.delete(`/users/${this.user.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this organization?')) {
        this.$inertia.put(`/users/${this.user.id}/restore`)
      }
    }
  }
}
  </script>