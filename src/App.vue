<template>
  <div id="bundler">
    <SubProductList :subProducts="subProducts" :bundle="bundle" />
  </div>
</template>

<script>
import SubProductList from "./components/SubProductList.vue";
import bus from './components/bus.js';

export default {
  name: "bundler",
  components: {
    SubProductList
  },
  data() {
    return {
      catalog: [],
      subProducts: [],
      bundle: []
    };
  },
  created() {
    this.getProducts();
    bus.$on('bundleAdd', (product) => {
      if (this.bundle.length < 3) {
        this.bundle.push(product);
      }
      else {
        console.log('too big!');
      }
    });
    bus.$on('removeItem', (id) => {
      this.bundle = this.bundle.filter((product) => {
        return product.id !== id;
      })
    });
  },
  methods: {
    // Gets products from external php script which hits Shopify's API with credentials
    getProducts: function() {
      this.axios.get('http://justinburrow.com/misc/g/braap.php')
      .then(response => {
         this.catalog = response.data;
       })
       .then( ()=> {
         this.filterSub();
       })
       .catch(error => {
         console.log(error);
       })
     },
     // Takes the returned products, pushes all the "true" Recharge items to subProducts
     filterSub: function() {
       for (let product of this.catalog.products) {
         if (product.tags.indexOf('Subscription') > -1 && product.title.indexOf('Bundle') < 0 && product.template_suffix.indexOf('coming-soon') < 0) {
           this.subProducts.push(product);
         }
       }
     }
  }
};
</script>

<style lang="scss">
  #bundler {
    margin: 60px auto 0 auto;
    text-align: center;
    font-family: 'soleil', 'Helvetica Neue', Helvetica, sans-serif;
  }
</style>
