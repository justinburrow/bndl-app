<template lang="html">
  <div class="product">
    <div class="image"><img v-bind:src="product.image.src" v-bind:alt="product.title" /></div>
    <div class="title">{{ product.title }}</div>
    <div class="price">${{ regPrice(product.variants[0].price) }} ${{ product.variants[0].price }}</div>
  </div>
</template>

<script>
export default {
  name: 'Product',
  props: {
    product: Object
  },
  methods: {
    regPrice: (discountPrice) => {
      return (discountPrice / .8).toFixed(2);
    }
  },
}
</script>

<style lang="scss">
  .image {
    text-align: center;
  }
  .product img {
    max-width: 150px;
    width: 100%;
  }
</style>
