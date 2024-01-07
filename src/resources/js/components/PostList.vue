<template>
  <div>
    <h2>Booolog</h2>

    <button><router-link to="/post">新規作成</router-link></button>

    <div class="post" v-for="post in postsList" :key="post.posts_id">
      <button @click="edit(post.posts_id)">編集</button>
      <button style="margin-left: 0.2rem" @click="remove(post.posts_id)">
        削除
      </button>
      <p>title：<br />{{ post.title }}</p>
      <p>content：<br />{{ post.content }}</p>
    </div>
  </div>
</template>

<script setup>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";
import { fetchData } from "@/js/libs/fetchApi.js";

const router = useRouter();

const postsList = ref([]);

const getPostsList = async () => {
  return await fetchData("/api/post/getList");
};

const edit = (postsId) => {
  router.push("/post/" + postsId);
};

const remove = async (postsId) => {
  if (confirm("削除して良いですか?")) {
    try {
      const query = new URLSearchParams({ postsId: postsId });
      await fetchData(`/api/post/delete?${query}`, "POST");
    } catch (error) {
      console.error("Fetch Error:", error);
      throw error;
    }

    alert("削除成功しました");
    router.go({ path: router.currentRoute.path, force: true });
  }
};

onMounted(async () => {
  postsList.value = await getPostsList();
});
</script>

<style>
.post {
  background: gainsboro;
  margin: 1rem 0;
  padding: 1rem;
}
</style>