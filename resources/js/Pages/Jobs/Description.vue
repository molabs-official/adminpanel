<template>
   
    <BreezeAuthenticatedLayout>
    <div class="w-full sm:px-6">
    <div class="text-gray-600">
      <div class="container flex flex-col flex-wrap px-5 py-4 mx-auto">
        <div class="flex flex-wrap mx-auto">
         <a
            class="inline-flex items-center justify-center w-1/2 py-3 font-medium leading-none tracking-wider text-orange-600 bg-gray-100 border-b-2 border-orange-600 rounded-t sm:px-6 sm:w-auto sm:justify-start title-font"
          >
            Job Vacancy request
          </a>
        </div>
        <div class="flex flex-col w-full text-center">
          <div class="py-6 bg-white sm:py-8 lg:py-12">
            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
              <!-- form - start -->
              <form class="max-w-screen-md mx-auto">
                <div class="flex flex-row justify-between mb-4">
                 <div class="col-span-6 sm:col-span-3">
                      <label
                        for="job-decription"
                        class="block text-sm font-medium text-gray-700"
                        >Job Description</label
                      >
                      <QuillEditor
                        
                        theme="snow"
                      />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <div class="flex flex-col mb-4">
                                <label
                                    for="phone"
                                    class="inline-flex mb-2 text-sm text-gray-800"
                                    >Add Skills</label
                                >
                                <input
                                    name="Skills"
                                    class="w-full px-3 py-2 text-gray-800 border rounded outline-none bg-gray-50 focus:ring ring-indigo-300"
                                />
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-between pt-24">
                  <Link href="/job"
                    class="inline-flex items-center px-6 py-2 text-sm text-gray-800 rounded-lg shadow outline-none gap-x-1 hover:bg-gray-100"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                      /></svg
                    >Back
                  </Link>
                  <Button type="submit"
                    class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-orange-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
                  >
                    Save
                  </Button>
                </div>
              </form>
              <!-- form - end -->
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
     
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.bubble.css";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

const content = async () => {
  await fetch("", {
    method: "POST",
    headers: {
      "content-Type": "application/json",
    },
    body: JSON.stringify({ content: form.content }),
  });
};
</script>