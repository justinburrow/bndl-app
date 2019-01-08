<template lang="html">
  <div>
    <div v-if="!bundle.length">
      No items
    </div>
    <div v-if="bundle.length">
      <div class="bundleItem" v-for="(product, index) in bundle" v-bind:key="index">
          <div class="close" v-on:click="removeItem(product.id)">X</div>
          <div class="product">
            <div class="image">
              <img v-bind:src="product.image.src" v-bind:alt="'Genexa '+trimTitle(product.title)" />
            </div>
            <div class="details">
              <p>{{trimTitle(product.title)}}</p>
            </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
import bus from './bus.js';

export default {
  name: 'BundleTally',
  props: {
    bundle: Array
  },
  methods: {
    trimTitle: (title) => {
      return title.replace(' VIP Subscribe & Save', '');
    },
    removeItem: (id) => {
      bus.$emit('removeItem', id)
    }
  }
}
</script>

<style lang="scss">
  .bundleItem {
    margin: 20px;
    border: 1px dotted rgba(0,0,0,0.4);
    position: relative;
    .close {
      position: absolute;
      top: 0;
      right: 0;
      padding: 5px 8px;
      background: black;
      color: white;
      cursor: pointer;
    }
    .product {
      display: grid;
      grid-template-columns: 25% 75%;
      grid-column-gap: 15px;
      padding-top: 30px;
      margin-bottom: 0;
      .image {
        text-align: center;
        img {
          max-width: 60px;
        }
      }
      .details {
        text-align: left;
      }
    }
  }
</style>
