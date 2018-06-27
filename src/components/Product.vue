<template lang="html">
  <div class="product">
    {{ product.title }}
  </div>
</template>

<script>
export default {
  name: 'Product',
  props: {
    product: Object
  }
}
</script>

<style lang="scss">
</style>
