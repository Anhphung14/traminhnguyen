<template>
  <AdminLayout>
    <h1 class="text-2xl font-extrabold text-emerald-900">{{ post ? 'Chỉnh sửa bài viết' : 'Tạo bài viết' }}</h1>
    <form class="mt-6 space-y-6" method="post" :action="formAction" enctype="multipart/form-data">
      <input type="hidden" name="_token" :value="csrf" />
      <template v-if="post"><input type="hidden" name="_method" value="PUT" /></template>

      <div>
        <label class="block text-sm font-medium text-emerald-900">Tiêu đề</label>
        <input name="title" v-model="title" class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500" />
      </div>

      <div>
        <label class="block text-sm font-medium text-emerald-900">Slug</label>
        <input name="slug" v-model="slug" class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500" />
      </div>

      <div>
        <label class="block text-sm font-medium text-emerald-900">Tóm tắt</label>
        <textarea name="excerpt" rows="3" v-model="excerpt" class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500"></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-emerald-900">Nội dung</label>
        <TinyEditor name="body" v-model="body" />
      </div>

      <div>
        <label class="block text-sm font-medium text-emerald-900">Thumbnail</label>
        <input type="file" name="thumbnail" accept="image/*" class="mt-2 block w-full text-sm text-emerald-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100" />
        <p class="mt-2 text-xs text-emerald-700">Khuyến nghị: 1200×630px (≤ 1MB), JPG/PNG.</p>
        <template v-if="coverImage">
          <div class="mt-3">
            <span class="text-sm text-emerald-900">Hiện tại:</span>
            <img :src="coverImage" alt="Thumbnail hiện tại" class="mt-2 h-24 rounded border border-emerald-200 object-cover" />
          </div>
        </template>
      </div>

      <div class="grid md:grid-cols-1 gap-4">
        <div>
          <label class="block text-sm font-medium text-emerald-900">Ngày xuất bản</label>
          <input type="datetime-local" name="published_at" v-model="publishedAt" class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500" />
        </div>
      </div>

      <div class="flex items-center gap-3">
        <button class="px-5 py-2 rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700" type="submit">Lưu</button>
        <a href="/admin/posts" class="text-emerald-700 hover:text-emerald-800">Hủy</a>
      </div>
    </form>
  </AdminLayout>
 </template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { ref, computed, watch } from 'vue'
import TinyEditor from '@/Components/TinyEditor.vue'
const props = defineProps({ post: Object })
const body = ref(props.post?.body || '')
const csrf = usePage().props.csrf_token
const formAction = computed(() => props.post ? `/admin/posts/${props.post.id}` : '/admin/posts')
const title = ref(props.post?.title || '')
const slug = ref(props.post?.slug || '')
const excerpt = ref(props.post?.excerpt || '')
const coverImage = ref(props.post?.cover_image || '')
const publishedAt = ref(props.post?.published_at || '')

watch(title, (t) => {
  if (!props.post && !slug.value && t) {
    slug.value = t
      .toLowerCase()
      .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
      .replace(/[^a-z0-9\s-]/g, '')
      .trim()
      .replace(/\s+/g, '-')
  }
})
</script>

<style scoped>
</style>


