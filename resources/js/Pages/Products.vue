<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { defineComponent } from 'vue'

export default defineComponent({
    components: {
        AppLayout,
    },
    props: {
        products:Object,
    },
    data() {
        return {
        }
    },

})

// defineProps({
//     products: Object,
//     canLogin: Boolean,
//     canRegister: Boolean,
//     laravelVersion: String,
//     phpVersion: String,
// });



</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
<!--                    <Welcome />-->
<!--                    hello {{user.name}}-->
                    <li v-for="product in products">
                        {{ product.name }}
                    </li>


                </div>
            </div>
        </div>
    </AppLayout>
</template>
