<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ProductsView from '@/Pages/ProductsView.vue'
import ProductGrid from '@/Pages/ProductGrid.vue'
import { defineComponent } from 'vue'

export default defineComponent({
    components: {
        AppLayout, ProductsView, ProductGrid
    },
    props: {
        products:Object,
        category:Object,
        subcategories:Object,
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
                {{ category.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ProductsView
                        :products="$page['props']['products']"
                        :subcategories="$page['props']['subcategories']"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
