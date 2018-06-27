<template lang="html">
  <div id="subProductList">
    <Product v-for="(product, index) in subProducts" :product="product" v-bind:key="index" />
  </div>
</template>

<script>
import Product from "./Product.vue";

export default {
  name: 'SubProductList',
  components: {
    Product
  },
  props: {
    subProducts: Array
  }
}
</script>

<style lang="scss">
#subProductList {
  display: grid;
  max-width: 1200px;
  margin: 0 auto;
  grid-template-columns: 1fr 1fr 1fr;
  grid-column-gap: 50px;
}
</style>
