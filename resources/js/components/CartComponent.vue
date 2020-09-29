<template>
    <div class="header clearfix">
        <div class="float-left">
            <a :href="`${path}`">LOGO</a>
        </div>
        <div class="float-right">
            <a :href="`${path}/cart/list`">
                cart ({{ total }})
            </a>
            <span class="oi oi-menu" title="person" aria-hidden="true"></span>
        </div>
    </div>
</template>

<script>

export default {
    name: "cart",
    mounted() {
        console.log('menu Component mounted.')
        this.loadSum();
    },
    methods: {
        loadSum: function () {
            axios.get(`${process.env.MIX_APP_URL}/api/cart/sum`).then(response => {
                if (response.data.data) {
                    this.total = response.data.data;
                }
            }).catch((error) => {
                console.error(error)
            });
        }
    },
    data() {
        return {
            path: process.env.MIX_APP_URL,
            total: 0
        }
    },
}
</script>
<style  scoped>
.header{
    margin: 0 auto;
    max-width: 480px;
}
</style>
