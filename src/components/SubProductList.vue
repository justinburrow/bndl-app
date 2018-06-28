<template lang="html">
  <div>
    <div id="subProductList">
      <Product v-for="(product, index) in subProducts" :product="product" :bundle="bundle" v-bind:key="index" />
    </div>
    <div id="bundleTally">
      <BundleTally :bundle="bundle"/>
    </div>
</div>
</template>

<script>
import Product from "./Product.vue";
import BundleTally from "./BundleTally.vue";

export default {
  name: 'SubProductList',
  components: {
    Product,
    BundleTally
  },
  props: {
    subProducts: Array,
    bundle: Array
  }
}
</script>

<style lang="scss">
#subProductList {
  display: inline-grid;
  max-width: 900px;
  margin: 0 auto;
  grid-template-columns: 1fr 1fr 1fr;
  grid-column-gap: 50px;
}
#bundleTally {
  display: inline-block;
  width: 300px;
  background: orange;
  vertical-align: top;
}
</style>
