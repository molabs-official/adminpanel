<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  name: null,
  description: null,
});

const submit = () => {
  form.post(route("storeteam"), {
    onFinish: () => form.reset("name", "description"),
  });
};
</script>

<template>
  <BreezeAuthenticatedLayout>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex justify-center mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Add Team
              </h3>
              <p class="mt-1 text-sm text-gray-600">
                Add team to your dashboard
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
                        >Team name</label
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
                      <div>
                        <label
                          for="about"
                          class="block text-sm font-medium text-gray-700"
                        >
                          About
                        </label>
                        <div class="mt-1">
                          <textarea
                            id="about"
                            name="about"
                            v-model="form.description"
                            rows="3"
                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="you@example.com"
                          />
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                          Brief description for your team. URLs are
                          hyperlinked.
                        </p>
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
