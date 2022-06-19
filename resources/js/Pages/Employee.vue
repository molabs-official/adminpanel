

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
                Add Employee
              </h3>
              <p class="mt-1 text-sm text-gray-600">
                Use a Personal Information of the employee.
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
                        >Name</label
                      >
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
                        >Email address</label
                      >
                      <input
                        type="text"
                        name="email-address"
                        id="email-address"
                        v-model="form.email"
                        autocomplete="email"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <label
                        for="email-address"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                      >
                      <input
                        type="password"
                        name="password"
                        id="passwords"
                        v-model="form.password"
                        autocomplete="password"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <select-input
                        v-model="form.team_id"
                        :error="form.errors.team_id"
                        class="w-full pb-8 pr-6 lg:w-1/2"
                        label="Assign to Team"
                      >
                        <option :value="null" />
                        <option
                          v-for="team in teams"
                          :key="team.id"
                          :value="team.id"
                        >
                          {{ team.name }}
                        </option>
                      </select-input>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700">
                        Import Employee
                      </label>
                      <div
                        class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md "
                      >
                        <div class="space-y-1 text-center">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-12 mx-auto text-gray-400 w-42"
                            stroke="currentColor"
                            fill="none"
                            viewBox="0 0 48 48"
                            aria-hidden="true"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                              clip-rule="evenodd"
                            />
                          </svg>
                          <div class="flex text-sm text-gray-600">
                            <label
                              for="file-upload"
                              class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
                            >
                              <span>Upload a file</span>
                              <input
                                id="file-upload"
                                name="file-upload"
                                type="file"
                                class="sr-only"
                              />
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs text-gray-500">
                            Execl, csv to 10MB
                          </p>
                        </div>
                      </div>
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
  teams: Array,
});
const selected = 3;


const form = useForm({
  name: null,
  email: null,
  password: null,
  role: "Employee",
  team_id: null,
});
function submit() {
  Inertia.post(route("store"), form);
}
</script>