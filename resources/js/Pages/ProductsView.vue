<script>
export default ({
    components: {
    },
    props: {
        products:Object,
        images:Object,
        subcategories:Object,
    },
    data() {
        return {
            filteredSubcategories: [],
            localProducts:[],


        }
    },
    mounted() {
        this.localProducts = this.products;
    },
    methods: {
        itemsContains(n) {
            return this.filteredSubcategories.indexOf(n) > -1
        },
        forceUpdate() {
            this.$forceUpdate();
            console.log('updated')
        },

    },
})
</script>

<style scoped>

</style>


<template>
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">{{ filteredSubcategories }}</h2>

            <div class="flex justify-center">
                <div  v-for="subcategory in subcategories" :key="subcategory.id" class="form-check form-check-inline">
                    <div class="form-check">
                        <input v-model="this.filteredSubcategories" @set="this.forceUpdate()" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" :value="subcategory.id" name="flexRadioDefault" :id="subcategory.id">
                        <label class="form-check-label inline-block text-gray-800" :for="subcategory.id">
                            {{ subcategory.name }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <div v-for="product in localProducts" class="group relative">
                    <div v-if="!itemsContains(product.subcategory_id)" class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
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
        </div>
    </div>
</template>
