<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Forms from "@/components/Forms";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="Add Employee" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Employees
      </h2>
    </template>

    <div class="w-full sm:px-6">
          <Forms />
    </div>
      
   
  </BreezeAuthenticatedLayout>
</template>
