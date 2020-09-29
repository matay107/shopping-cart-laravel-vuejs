<template>
    <div>
        <cart></cart>

        <div class="cart-list">
            <h4>Cart list</h4>
            <div class="item">
                <div v-for="cart in carts.data" class="item-inner row">
                    <img :src="`${cart.image}`" width="100">
                    <span class="col-5 text-center">{{ cart.name }}</span>
                    <span class="col-3">x{{ cart.qty }}</span>
                </div>
            </div>

        </div>
    </div>
</template>
<script>

export default {
    name: "cart-list",
    mounted() {
        console.log('cart List Component mounted.')
        this.loadData();
    },
    methods: {
        loadData: function () {
            axios.get(`${process.env.MIX_APP_URL}/api/cart`).then(response => {
                this.carts = response.data;
            }).catch((error) => {
                console.error(error)
            });
        }
    },
    data() {
        return {
            carts: []
        }
    },
}
</script>
<style scoped>
.cart-list {
    margin: 0 auto;
    max-width: 480px;
}

.item .item-inner {
    margin-bottom: 10px;
}
</style>
