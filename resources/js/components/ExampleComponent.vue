<template>

    <div>
        <cart></cart>
        <div style="width:100%;margin:20px auto;height:200px">
            <!-- Using the slider component -->
            <slider ref="slider" :options="options" >
                <!-- slideritem wrapped package with the components you need -->
                <slideritem v-for="(item,index) in someList" :key="index" :style="item.style">{{item.html}}</slideritem>
                <!-- Customizable loading -->
                <div slot="loading">loading...</div>
            </slider>
        </div>

        <div class="row justify-content-center">
            <div class="col-6 item" v-for="product in products.data">
                <a :href="`view/${product.id}`" >
                    <img :src="`${product.image}`" class="img-thumbnail">
                </a>
            </div>
        </div>

    </div>
</template>

<script>
import {slider, slideritem} from 'vue-concise-slider'

export default {
    name:'example-component',
    mounted() {
        console.log('Component mounted.')
        this.loadData();
    },
    methods:{
        loadData:function (){
            axios.get(`${process.env.MIX_APP_URL}/api/product/list`).then(response => {
                this.products = response.data;

            }).catch((error) => {
                console.error(error)
            });
        }
    },
    data() {
        return {
            products: [],
            someList: [
                {
                    html: 'slide1',
                    style: {
                        'background': '#1bbc9b'
                    }
                },
                {
                    html: 'slide2',
                    style: {
                        'background': '#4bbfc3'
                    }
                },
                {
                    html: 'slide3',
                    style: {
                        'background': '#7baabe'
                    }
                }
            ],
            options: {
                pagination: true,
                thresholdDistance: 100, // Sliding distance threshold
                thresholdTime: 300, // Sliding time threshold decision
                grabCursor: true, // Scratch style
                speed: 300 // Sliding speed
            }
        }
    },
    components: {
        slider,
        slideritem
    }
}
</script>
<style scoped>

</style>
