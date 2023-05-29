<template>  
  <nav class="navbar" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <div class="navbar-brand">
        <RouterLink to="/" class="btn btn-outline-success" style="margin-right: 10px">Главная</RouterLink>
        <RouterLink to="/products" class="btn btn-outline-success">Продукты</RouterLink>
      </div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>  
  <RouterView />
</template>

<script setup>
  import { RouterLink, RouterView } from 'vue-router'
  
</script>

<style scoped>
a.router-link-active, li.router-link-active>a {
    color: #fff;
    background-color: #198754;
    }

</style>
