<template>
  <PublicLayout>
    <section class="relative overflow-hidden bg-gradient-to-b from-emerald-50 to-white">
      <div class="max-w-6xl mx-auto px-6 py-16 md:py-24">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div>
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight text-emerald-900">Về Minh Nguyễn</h1>
            <p class="mt-6 text-lg text-emerald-800/80 leading-relaxed">
              Chúng tôi theo đuổi sản phẩm trà khổ qua rừng tinh tế, giàu giá trị dinh dưỡng, giữ trọn hương vị tự nhiên.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
              <a href="https://zalo.me/0939509234" target="_blank" class="px-5 py-2.5 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700">Zalo</a>
              <a href="https://www.tiktok.com/@mnguyen.2024?_t=ZS-8zpmndFtZ7y&_r=1" target="_blank" class="px-5 py-2.5 rounded-xl bg-white text-emerald-700 ring-1 ring-emerald-200 hover:bg-emerald-50">TikTok</a>
            </div>
            <div class="mt-8 grid grid-cols-2 gap-6">
              <div class="p-5 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm">
                <div class="text-3xl font-extrabold text-emerald-900">OCOP</div>
                <div class="mt-1 text-emerald-800/70 text-sm">Mã số: 93930122020</div>
              </div>
              <div class="p-5 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm">
                <div class="text-3xl font-extrabold text-emerald-900">100%</div>
                <div class="mt-1 text-emerald-800/70 text-sm">Nguồn gốc rõ ràng</div>
              </div>
            </div>
          </div>
          <div class="relative">
            <div class="absolute -inset-6 bg-gradient-to-tr from-emerald-200 to-green-200 rounded-3xl blur-2xl opacity-60"></div>
            <img class="relative rounded-3xl shadow-2xl ring-1 ring-emerald-100" src="/storage/poster.png" alt="Vườn trà"/>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-16">
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100">
          <h3 class="text-xl font-bold text-emerald-900">Sứ mệnh</h3>
          <p class="mt-3 text-emerald-800/80">Mang đến thức uống lành mạnh, an toàn và dễ uống cho mọi gia đình.</p>
        </div>
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100">
          <h3 class="text-xl font-bold text-emerald-900">Giá trị</h3>
          <p class="mt-3 text-emerald-800/80">Minh bạch nguồn gốc, quy trình chuẩn và trải nghiệm khách hàng chu đáo.</p>
        </div>
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100">
          <h3 class="text-xl font-bold text-emerald-900">Liên hệ</h3>
          <p class="mt-3 text-emerald-800/80">ĐT: <a href="tel:0939509234" class="underline">0939509234</a>. Địa chỉ: 64 Ngô Hữu Hạnh, KV3, Phường 1, TP.Vị Thanh, Hậu Giang.</p>
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


