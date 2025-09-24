<template>
  <div class="min-h-screen bg-white text-emerald-900">
    <nav class="sticky top-0 z-40 bg-white/80 backdrop-blur ring-1 ring-emerald-100">
      <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="/" class="flex items-center gap-3">
          <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271762/logo_mkuhb7.jpg" alt="Minh Nguyễn" class="h-9 w-auto rounded-md ring-1 ring-emerald-100 object-cover" />
          <span class="font-extrabold text-emerald-900 text-lg md:text-xl">Trà khổ qua rừng Minh Nguyễn</span>
        </a>
        <div class="flex items-center gap-6 text-emerald-800">
          <a href="/" class="hover:text-emerald-900">Trang chủ</a>
          <a href="/about" class="hover:text-emerald-900">Về chúng tôi</a>
          <a href="/contact" class="hover:text-emerald-900">Liên hệ</a>
          <a href="/blog" class="hover:text-emerald-900">Bài viết</a>
        </div>
      </div>
    </nav>
    <main>
      <slot />
    </main>
    <SiteFooter />
  </div>
 </template>

<script setup>
import SiteFooter from '@/Components/SiteFooter.vue'
</script>

<style scoped>
</style>


