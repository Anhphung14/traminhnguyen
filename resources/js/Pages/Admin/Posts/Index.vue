<template>
  <AdminLayout>
    <template #actions>
      <a href="/admin/posts/create" class="px-4 py-2 rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700">Tạo bài viết</a>
    </template>
    <div class="overflow-hidden rounded-xl ring-1 ring-emerald-100 bg-white">
      <table class="min-w-full divide-y divide-emerald-100">
        <thead class="bg-emerald-50/60">
          <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-900">Tiêu đề</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-900">Slug</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-900">Xuất bản</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-emerald-100">
          <tr v-for="post in posts.data" :key="post.id" class="hover:bg-emerald-50/40">
            <td class="px-4 py-3 text-emerald-900">{{ post.title }}</td>
            <td class="px-4 py-3 text-emerald-700/80">{{ post.slug }}</td>
            <td class="px-4 py-3 text-emerald-700/80">{{ post.published_at ? new Date(post.published_at).toLocaleDateString() : 'Nháp' }}</td>
            <td class="px-4 py-3 text-right space-x-3">
              <a :href="`/admin/posts/${post.id}/edit`" class="text-emerald-700 hover:text-emerald-800 font-semibold">Sửa</a>
              <form :action="`/admin/posts/${post.id}`" method="post" class="inline">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="_method" value="DELETE" />
                <button class="text-red-600 hover:text-red-700 font-semibold" onclick="return confirm('Xóa bài viết?')" type="submit">Xóa</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AdminLayout>
 </template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
defineProps({ posts: Object })
const csrf = usePage().props.csrf_token
</script>

<style scoped>
</style>


