<template>
    <div>
        <cart></cart>
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <h4 class="text-center">Confirm Booking</h4>
                <ul class="list-group">
                    <li class="list-group-item"><span style="display:inline-block;width: 100px">Name</span>
                        <span>{{ name }}</span></li>
                    <li class="list-group-item"><span style="display:inline-block;width: 100px">Color</span>
                        <span>{{ color }}</span></li>
                    <li class="list-group-item"><span style="display:inline-block;width: 100px">Size</span>
                        <span>{{ size }}</span></li>
                    <li class="list-group-item"><span style="display:inline-block;width: 100px">Quantity</span>
                        <span>{{ qty }}</span></li>
                </ul>
                <div>
                    <div class="d-flex justify-content-center">
                        <a :href="`view/${id}`" class="btn btn-primary">Back</a>
                        <a class="btn btn-success" @click="confirm">Confirm</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    name: "book",
    mounted() {
        console.log('book Component mounted.')

        if (localStorage.getItem('dataBook')) {
            let data = JSON.parse(localStorage.getItem('dataBook'));
            console.log(data);
            this.id = data.id;
            this.name = data.name;
            this.color = data.color;
            this.size = data.size;
            this.qty = data.qty;
        }
    },
    methods: {
        confirm: function () {
            let data = JSON.parse(localStorage.getItem('dataBook'));
            axios.post(`${process.env.MIX_APP_URL}/api/cart/add`, data).then(response => {
                this.removeItem();
                window.location.href = `${process.env.MIX_APP_URL}/`;

            }).catch((error) => {
                console.error(error)
            });
        },
        removeItem: function () {
            window.localStorage.removeItem('dataBook');
        }
    },
    data() {
        return {
            path: process.env.MIX_APP_URL,
            id: '',
            name: '',
            color: '',
            size: '',
            qty: 0,
        }
    },
}
</script>
