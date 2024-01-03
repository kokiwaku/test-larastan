<template>
  <div>
    <h2>Blog</h2>
    <p>Hello world!!</p>

    <router-link to="/post">new</router-link>

    <div class="post" v-for="post in postsList" :key="post.posts_id">
      <p>title：<br />{{ post.title }}</p>
      <p>content：<br />{{ post.content }}</p>
    </div>
  </div>
</template>

<script setup>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";

const postsList = ref([]);

const getPostsList = async () => {
  try {
    const response = await fetch("/api/post/getList");
    const data = await response.json();
    console.log("get post data:", data);
    return data;
  } catch (error) {
    console.error("Fetch Error:", error);
    throw error;
  }
};

onMounted(async () => {
  postsList.value = await getPostsList();
});
</script>

<style>
.post {
  background: gray;
  margin: 1rem 0;
  padding: 1rem;
}
</style>