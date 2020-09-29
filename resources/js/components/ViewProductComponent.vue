<template>
    <div>
        <cart></cart>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <img :src="`${products.image}`">
                </div>
            </div>
        </div>
        <form @submit="bookProduct">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10"><input type="text" v-model="name" readonly style="border: none"></div>

            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Color</label>
                <div class="col-sm-10 btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="form-check" v-for="(item) in colors">
                        <label class="btn btn-secondary" @click="changeColor(item)">
                            <input type="radio" name="color" v-model="color" autocomplete="off" v-bind:value="item">
                            {{ item }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10 btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="form-check" v-for="item in sizes">
                        <label class="btn btn-secondary" @click="changeSize(item)">
                            <input name="size" type="radio" v-model="size" autocomplete="off" v-bind:value="item">
                            {{ item }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <div class="row">
                        <svg @click="minusQty()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                        </svg>
                        <input type="text" class="form-control" v-model="qty" style="width: 10%">
                        <svg @click="plusQty()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-center">
                    <a :href="`${path}`" class="btn btn-primary">Back</a>
                    <button class="btn btn-success">Book</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'view-product',
    props: ['id'],
    mounted() {
        this.loadData();
    },
    methods: {
        changeColor: function (value) {
            console.log(value)
            this.color = value;
        },
        changeSize: function (value) {
            console.log(value)
            this.size = value;
        },
        minusQty: function () {
            this.qty -= 1;
            if (this.qty <= 1) {
                this.qty = 1
            }
            this.qty = this.qty;
        },
        plusQty: function () {
            this.qty += 1;
            this.qty = this.qty;
        },
        loadData: function () {
            axios.get(`${process.env.MIX_APP_URL}/api/product/${this.id}`).then(response => {
                this.products = response.data.data;
                this.image = this.products.image;
                this.name = this.products.name;
                this.colors = this.products.color.split(',');
                this.sizes = this.products.size.split(',');

            }).catch((error) => {
                console.error(error)
            });
        },
        bookProduct: function (e) {
            e.preventDefault();
            let data = {
                id: this.id,
                name: this.name,
                color: this.color,
                size: this.size,
                qty: this.qty,
                image: this.image
            };
            localStorage.setItem('dataBook', JSON.stringify(data));
            window.location.href = `${process.env.MIX_APP_URL}/book`;
        }
    },
    data() {
        return {
            path: process.env.MIX_APP_URL,
            colors: [],
            sizes: [],
            products: {
                name: '',
                image: '',
            },
            name: '',
            color: '',
            size: '',
            qty: 0,
            image: ''
        }
    },

}
</script>
<style scoped>
form {
    margin: 0 auto;
    max-width: 480px;
}

.btn-secondary input[type=radio] {
    position: absolute;
    clip: rect(0, 0, 0, 0);
    pointer-events: none;
}
</style>
