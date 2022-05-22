<!--Component holding the single product view component-->
<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ProductView from '@/Pages/ProductView.vue'
import { defineComponent } from 'vue'

export default defineComponent({
    components: {
        AppLayout, ProductView
    },
    props: {
        product:Object,
        images:Object,
        attributes:Object,
        cartCount:Number,
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
                {{ cartCount }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ProductView
                        :product="$page['props']['product']"
                        :images="$page['props']['images']"
                        :attributes="$page['props']['attributes']"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>



<style scoped>

</style>
