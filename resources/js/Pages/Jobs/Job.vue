<template>
    <Head title="Add Employee" />

    <BreezeAuthenticatedLayout>
        <div class="w-full sm:px-6">
            <div class="text-gray-600">
                <div class="flex pb-1 mx-auto">
                        <a
                            class="flex justify-start w-1/2 py-3 font-medium leading-none tracking-wider text-red-600 bg-gray-100 border-b-2 border-red-600 rounded-t sm:px-6 sm:w-auto sm:justify-start title-font"
                        >
                            Job Vacancy request
                        </a>
                    </div>
                <div
                    class="flex flex-col h-screen px-5 py-4 mx-auto"
                >
                    
                    <div class="flex flex-col w-full text-center">
                        <div class="h-full py-6 bg-white sm:py-8 lg:py-12">
                            <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                                <!-- form - start -->
                                <form class="max-w-screen-md mx-auto">
                                    <div v-if="steps == 1">
                                        <div class="flex flex-col mb-4">
                                            <label
                                                for="name"
                                                class="inline-flex mb-2 text-sm text-gray-800"
                                                >Job Title</label
                                            >
                                            <input
                                                name="title"
                                                v-model="form.title"
                                                class="w-full px-3 py-2 text-gray-800 border rounded outline-none bg-gray-50 focus:ring ring-red-300"
                                            />
                                        </div>

                                        <div class="flex flex-col mb-4">
                                            <label
                                                for="phone"
                                                class="inline-flex mb-2 text-sm text-gray-800"
                                                >Branch Name</label
                                            >
                                            <input
                                                name="branch"
                                                v-model="form.branch"
                                                class="w-full px-3 py-2 text-gray-800 border rounded outline-none bg-gray-50 focus:ring ring-red-300"
                                            />
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label
                                                for="company"
                                                class="inline-flex mb-2 text-sm text-gray-800"
                                                >Employement Type</label
                                            >
                                            <select-input
                                                v-model="form.type"
                                                :error="form.errors.type"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                            >
                                                <option :value="null" />
                                                <option
                                                    v-for="type in types"
                                                    :key="type.id"
                                                    :value="type.name"
                                                    :v-model="text - black"
                                                >
                                                    {{ type.name }}
                                                </option>
                                            </select-input>
                                        </div>
                                    </div>

                                    <div
                                        v-if="steps == 2"
                                        class="flex flex-row justify-between mb-4"
                                    >
                                        <div
                                            class="col-span-6 w-100 sm:col-span-3"
                                        >
                                            <label
                                                for="job-decription"
                                                class="block text-sm font-medium text-gray-700"
                                                >Job Description</label
                                            >
                                            <QuillEditor
                                                :content="form.content"
                                                theme="snow"
                                                @blur="onEditorBlur($event)"
                                                @focus="onEditorFocus($event)"
                                                @ready="onEditorReady($event)"
                                                class="w-full"
                                            />

                                           
                                         
                                              
                                            
                                            <!-- <textarea v-model="form.content" class="w-full px-3 py-2 text-gray-800 border rounded outline-none bg-gray-50 focus:ring ring-indigo-300"></textarea> -->
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <div class="flex flex-col mb-4">
                                                <form
                                                    @submit.prevent="
                                                        addedSkills
                                                    "
                                                >
                                                    <label
                                                        for="phone"
                                                        class="inline-flex mb-2 text-sm text-gray-800"
                                                        >Add Skills</label
                                                    >
                                                    <input
                                                        name="Skills"
                                                        v-model="newSkill"
                                                        class="w-full px-3 py-2 text-gray-800 border rounded outline-none bg-gray-50 focus:ring ring-red-300"
                                                    />

                                                    <button
                                                        class="inline-flex items-center px-6 py-2 mt-16 text-sm text-gray-800 rounded-lg shadow outline-none gap-x-1 hover:bg-gray-100"
                                                    >
                                                        add
                                                    </button>
                                                </form>
                                                <div
                                                    class="grid grid-cols-4 gap-4"
                                                >
                                                    <button
                                                        v-for="skill in skills"
                                                        :key="skill.id"
                                                        class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                    >
                                                        <h4>
                                                            {{ skill.myskill }}
                                                        </h4>
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <Link
                                            @click="pervSteps"
                                            :class="
                                                steps == 2
                                                    ? 'inline-flex items-center px-6 py-2 mt-16 text-sm text-gray-800 rounded-lg shadow outline-none gap-x-1 hover:bg-gray-100'
                                                    : 'hidden'
                                            "
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
                                        <Link v-if="steps == 1" class="">
                                        </Link>
                                        <Button
                                            @click="nextSteps"
                                            v-if="steps == 1"
                                            class="flex items-center px-4 py-2 ml-4 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
                                        >
                                            Next
                                        </Button>

                                        <Button 
                                            v-if="steps == 2"
                                            @click.prevent="submit"
                                            class="inline-flex items-center px-4 py-2 mt-16 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
                                        >
                                            save
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
import SelectInput from "@/Components/SelectInput.vue";
import Forms from "@/components/Forms";
import Text from "@/components/Textarea"
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";
import BreezeButton from "@/Components/Button.vue";
import { Tab, TabGroup, TabList, TabPanel, TabPanels } from '@headlessui/vue'
import { AtSymbolIcon, CodeIcon, LinkIcon } from '@heroicons/vue/solid'
import { ref } from "vue";

import { QuillEditor, Quill } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { CheckIcon, SelectorIcon } from "@heroicons/vue/solid";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";

defineProps({
    types: Array,
    success: String,
});

const steps = ref(1);

const newSkill = ref("");
const skills = ref([]);

// var delta = quill.getContents();

function nextSteps() {
    steps.value++;
}

function pervSteps() {
    steps.value--;
}
const types = [
    {
        name: "Full time",
    },
    {
        name: "Part time",
    },
    {
        name: "Project time",
    },
];

// const content = async () => {
//   await fetch("", {
//     method: "POST",
//     headers: {
//       "content-Type": "application/json",
//     },
//     body: JSON.stringify({ content: form.content }),
//   });
// };

const addedSkills = function () {
    skills.value.push({
        myskill: newSkill.value,
    }
    
    );
};

const form = useForm({
    title: null,
    branch: null,
    type: null,
    content: null,
    skills: skills,
});

function submit() {
  //  console.log(form)
    Inertia.post(route("addjob"), form);
    Swal.fire({
        title: "Added",
        text: "Job Added Successfully",
        icon: "success",
    });

    form.reset("title", "branch", "type");
}
</script>
