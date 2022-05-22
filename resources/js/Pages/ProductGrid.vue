<!--Test page, obsolete-->
<script>
export default ({
    components: {
    },
    props: {
        products:Object,
        subcategories:Object,
    },
    data() {
        return {

        }
    },
    mounted() {

    },
    methods: {
        itemsContains(n) {
            return this.filteredSubcategories.indexOf(n) > -1
        },
    }
})
</script>

<template>
    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <div v-for="product in products" class="group relative">
            <div v-if="itemsContains(product.subcategory_id)" class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                <img :src="`/storage/${product.featuredImage}`" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            {{ product.name }}
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Black</p>
                </div>
                <p class="text-sm font-medium text-gray-900">${{ product.price }}</p>
            </div>
        </div>

        <!-- More products... -->
    </div>
</template>



<style scoped>

</style>
