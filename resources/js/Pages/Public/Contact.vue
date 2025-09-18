<template>
  <PublicLayout>
    <section class="max-w-6xl mx-auto px-6 py-16">
      <h1 class="text-3xl md:text-4xl font-extrabold">Liên hệ</h1>
      <p class="mt-3 text-emerald-800/80">Rất hân hạnh được tư vấn nhanh qua Zalo/Điện thoại.</p>

      <div class="mt-10 grid md:grid-cols-2 gap-10 items-start">
        <form class="space-y-6" method="post" action="#">
          <div>
            <label class="block text-sm font-medium text-emerald-900">Họ và tên</label>
            <input class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500" />
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-emerald-900">Email</label>
              <input type="email" class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500" />
            </div>
            <div>
              <label class="block text-sm font-medium text-emerald-900">Số điện thoại</label>
              <input type="tel" class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500" />
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-emerald-900">Nội dung</label>
            <textarea rows="6" class="mt-2 w-full rounded-lg border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500"></textarea>
          </div>
          <div class="flex items-center gap-3">
            <button class="px-6 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700" type="submit">Gửi</button>
            <a href="https://zalo.me/0939509234" target="_blank" class="px-5 py-3 rounded-xl bg-white text-emerald-700 ring-1 ring-emerald-200 hover:bg-emerald-50">Chat Zalo</a>
          </div>
        </form>

        <div class="space-y-6">
          <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100">
            <h3 class="text-xl font-bold text-emerald-900">Thông tin</h3>
            <div class="mt-4 space-y-2 text-emerald-800/90 text-sm">
              <div><strong>Địa chỉ:</strong> 64 Ngô Hữu Hạnh, KV3, Phường 1, TP.Vị Thanh, Hậu Giang</div>
              <div><strong>Điện thoại:</strong> <a href="tel:0939509234" class="underline">0939509234</a></div>
              <div class="flex items-center gap-3 mt-2">
                <a href="https://zalo.me/0939509234" target="_blank" class="px-3 py-1.5 rounded-md bg-emerald-600 text-white hover:bg-emerald-700">Zalo</a>
                <a href="https://www.tiktok.com/@mnguyen.2024?_t=ZS-8zpmndFtZ7y&_r=1" target="_blank" class="px-3 py-1.5 rounded-md bg-emerald-600 text-white hover:bg-emerald-700">TikTok</a>
              </div>
            </div>
          </div>

          <div class="rounded-2xl overflow-hidden ring-1 ring-emerald-100">
            <iframe class="w-full h-64" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
              src="https://www.google.com/maps?q=64%20Ng%C3%B4%20H%E1%BB%AFu%20H%E1%BA%A1nh,%20Ph%C6%B0%E1%BB%9Dng%201,%20TP.%20V%E1%BB%8B%20Thanh,%20H%E1%BA%ADu%20Giang&output=embed"></iframe>
          </div>
        </div>
      </div>
    </section>
  </PublicLayout>
 </template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
</script>

<style scoped>
</style>


