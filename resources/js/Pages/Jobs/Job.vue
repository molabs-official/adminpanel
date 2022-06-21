

<template>
  <Head title="Add Employee" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Employees
      </h2>
    </template>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200" />
        </div>
      </div>

      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Job Vacancy request
              </h3>
              <p class="mt-1 text-sm text-gray-600">
                Open a new job
              </p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="flex flex-col">
                    <div class="col-span-6 sm:col-span-3">
                      <label
                        for="first-name"
                        class="block text-sm font-medium text-gray-700"
                        >Job title</label>
                    
                      <input
                        type="text"
                        name="first-name"
                        id="first-name"
                        v-model="form.name"
                        autocomplete="given-name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <label
                        for="email-address"
                        class="block text-sm font-medium text-gray-700"
                        >Branch Name</label>
                   
                      <input
                        type="text"
                        name="email-address"
                        id="email-address"
                        v-model="form.email"
                        autocomplete="email"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <select-input
                        v-model="form.type_id"
                        :error="form.errors.type_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        label="Employement Type"
                      >
                        <option :value="null" />
                        <option
                          v-for="type in types"
                          :key="type.id"
                          :value="type.id"
                          :v-model="text-black"
                        >
                          {{ type.name }}
                        </option>
                      </select-input>
                    </div>
                    
                  </div>
                </div>
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                  <BreezeButton
                    class="ml-4 bg-orange-600"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                  >
                    save
                  </BreezeButton>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import SelectInput from "@/Components/SelectInput.vue";
import Forms from "@/components/Forms";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";
import BreezeButton from "@/Components/Button.vue";
import { ref } from "vue";
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from "@headlessui/vue";
import { CheckIcon, SelectorIcon } from "@heroicons/vue/solid";
import { Inertia } from "@inertiajs/inertia";

defineProps({
  types: Array,
});

const types = [
    {
        name: "Full time"
    },
    {
        name: "Part time"
    },
    {
        name: "Project time"
    },
]
const selected = 3;


const form = useForm({
  title: null,
  branch: null,
  type_id: null,
});
function submit() {
  Inertia.post(route("store"), form);
}
</script>