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
      catalog: []
    };
  },
  created: function() {
    this.getProducts();
  },
  methods: {
    getProducts: function() {
    this.axios.get('http://justinburrow.com/misc/g/braap.php')
    .then(response => {
         this.catalog = response.data;
    })
    .catch(error => {
      console.log(error);
    })
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
