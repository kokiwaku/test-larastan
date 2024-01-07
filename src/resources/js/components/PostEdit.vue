<template>
  <div>
    <div>
      <label for="title">title</label>
      <input type="text" id="title" v-model="formValue.title" />
    </div>
    <div style="margin-top: 1rem">
      <label for="content">content</label>
      <textarea cols="40" rows="10" id="content" v-model="formValue.content" />
    </div>

    <button @click="submit" style="margin-right: 0.3rem">保存</button>
    <button>
      <router-link to="/">戻る</router-link>
    </button>
  </div>
</template>

<script setup>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
import { fetchData } from "@/js/libs/fetchApi.js";

const props = defineProps({
  postsId: String,
});

const formValue = reactive({
  title: "",
  content: "",
});

const submit = async () => {
  const body = formValue;
  if (props.postsId !== undefined) {
    body.postsId = props.postsId;
  }
  try {
    await fetchData("/api/post/save", "POST", body);
  } catch (error) {
    console.error("Fetch Error:", error);
    throw error;
  }

  alert("保存に成功!");
  router.push("/");
};

const getPostBy = async (postsId) => {
  try {
    const query = new URLSearchParams({ postsId: postsId });
    return await fetchData(`/api/post/getBy?${query}`);
  } catch (error) {
    console.error("Fetch Error:", error);
    throw error;
  }
};

onMounted(async () => {
  const postsId = props.postsId;
  if (postsId !== undefined) {
    const postData = await getPostBy(postsId);
    formValue.title = postData.title;
    formValue.content = postData.content;
  }
});
</script>

<style>
label {
  display: block;
}
</style>