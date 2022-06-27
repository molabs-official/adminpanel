<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Tables from "@/components/Tabels";
import { Head , Link } from "@inertiajs/inertia-vue3";
import md5 from "js-md5";
import BreezeButton from "@/Components/Button.vue";
import throttle from 'lodash/throttle'

defineProps({
  filters:Object,
  users:Object,
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
        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <Link href="/addteam" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-orange-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"> new team </Link>
              <Link href="/addemp" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-orange-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">
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
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Image</th>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <template v-for="location in locations" :key="location.name">
                  <tr class="border-t border-gray-200">
                    <th colspan="5" scope="colgroup" class="px-4 py-2 text-sm font-semibold text-left text-gray-900 bg-gray-50 sm:px-6">{{ location.name }}</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
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

  


    <!-- <div class="flex w-3/6 md:w-full">
      <div class="w-full p-8 bg-white rounded-md">
        <div class="flex items-center justify-between pb-6">
          <div>
            <h2 class="font-semibold text-gray-600">Employee table</h2>
            {{ success}}
            <span class="text-xs">All Employees</span>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center p-2 rounded-md bg-gray-50">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-400"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd"
                />
              </svg>
              <input
                class="block ml-1 outline-none bg-gray-50"
                type="text"
                name=""
                id=""
                placeholder="search..."
              />
            </div>
            <div class="ml-10 space-x-8 lg:ml-40">
              <Link href="/addteam" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-orange-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"> new team </Link>
              <Link href="/addemp" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-orange-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">
                Create Employee
              </Link>
            </div>
          </div>
        </div>
        <div>
          <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div
              class="inline-block min-w-full overflow-hidden rounded-lg shadow"
            >
              <table class="min-w-full leading-normal">
                <thead>
                  <tr>
                    <th
                      class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 "
                    >
                      Name
                    </th>
                    <th
                      class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 "
                    >
                      products
                    </th>
                    <th
                      class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 "
                    >
                      Created at
                    </th>
                    <th
                      class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 "
                    >
                      QRT
                    </th>
                    <th
                      class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 "
                    >
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in users" :key="user.id">
                    <td
                      class="px-5 py-5 text-sm bg-white border-b border-gray-200 "
                    >
                    <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/dashboard/${user.id}/edit`">
                       <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                          <img
                            class="w-full h-full rounded-full"
                            :src="`http://www.gravatar.com/avatar/${md5(
                              user.email
                            )}`"
                            alt=""
                          />
                        </div>
                        <div class="ml-3">
                          <p class="text-gray-900 whitespace-no-wrap">
                            {{ user.name }}
                          </p>
                        </div>
                      </div>
                    </Link>
                   
                    </td>
                    <td
                      class="px-5 py-5 text-sm bg-white border-b border-gray-200 "
                    >
                      <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                    </td>
                    <td
                      class="px-5 py-5 text-sm bg-white border-b border-gray-200 "
                    >
                      <p class="text-gray-900 whitespace-no-wrap">
                        Jan 21, 2020
                      </p>
                    </td>
                    <td
                      class="px-5 py-5 text-sm bg-white border-b border-gray-200 "
                    >
                      <p class="text-gray-900 whitespace-no-wrap">43</p>
                    </td>
                    <td
                      class="px-5 py-5 text-sm bg-white border-b border-gray-200 "
                    >
                      <span
                        class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900 "
                      >
                        <span aria-hidden :class="user.isAdmin == 'admin' ? 'absolute inset-0 bg-green-500 rounded-full opacity-50' : 'bg-red-500 rounded-full opacity-50'"></span>
                        <span :class="user.isAdmin == 'admin' ? 'text-green-800' : 'text-red-800 '" >{{ user.isAdmin }}</span>
                        </span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div
                class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between"
              >
                <span class="text-xs text-gray-900 xs:text-sm">
                  Showing 1 to 4 of 50 Entries
                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                  <button
                    class="px-4 py-2 text-sm font-semibold transition duration-150 bg-indigo-600 rounded-l text-indigo-50 hover:bg-indigo-500"
                  >
                    Prev
                  </button>
                  &nbsp; &nbsp;
                  <button
                    class="px-4 py-2 text-sm font-semibold transition duration-150 bg-indigo-600 rounded-r text-indigo-50 hover:bg-indigo-500"
                  >
                    Next
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </BreezeAuthenticatedLayout>
</template>