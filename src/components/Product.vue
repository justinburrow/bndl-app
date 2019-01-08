<template lang="html">
  <div class="product">
    <div class="image" v-on:click="addItem(product)"><img v-bind:src="product.image.src" v-bind:alt="'Genexa '+trimTitle(product.title)" /></div>
    <h3 class="title">{{ trimTitle(product.title) }}</h3>
    <p class="price">Reg. Price ${{ regPrice(product.variants[0].price) }}</p>
    <a class="details" v-bind:href="'https://www.genexa.com/products/' + product.handle.slice(0, -2)" target="_blank">View Details</a>
  </div>
</template>

<script>
import bus from './bus.js';

export default {
  name: 'Product',
  props: {
    product: Object
  },
  methods: {
    regPrice: (discountPrice) => {
      return (discountPrice / .8).toFixed(2);
    },
    trimTitle: (title) => {
      return title.replace(' VIP Subscribe & Save', '');
    },
    addItem: (product) => {
      bus.$emit('bundleAdd', product);
    }
  },
}
</script>

<style lang="scss">
.product {
  margin-bottom: 60px;
  &:hover {
    cursor: pointer;
  }
  h3 {
    margin: 0;
    padding: 0;
  }
  .image {
    text-align: center;
    margin-bottom: 10px;
    padding: 5px;
    img {
      max-width: 150px;
      width: 100%;
    }
  }
  p {
    margin: 0;
  }
  .details {
    margin-top: 5px;
    display: block;
  }
}
</style>
