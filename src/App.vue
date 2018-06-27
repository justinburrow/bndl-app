<template>
  <div id="bundler">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
import HelloWorld from "./components/HelloWorld.vue";

export default {
  name: "bundler",
  components: {
    HelloWorld
  },
  data() {
    return {
      catalog: [],
      subProducts: []
    };
  },
  created: function() {
    this.getProducts();
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
         if (product.tags.indexOf('Subscription') > -1 && product.title.indexOf('Bundle') < 0) {
           this.subProducts.push(product);
         }
       }
     }
  }
};
</script>

<style lang="scss">
#bundler {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
