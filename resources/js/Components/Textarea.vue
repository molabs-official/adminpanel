<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <form action="#">
    <TabGroup v-slot="{ selectedIndex }">
      <TabList class="flex items-center">
        <Tab as="template" v-slot="{ selected }">
          <button :class="[selected ? 'text-gray-900 bg-gray-100 hover:bg-gray-200' : 'text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100', 'px-3 py-1.5 border border-transparent text-sm font-medium rounded-md']">Write</button>
        </Tab>
        <Tab as="template" v-slot="{ selected }">
          <button :class="[selected ? 'text-gray-900 bg-gray-100 hover:bg-gray-200' : 'text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100', 'ml-2 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md']">Preview</button>
        </Tab>

        <!-- These buttons are here simply as examples and don't actually do anything. -->
        <div v-if="selectedIndex === 0" class="flex items-center ml-auto space-x-5">
          <div class="flex items-center">
            <button type="button" class="-m-2.5 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500">
              <span class="sr-only">Insert link</span>
              <LinkIcon class="w-5 h-5" aria-hidden="true" />
            </button>
          </div>
          <div class="flex items-center">
            <button type="button" class="-m-2.5 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500">
              <span class="sr-only">Insert code</span>
              <CodeIcon class="w-5 h-5" aria-hidden="true" />
            </button>
          </div>
          <div class="flex items-center">
            <button type="button" class="-m-2.5 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500">
              <span class="sr-only">Mention someone</span>
              <AtSymbolIcon class="w-5 h-5" aria-hidden="true" />
            </button>
          </div>
        </div>
      </TabList>
      <TabPanels class="mt-2">
        <TabPanel class="p-0.5 -m-0.5 rounded-lg">
          <label for="comment" class="sr-only">Comment</label>
          <div>
            <textarea rows="5" name="comment" id="comment" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Add your comment..." />
          </div>
        </TabPanel>
        <TabPanel class="p-0.5 -m-0.5 rounded-lg">
          <div class="border-b">
            <div class="px-3 pt-2 pb-12 mx-px mt-px text-sm leading-5 text-gray-800">Preview content will render here.</div>
          </div>
        </TabPanel>
      </TabPanels>
    </TabGroup>
    
  </form>
</template>

<script setup>
import { Tab, TabGroup, TabList, TabPanel, TabPanels } from '@headlessui/vue'
import { AtSymbolIcon, CodeIcon, LinkIcon } from '@heroicons/vue/solid'
</script>