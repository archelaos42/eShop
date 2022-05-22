<!--Component holding the Cart component-->
<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import CartView from '@/Pages/CartView.vue'
import { defineComponent } from 'vue'

export default defineComponent({
    components: {
        AppLayout, CartView
    },
    props: {
        products:Object,
        cartContent:Object,
    },
    data() {
        return {
            user: this.$page.props.user
        }
    },
})


</script>

<template>
    <AppLayout title="Cart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your Cart
            </h2>
        </template>
        <div class="py-12">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <CartView
                        :products="$page['props']['products']"
                        :cartContent="$page['props']['cartContent']"
                    />
                </div>
            </div>

    </AppLayout>
</template>


<style scoped>

</style>
