<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Tables from "@/components/Tabels";
import { Head , Link} from "@inertiajs/inertia-vue3";
import md5 from "js-md5";
import BreezeButton from "@/Components/Button.vue";


defineProps({
  filters:Object,
  users:Object,
})
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Dashboard
      </h2>
    </template>

    <div class="flex w-3/6 md:w-full">
      <div class="w-full p-8 bg-white rounded-md">
        <div class="flex items-center justify-between pb-6">
          <div>
            <h2 class="font-semibold text-gray-600">Employee table</h2>
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
    </div>
  </BreezeAuthenticatedLayout>
</template>
