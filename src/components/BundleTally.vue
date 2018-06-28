<template lang="html">
  <div>
    <div v-if="!bundle.length">
      No items
    </div>
    <div v-if="bundle.length">
      <div class="bundleItem" v-for="(product, index) in bundle" v-bind:key="index">
          <div class="close" v-on:click="removeItem(product.id)">X</div>
          <h1>{{trimTitle(product.title)}}</h1>
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
  }
</style>
