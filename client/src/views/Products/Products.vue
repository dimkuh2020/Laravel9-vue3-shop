<template>
  <div class="about">
    
  </div>
</template>

<script>
  export default {
    name: "Products",

    mounted(){
      this.getProducts();
    },

    methods: {
      getProducts(){
        this.axios.get('/products')
        .then(res => {
          console.log(res);
        });
      }
    }
  }
</script>

<style>

</style>
