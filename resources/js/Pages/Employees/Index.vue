<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Tables from "@/components/Tabels";
import { Head , Link } from "@inertiajs/inertia-vue3";
import md5 from "js-md5";
import BreezeButton from "@/Components/Button.vue";
import throttle from 'lodash/throttle'

defineProps({
  filters:Object,
  teams:Object,
  success: String,
})
const locations = [
  {
    name: 'Edinburgh',
    people: [
      { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
      { name: 'Courtney Henry', title: 'Designer', email: 'courtney.henry@example.com', role: 'Admin' },
    ],
  },
  // More people...
]

const deep= true


</script>
<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    


    <!-- This example requires Tailwind CSS v2.0+ -->

  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Users</h1>
        <div>{{ $page.props.success }}</div>
        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <Link href="/addteam" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"> new team </Link>
              <Link href="/addemp" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">
                Create Employee
              </Link>
      </div>
    </div>
    <div class="flex flex-col mt-8">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full">
              <thead class="bg-white">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-blue-700 sm:pl-6">Image</th>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-blue-700 sm:pl-6">Name</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-blue-700">Email</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-blue-700">Role</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <template v-for="team in teams.data" :key="team.name">
                  <tr class="border-t border-gray-200">
                    <th colspan="5" scope="colgroup" class="px-4 py-2 text-sm font-semibold text-left text-white bg-red-500 sm:px-6">{{ team.name }}</th>
                  </tr>
                  <tr v-for="user in team.users" :key="user.email">
                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"><img
                            class="rounded-full "
                            :src="`http://www.gravatar.com/avatar/${md5(
                              user.email
                            )}`"
                            alt=""
                          />
                    </td>
                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ user.name }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.email }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"> 
                      <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900 ">
                        <span aria-hidden :class="user.isAdmin == 'admin' ? 'absolute inset-0 bg-green-500 rounded-full opacity-50' : 'bg-red-500 rounded-full opacity-50'"></span>
                        <span :class="user.isAdmin == 'admin' ? 'text-green-800' : 'text-red-800 '" >{{ user.isAdmin }}</span>
                      </span>
                    </td>
                    <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <Link :href="`/dashboard/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900"
                        >Edit<span class="sr-only">, {{ user.name }}</span>
                      </Link>
                    </td>
                  </tr>
                </template>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  </BreezeAuthenticatedLayout>
</template>