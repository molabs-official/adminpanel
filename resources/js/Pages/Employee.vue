

<template>
  <Head title="Add Employee" />

  <BreezeAuthenticatedLayout>

  
   <div class="w-full sm:px-6">
<div class="mx-auto max-w-fullsm:px-6 lg:px-8">
      <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200" />
        </div>
      </div>

      <div class="mt-10 sm:mt-0">
        <div class="flex flex-col">
          <div class="md:col-span-1">
             <div
            class="items-center justify-between hidden text-xs text-gray-400 nav md:flex"
          >
            <ul class="flex pb-3 space-x-10 font-semibold border-b-4">
              <li>
                <Link
                :class="{'active border-b-4 border-red-500 text-sm text-red-500': $page.component === 'Employee'}"
                  class="pb-3 border-b-4 hover:border-yellow"
                  href="/addemp"
                >
                  Add Employee</Link
                >
              </li>
              <li>
                <Link
                :class="{'active border-b-4 border-red-500 text-sm text-red-500': $page.component === 'Employees/Edit'}"
                  class="pb-3 text-sm text-gray-900 transition duration-150 ease-in border-b-4 hover:border-yellow border-yellow"
                  href="/emport"
                >
                  Emport Employee</Link
                >
              </li>
            </ul>
            </div>
          </div>
            
          <div class="h-full mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
              <div class="flex flex-row overflow-hidden shadow sm:rounded-md">
                <div class="w-1/2 px-4 py-5 bg-white sm:p-6">
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
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
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
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
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
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                      />
                    </div>

                    <div class="flex flex-row">
                      <select-input
                        v-model="form.team_id"
                        :error="form.errors.team_id"
                        class="w-full pb-8 pr-6 lg:w-1/2 focus:ring-red-500 focus:border-red-500"
                        label="Assign to Team"
                      >
                        <option :value="null" />
                        <option
                          v-for="team in teams"
                          :key="team.id"
                          :value="team.id"
                         
                        >
                          {{ team.team_name }}
                        </option>
                       
                      </select-input>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label
                        for="first-name"
                        class="block text-sm font-medium text-gray-700"
                        >Add New Team</label
                      >
                      <input
                        type="text"
                        name="first-name"
                        id="first-name"
                        v-model="form.team_name"
                        autocomplete="given-name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                      />
                    </div>
                  </div>
                </div>
                <div class="flex flex-col items-center justify-center w-1/2">
                  <button type="button" class="relative block w-2/3 p-12 text-center border-2 border-red-600 border-dashed rounded-lg hover:border-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                  
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                 
                  <div class="flex items-center mt-1">
                                        <span
                                            class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-md"
                                        >
                                           
                                        </span>
                                        <input
                                            @change="
                                                form.image =
                                                    $event.target.files[0]
                                            "
                                            type="file"
                                            class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        />
                                    </div>
                  <span class="block mt-2 text-sm font-medium text-gray-900"> Drag and Drop Employee Image </span>

                </button>
                 
                  <div class="flex mt-1 rounded-md shadow-sm">
                    <div class="relative flex items-stretch flex-grow focus-within:z-10">
                      
                      <input type="email" name="email" id="email" class="block w-full pl-10 border-gray-300 rounded-none focus:ring-red-500 focus:border-red-500 rounded-l-md sm:text-sm" placeholder="Upload Employee CV" />
                    </div>
                    <button type="button" class="relative inline-flex items-center px-4 py-2 -ml-px space-x-2 text-sm font-medium text-gray-700 bg-red-600 border border-gray-300 rounded-r-md hover:bg-red-600 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500">
                      <SortAscendingIcon class="w-8 h-8 text-gray-100" aria-hidden="true" />
                      <span></span>
                    </button>
                  </div>
                </div>
                
              </div>
              <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                  <BreezeButton
                    class="ml-4 bg-red-600"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                  >
                    save
                  </BreezeButton>
                </div>
            </form>
          </div>
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
import { CheckIcon, SelectorIcon ,SortAscendingIcon, UsersIcon } from "@heroicons/vue/solid";
import { Inertia } from "@inertiajs/inertia";

// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import FilePond styles
import "filepond/dist/filepond.min.css";

// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles




defineProps({
  teams: Array,
});
const selected = 3;


const form = useForm({
  name: null,
  email: null,
  password: null,
  role: "Employee",
  team_name:null,
  team_id: null,
  image: null,
});
function submit() {
  Inertia.post(route("store"), form);
}
</script>