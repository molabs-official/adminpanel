<script setup>
import { ref } from "vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import MysideBar from "@/Components/SideBar";
import Header from "@/Components/Header.vue";
import { Link } from "@inertiajs/inertia-vue3";

var md5 = require('md5');
const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <Header/>
            <main>
                <div
                    class="flex w-full h-auto min-h-screen bg-gray-100"
                >
                    <MysideBar />
        
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
