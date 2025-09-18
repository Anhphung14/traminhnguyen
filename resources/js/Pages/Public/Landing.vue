<template>
  <PublicLayout>
  <div class="min-h-screen bg-gradient-to-b from-emerald-50 to-white">
    <header class="relative overflow-hidden">
      <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-emerald-200 blur-3xl opacity-40"></div>
        <div class="absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-green-300 blur-3xl opacity-30"></div>
      </div>
      <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="grid md:grid-cols-2 gap-10 items-center">
          <div>
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-emerald-900">
              Trà Khổ Qua Rừng Minh Nguyễn
            </h1>
            <p class="mt-6 text-lg text-emerald-800/80 leading-relaxed">
              Thức uống thảo mộc thanh mát, hỗ trợ thanh lọc cơ thể, vị ngọt hậu dịu nhẹ từ thiên nhiên.
            </p>
            <div class="mt-8 flex gap-4">
              <a href="#about" class="px-6 py-3 rounded-xl bg-emerald-600 text-white font-semibold shadow-lg shadow-emerald-600/20 hover:bg-emerald-700 transition">Tìm hiểu sản phẩm</a>
              <a href="/blog" class="px-6 py-3 rounded-xl bg-white text-emerald-700 ring-1 ring-emerald-200 hover:ring-emerald-300 hover:bg-emerald-50 transition">Blog sức khỏe</a>
            </div>
          </div>
          <div class="relative">
            <div class="absolute -inset-6 bg-gradient-to-tr from-emerald-200 to-green-200 rounded-3xl blur-2xl opacity-60"></div>
            <img class="relative rounded-3xl shadow-2xl ring-1 ring-emerald-100" src="https://images.unsplash.com/photo-1505576399279-565b52d4ac71?q=80&w=1200&auto=format&fit=crop" alt="Trà thảo mộc"/>
          </div>
        </div>
      </div>
    </header>

    <section id="about" class="max-w-7xl mx-auto px-6 py-16 md:py-24">
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition">
          <h3 class="text-xl font-bold text-emerald-900">Nguồn gốc tự nhiên</h3>
          <p class="mt-3 text-emerald-800/80">Khổ qua rừng chọn lọc, sấy lạnh giữ trọn dinh dưỡng và hương vị.</p>
        </div>
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition">
          <h3 class="text-xl font-bold text-emerald-900">Hỗ trợ sức khỏe</h3>
          <p class="mt-3 text-emerald-800/80">Thích hợp cho người ăn uống thanh đạm, cần thanh lọc cơ thể.</p>
        </div>
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition">
          <h3 class="text-xl font-bold text-emerald-900">Pha chế tiện lợi</h3>
          <p class="mt-3 text-emerald-800/80">Gói lọc tiện dụng, ủ 3-5 phút là có ngay ly trà xanh mát.</p>
        </div>
      </div>
    </section>

    <section class="bg-emerald-50/60">
      <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <h2 class="text-3xl md:text-4xl font-extrabold text-emerald-900 text-center">Cam kết chất lượng</h2>
        <div class="mt-10 grid md:grid-cols-2 gap-10 items-center">
          <img class="rounded-3xl shadow-xl ring-1 ring-emerald-100" src="https://images.unsplash.com/photo-1524592207661-9e009b46af2c?q=80&w=1200&auto=format&fit=crop" alt="Lá trà"/>
          <ul class="space-y-4 text-emerald-800/90">
            <li class="flex items-start gap-3"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-600"></span> Quy trình sản xuất an toàn, không hương liệu tổng hợp.</li>
            <li class="flex items-start gap-3"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-600"></span> Hương vị cân bằng, dễ uống, phù hợp nhiều lứa tuổi.</li>
            <li class="flex items-start gap-3"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-600"></span> Đổi trả nếu sản phẩm không đạt kỳ vọng.</li>
          </ul>
        </div>
      </div>
    </section>

    <footer class="py-12 text-center text-emerald-700">
      © {{ new Date().getFullYear() }} Minh Nguyễn Trà Khổ Qua Rừng
    </footer>
  </div>
  </PublicLayout>
 </template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
</script>

<style scoped>
</style>


