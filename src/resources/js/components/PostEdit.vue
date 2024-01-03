<template>
  <div>
    create

    <div>
      <router-link to="/">back</router-link>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
</script>

<style>
</style>