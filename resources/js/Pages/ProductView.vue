<script>
import {useForm} from "@inertiajs/inertia-vue3";
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";


export default ({
    components: {

    },
    props: {
        product:Object,
        images:Object,
        attributes:Object,
    },
    data() {
        return {
            // selectedId: null,
            // selectedPrice: null,
        }
    },
})
</script>

<style scoped>

</style>


<template>
    <div v-for="product in product" class="bg-white">
        <div class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ product.name }}</h2>
                <p class="mt-4 text-gray-500">{{product.description}}</p>

                <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                    <div v-for="attribute in attributes" class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">{{ attribute.name }}</dt>
                        <dd class="mt-2 text-sm text-gray-500">{{ attribute.value }}</dd>
                    </div>

                </dl>
            </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                <div v-for="image in images">
                <img :src="`/storage/${image.full}`" alt="Walnut card tray filled with cards and card angled in dedicated groove." class="bg-gray-100 rounded-lg">
                </div>
            </div>
        </div>
        <inertia-link
            :href="route('product.add.cart')"
            method="post"
            :data="{
                    productId: product.id,
                    price: product.price,
                    qty: 1,
                    name: product.name,
            }"
            classes="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap bg-blue-600 hover:bg-blue-800"
            as="button"
        >AddtoCart</inertia-link>
    </div>
</template>

