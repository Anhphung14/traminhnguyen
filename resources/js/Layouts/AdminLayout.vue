<template>
  <div class="min-h-screen bg-emerald-50 text-emerald-900">
    <div class="flex">
      <aside class="w-64 min-h-screen bg-white ring-1 ring-emerald-100">
        <div class="h-16 flex items-center px-6 gap-3">
          <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271762/logo_mkuhb7.jpg" alt="Logo" class="h-9 w-auto rounded-md ring-1 ring-emerald-100 object-cover" />
          <span class="font-extrabold">Admin</span>
        </div>
        <nav class="px-3 space-y-1">
          <a href="/dashboard" class="block rounded-lg px-3 py-2 hover:bg-emerald-50">Tổng quan</a>
          <a href="/admin/posts" class="block rounded-lg px-3 py-2 hover:bg-emerald-50">Bài viết</a>
        </nav>
      </aside>
      <div class="flex-1 min-h-screen">
        <header class="h-16 bg-white/80 backdrop-blur ring-1 ring-emerald-100 flex items-center justify-between px-6">
          <div class="font-semibold">Bảng điều khiển</div>
          <div class="text-emerald-800/80">
            <slot name="actions" />
          </div>
        </header>
        <main class="p-6">
          <FlashMessages />
          <slot />
        </main>
      </div>
    </div>
  </div>
 </template>

<script setup>
import FlashMessages from '@/Shared/FlashMessages.vue'
</script>

<style scoped>
</style>


