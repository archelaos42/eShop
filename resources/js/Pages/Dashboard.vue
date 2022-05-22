<!--Component holding the dashboard component-->
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import LandingPage from '@/Pages/LandingPage.vue';


import { defineComponent } from 'vue'



export default defineComponent({
    components: {
        AppLayout, LandingPage
    },
    props: {
        categories:Object,
    },
    data() {
        return {
        }
    },

})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Welcome to Eshop
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <LandingPage :categories="$page['props']['categories']"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
