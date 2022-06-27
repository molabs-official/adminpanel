<template>
    <BreezeAuthenticatedLayout>
        <!-- component -->

        <div class="w-full sm:px-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200" />
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div
                                class="items-center justify-between hidden text-xs text-gray-400 nav md:flex"
                            >
                                <ul
                                    class="flex pb-3 space-x-10 font-semibold uppercase border-b-4"
                                >
                                    <li>
                                        <Link
                                            :class="{
                                                'active border-b-4 border-red-500 text-gray-900':
                                                    $page.component ===
                                                    'Employee',
                                            }"
                                            class="border-b-4 pb-3 hover:border-yellow @if($status === 'All') text-gray-900 border-yellow @endif"
                                            href="/addemp"
                                        >
                                            Add Employee</Link
                                        >
                                    </li>
                                    <li>
                                        <Link
                                            :class="{
                                                'active border-b-4 border-red-500 text-gray-900':
                                                    $page.component ===
                                                    'Employees/Emport',
                                            }"
                                            class="transition duration-150 ease-in border-b-4 pb-3 hover:border-yellow @if($status === 'Considering') text-gray-900 border-yellow @endif"
                                            href="/emport"
                                        >
                                            Emport Employee</Link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Add Employee
              </h3>
              <p class="mt-1 text-sm text-gray-600">
                Use a Personal Information of the employee.
              </p>
            </div> -->

                        <!-- <div
            class="items-center justify-between hidden text-xs text-gray-400 nav md:flex"
          >
            <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
              <li>
                <a
                  class="
                    border-b-4
                    pb-3
                    hover:border-yellow
                    @if($status
                    ===
                    'All')
                    text-gray-900
                    border-yellow
                    @endif
                  "
                  href="#"
                >
                  All Jobs({{ $allstatusCount }})</a
                >
              </li>
              <li>
                <a
                  class="
                    transition
                    duration-150
                    ease-in
                    border-b-4
                    pb-3
                    hover:border-yellow
                    @if($status
                    ===
                    'Considering')
                    text-gray-900
                    border-yellow
                    @endif
                  "
                  href="#"
                >
                  Urgent({{ $consideringstatusCount }})</a
                >
              </li>
              <li>
                <a
                  class="
                    transition
                    duration-150
                    ease-in
                    border-b-4
                    pb-3
                    hover:border-yellow
                    @if($status
                    ===
                    'In
                    Progress')
                    text-gray-900
                    border-yellow
                    @endif
                  "
                  href="#"
                >
                  Add New Job({{ $inprogressstatusCount }})</a
                >
              </li>
            </ul>
          </div> -->
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div
                                class="flex flex-col justify-center w-full sm:px-6"
                            >
                                <main
                                    class="container h-full max-w-screen-lg mx-auto"
                                >
                                    <!-- file upload modal -->
                                    <article
                                        aria-label="File Upload Modal"
                                        class="relative flex flex-col h-full bg-white rounded-md shadow-xl"
                                        ondrop="dropHandler(event);"
                                        ondragover="dragOverHandler(event);"
                                        ondragleave="dragLeaveHandler(event);"
                                        ondragenter="dragEnterHandler(event);"
                                    >
                                        <!-- overlay -->
                                        <div
                                            id="overlay"
                                            class="absolute top-0 left-0 z-50 flex flex-col items-center justify-center w-full h-full rounded-md pointer-events-none"
                                        >
                                            <i>
                                                <svg
                                                    class="w-12 h-12 mb-3 text-blue-700 fill-current"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z"
                                                    />
                                                </svg>
                                            </i>
                                            <p class="text-lg text-blue-700">
                                                Drop files to upload
                                            </p>
                                        </div>

                                        <!-- scroll area -->
                                        <section
                                            class="flex flex-col w-full h-full p-8 overflow-auto"
                                        >
                                            <form @submit.prevent="submit">
                                                <header
                                                    class="flex flex-col items-center justify-center py-12 border-2 border-gray-400 border-dashed"
                                                >
                                                    <p
                                                        class="flex flex-wrap justify-center mb-3 font-semibold text-gray-900"
                                                    >
                                                        <span
                                                            >Drag and drop
                                                            your</span
                                                        >&nbsp;<span
                                                            >files anywhere
                                                            or</span
                                                        >
                                                    </p>
                                                    <input
                                                        id="hidden-input"
                                                        type="file"
                                                        multiple
                                                        class="hidden"
                                                    />
                                                    <input
                                                        id="file-upload"
                                                        name="file-upload"
                                                        type="file"
                                                        class=""
                                                    />
                                                </header>

                                                <h1
                                                    class="pt-8 pb-3 font-semibold text-gray-900 sm:text-lg"
                                                >
                                                    To Upload
                                                </h1>

                                                <ul
                                                    id="gallery"
                                                    class="flex flex-wrap flex-1 -m-1"
                                                >
                                                    <li
                                                        id="empty"
                                                        class="flex flex-col items-center justify-center w-full h-full text-center"
                                                    >
                                                        <img
                                                            class="w-32 mx-auto"
                                                            src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                                            alt="no data"
                                                        />
                                                        <span
                                                            class="text-gray-500 text-small"
                                                            >No files
                                                            selected</span
                                                        >
                                                    </li>
                                                </ul>
                                                <!-- sticky footer -->
                                                <footer
                                                    class="flex justify-end px-8 pt-4 pb-8"
                                                >
                                                    <button
                                                        id="submit"
                                                        class="inline-flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-orange-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
                                                    >
                                                        Upload now
                                                    </button>
                                                    <button
                                                        id="cancel"
                                                        class="px-3 py-1 ml-3 rounded-sm hover:bg-gray-300 focus:shadow-outline focus:outline-none"
                                                    >
                                                        Cancel
                                                    </button>
                                                </footer>
                                            </form>
                                        </section>
                                    </article>
                                </main>
                            </div>

                            <!-- using two similar templates for simplicity in js code -->
                            <template id="file-template">
                                <li
                                    class="block w-1/2 h-24 p-1 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8"
                                >
                                    <article
                                        tabindex="0"
                                        class="relative w-full h-full bg-gray-100 rounded-md shadow-sm cursor-pointer group focus:outline-none focus:shadow-outline elative"
                                    >
                                        <img
                                            alt="upload preview"
                                            class="sticky hidden object-cover w-full h-full bg-fixed rounded-md img-preview"
                                        />

                                        <section
                                            class="absolute top-0 z-20 flex flex-col w-full h-full px-3 py-2 text-xs break-words rounded-md"
                                        >
                                            <h1
                                                class="flex-1 group-hover:text-blue-800"
                                            ></h1>
                                            <div class="flex">
                                                <span class="p-1 text-blue-800">
                                                    <i>
                                                        <svg
                                                            class="w-4 h-4 pt-1 ml-auto fill-current"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path
                                                                d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z"
                                                            />
                                                        </svg>
                                                    </i>
                                                </span>
                                                <p
                                                    class="p-1 text-xs text-gray-700 size"
                                                ></p>
                                                <button
                                                    class="p-1 ml-auto text-gray-800 rounded-md delete focus:outline-none hover:bg-gray-300"
                                                >
                                                    <svg
                                                        class="w-4 h-4 ml-auto pointer-events-none fill-current"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            class="pointer-events-none"
                                                            d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </section>
                                    </article>
                                </li>
                            </template>

                            <template id="image-template">
                                <li
                                    class="block w-1/2 h-24 p-1 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8"
                                >
                                    <article
                                        tabindex="0"
                                        class="relative w-full h-full text-transparent bg-gray-100 rounded-md shadow-sm cursor-pointer group hasImage focus:outline-none focus:shadow-outline hover:text-white"
                                    >
                                        <img
                                            alt="upload preview"
                                            class="sticky object-cover w-full h-full bg-fixed rounded-md img-preview"
                                        />

                                        <section
                                            class="absolute top-0 z-20 flex flex-col w-full h-full px-3 py-2 text-xs break-words rounded-md"
                                        >
                                            <h1 class="flex-1"></h1>
                                            <div class="flex">
                                                <span class="p-1">
                                                    <i>
                                                        <svg
                                                            class="w-4 h-4 ml-auto fill-current pt-"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path
                                                                d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"
                                                            />
                                                        </svg>
                                                    </i>
                                                </span>

                                                <p class="p-1 text-xs size"></p>
                                                <button
                                                    class="p-1 ml-auto rounded-md delete focus:outline-none hover:bg-gray-300"
                                                >
                                                    <svg
                                                        class="w-4 h-4 ml-auto pointer-events-none fill-current"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            class="pointer-events-none"
                                                            d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </section>
                                    </article>
                                </li>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<style>
.hasImage:hover section {
    background-color: rgba(5, 5, 5, 0.4);
}
.hasImage:hover button:hover {
    background: rgba(5, 5, 5, 0.45);
}

#overlay p,
i {
    opacity: 0;
}

#overlay.draggedover {
    background-color: rgba(255, 255, 255, 0.7);
}
#overlay.draggedover p,
#overlay.draggedover i {
    opacity: 1;
}

.group:hover .group-hover\:text-blue-800 {
    color: #2b6cb0;
}
</style>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import LoadingButton from "@/Components/LoadingButton";
import Input from "@/Components/Input";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";

function submit() {
   Inertia.post(route("import"))
}
</script>
