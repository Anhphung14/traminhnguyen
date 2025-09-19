<template>
  <PublicLayout>
    <section class="relative overflow-hidden bg-gradient-to-br from-emerald-50 to-emerald-200">
      <div class="max-w-7xl mx-auto px-6 py-10 md:py-16">
        <div class="grid md:grid-cols-2 gap-10 items-center">
          <div class="animate-fade-in-left">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-emerald-900 leading-tight">Trà Khổ Qua Rừng Minh Nguyễn</h1>
            <p class="mt-6 text-lg text-emerald-800/80 max-w-md">Thức uống thảo mộc thanh mát, vị ngọt hậu dịu nhẹ từ thiên nhiên, mang lại sức khỏe và sự tươi mới.</p>
            <div class="mt-8 flex gap-4">
              <a href="/about" class="px-6 py-3 rounded-xl bg-emerald-600 text-white font-semibold shadow-lg shadow-emerald-600/20 hover:bg-emerald-700 transition transform hover:-translate-y-1">Tìm hiểu</a>
              <a href="/blog" class="px-6 py-3 rounded-xl bg-white text-emerald-700 ring-1 ring-emerald-200 hover:ring-emerald-300 hover:bg-emerald-50 transition transform hover:-translate-y-1">Blog</a>
            </div>
          </div>
          <div class="relative flex justify-center animate-fade-in-right">
            <img class="relative rounded-3xl shadow-2xl ring-1 ring-emerald-100 transform hover:scale-105 transition-transform duration-300" src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271767/poster_qbx4jb.png" alt="Poster Minh Nguyễn"/>
            <div class="absolute -bottom-4 -right-4 bg-emerald-300/50 backdrop-blur-md p-3 rounded-full hidden md:block animate-bounce-slow">
                <p class="text-emerald-900 font-bold text-sm">100% Tự nhiên</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-16 md:py-24">
      <div class="flex items-end justify-between gap-6">
        <h2 class="text-3xl md:text-4xl font-extrabold text-emerald-900">Điểm nổi bật</h2>
        <a href="/about" class="text-emerald-700 hover:text-emerald-800 font-semibold transition hover:underline">Xem chi tiết →</a>
      </div>
      <div class="mt-10 grid md:grid-cols-3 gap-8">
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition transform hover:-translate-y-1 group">
          <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271762/nguon_goc_nq0ems.jpg" alt="Nguồn gốc tự nhiên" class="w-16 h-16 mb-4 rounded-full object-cover group-hover:scale-110 transition-transform"/>
          <h3 class="text-xl font-bold text-emerald-800">Nguồn gốc tự nhiên</h3>
          <p class="mt-3 text-emerald-800/80">Chọn lọc kỹ càng từ những trái khổ qua rừng tươi ngon, sấy lạnh giữ trọn dinh dưỡng.</p>
        </div>
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition transform hover:-translate-y-1 group">
          <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271766/suc_khoe_sbgbao.webp" alt="Health Support" class="w-16 h-16 mb-4 rounded-full object-cover group-hover:scale-110 transition-transform"/>
          <h3 class="text-xl font-bold text-emerald-800">Hỗ trợ sức khỏe</h3>
          <p class="mt-3 text-emerald-800/80">Phù hợp người cần thanh lọc cơ thể, hỗ trợ tiêu hóa và mang lại cảm giác sảng khoái.</p>
        </div>
        <div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition transform hover:-translate-y-1 group">
          <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271764/pha_che_tien_loi_hl7rbd.jpg" alt="Easy to Brew" class="w-16 h-16 mb-4 rounded-full object-cover group-hover:scale-110 transition-transform"/>
          <h3 class="text-xl font-bold text-emerald-800">Pha chế tiện lợi</h3>
          <p class="mt-3 text-emerald-800/80">Chỉ cần ủ 3-5 phút là có ngay ly trà thơm ngon, xanh mát để thưởng thức bất cứ lúc nào.</p>
        </div>
      </div>
    </section>

    <!-- Divider -->
    <div class="my-8 md:my-12 flex justify-center">
      <div class="h-1 w-32 md:w-48 bg-gradient-to-r from-emerald-200 via-emerald-400 to-emerald-200 rounded-full opacity-60"></div>
    </div>

    <section class="bg-emerald-50 py-16 md:py-24">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center">
          <h2 class="text-3xl md:text-4xl font-extrabold text-emerald-900">Quy trình sản xuất</h2>
          <p class="mt-4 text-lg text-emerald-800/80 max-w-2xl mx-auto">Chất lượng sản phẩm được đảm bảo từ khâu chọn lọc nguyên liệu đến khi thành phẩm, với sự tỉ mỉ và công nghệ hiện đại.</p>
        </div>
        <div class="mt-12 grid md:grid-cols-4 gap-8 text-center">
          <div class="flex flex-col items-center group animate-fade-in-up delay-100">
            <div class="w-20 h-20 bg-emerald-200 rounded-full flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
              <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271767/thu_hoach_sk1ypk.jpg" alt="Thu hoạch" class="h-16 w-16 rounded-full object-cover"/>
            </div>
            <h3 class="text-xl font-bold text-emerald-800">Thu hoạch</h3>
            <p class="mt-2 text-emerald-800/80">Hái từng trái khổ qua rừng tươi, non, đảm bảo độ chín vừa phải từ những vườn cây được chăm sóc tự nhiên.</p>
          </div>
          <div class="flex flex-col items-center group animate-fade-in-up delay-200">
            <div class="w-20 h-20 bg-emerald-200 rounded-full flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
              <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271765/so_che_tiacuw.jpg" alt="Sơ chế" class="h-16 w-16 rounded-full object-cover"/>
            </div>
            <h3 class="text-xl font-bold text-emerald-800">Sơ chế</h3>
            <p class="mt-2 text-emerald-800/80">Rửa sạch, thái lát mỏng và phơi tự nhiên dưới ánh nắng mặt trời để giữ nguyên dưỡng chất và hương vị.</p>
          </div>
          <div class="flex flex-col items-center group animate-fade-in-up delay-300">
            <div class="w-20 h-20 bg-emerald-200 rounded-full flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
              <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271764/say_uxnvkw.jpg" alt="Sấy lạnh" class="h-16 w-16 rounded-full object-cover"/>
            </div>
            <h3 class="text-xl font-bold text-emerald-800">Sấy lạnh</h3>
            <p class="mt-2 text-emerald-800/80">Sử dụng công nghệ sấy lạnh tiên tiến giúp giữ trọn vẹn màu sắc tự nhiên, hương vị và các vitamin.</p>
          </div>
          <div class="flex flex-col items-center group animate-fade-in-up delay-400">
            <div class="w-20 h-20 bg-emerald-200 rounded-full flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
              <img src="https://res.cloudinary.com/dsqhfz3xt/image/upload/v1758271767/poster_qbx4jb.png" alt="Đóng gói" class="h-16 w-16 rounded-full object-cover"/>
            </div>
            <h3 class="text-xl font-bold text-emerald-800">Đóng gói</h3>
            <p class="mt-2 text-emerald-800/80">Sản phẩm được đóng gói cẩn thận trong bao bì thân thiện môi trường, đảm bảo an toàn vệ sinh thực phẩm.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider -->
    <div class="my-8 md:my-12 flex justify-center">
      <div class="h-1 w-32 md:w-48 bg-gradient-to-r from-emerald-200 via-emerald-400 to-emerald-200 rounded-full opacity-60"></div>
    </div>

    <section class="max-w-7xl mx-auto px-6 py-16 md:py-24">
      <div class="text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-emerald-900">Khách hàng nói gì?</h2>
        <p class="mt-4 text-lg text-emerald-800/80 max-w-2xl mx-auto">Những đánh giá chân thực từ những người đã trải nghiệm và yêu thích sản phẩm Trà Khổ Qua Rừng Minh Nguyễn.</p>
      </div>
      <div class="mt-12 relative overflow-hidden">
        <div class="customer-marquee group">
          <div class="customer-marquee-track">
            <div class="customer-card" v-for="(c, i) in customerComments" :key="i">
              <div class="flex items-center gap-4 mb-4">
                <img class="w-16 h-16 rounded-full object-cover ring-2 ring-emerald-300" :src="c.avatar" :alt="`Avatar ${c.name}`"/>
                <div>
                  <p class="font-bold text-emerald-800">{{ c.name }}</p>
                </div>
              </div>
              <p class="text-emerald-800/80 italic">{{ c.comment }}</p>
            </div>
            <!-- Lặp lại để tạo hiệu ứng liên tục -->
            <div class="customer-card" v-for="(c, i) in customerComments" :key="'repeat-' + i">
              <div class="flex items-center gap-4 mb-4">
                <img class="w-16 h-16 rounded-full object-cover ring-2 ring-emerald-300" :src="c.avatar" :alt="`Avatar ${c.name}`"/>
                <div>
                  <p class="font-bold text-emerald-800">{{ c.name }}</p>
                </div>
              </div>
              <p class="text-emerald-800/80 italic">{{ c.comment }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider -->
    <div class="my-8 md:my-12 flex justify-center">
      <div class="h-1 w-32 md:w-48 bg-gradient-to-r from-emerald-200 via-emerald-400 to-emerald-200 rounded-full opacity-60"></div>
    </div>

    <section class="max-w-7xl mx-auto px-6 py-6 md:py-24">
      <div class="flex items-end justify-between gap-6 mb-8">
        <h2 class="text-3xl md:text-4xl font-extrabold text-emerald-900">Blog nổi bật</h2>
        <a href="/blog" class="text-emerald-700 hover:text-emerald-800 font-semibold transition hover:underline">Xem tất cả →</a>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <div v-for="(blog, i) in props.featuredBlogs" :key="i" class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition transform hover:-translate-y-1 group">
          <img
            :src="blog.image"
            :alt="blog.title"
            class="w-full h-40 mb-4 rounded-xl object-cover group-hover:scale-105 transition-transform"
            @error="event.target.src = '/storage/default-thumbnail.jpg'"
          />
          <h3 class="text-xl font-bold text-emerald-800 mb-2">{{ blog.title }}</h3>
          <p class="mt-2 text-emerald-800/80 line-clamp-3">{{ blog.excerpt }}</p>
          <a :href="blog.link" class="text-emerald-600 hover:text-emerald-800 font-semibold transition hover:underline">Đọc tiếp →</a>
        </div>
      </div>
    </section>

    <!-- Divider -->
    <div class="my-8 md:my-12 flex justify-center">
      <div class="h-1 w-32 md:w-48 bg-gradient-to-r from-emerald-200 via-emerald-400 to-emerald-200 rounded-full opacity-60"></div>
    </div>

    <section class="bg-emerald-700 py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-texture-pattern"></div>
      <div class="max-w-7xl mx-auto px-6 text-center text-white relative z-10">
        <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">Hãy để thiên nhiên chăm sóc bạn mỗi ngày</h2>
        <p class="mt-4 text-lg max-w-2xl mx-auto opacity-90">Khám phá hương vị và lợi ích tuyệt vời từ Trà Khổ Qua Rừng Minh Nguyễn ngay hôm nay để có một cuộc sống khỏe mạnh và tràn đầy năng lượng.</p>
        <div class="mt-8">
          <a
            href="https://zalo.me/0939509234"
            target="_blank"
            rel="noopener"
            class="px-8 py-4 rounded-xl bg-white text-emerald-700 font-semibold shadow-lg hover:bg-emerald-100 transition transform hover:-translate-y-1 hover:scale-105 inline-block animate-pulse-once"
          >
            Liên hệ Zalo
          </a>
        </div>
      </div>
    </section>
  </PublicLayout>
</template>

<script setup>
import { ref } from 'vue'
import PublicLayout from '@/Layouts/PublicLayout.vue'

const customerComments = ref([
  {
    name: 'Nguyễn Thị Mẫn',
    avatar: 'https://ui-avatars.com/api/?name=Nguyễn+Thị+Mẫn&background=E0F2F1&color=00695C&size=128',
    comment: 'Trà rất dễ uống, không hề đắng như tôi nghĩ mà lại có vị ngọt hậu dễ chịu. Uống xong thấy cơ thể nhẹ nhàng, thanh lọc hẳn. Chắc chắn sẽ ủng hộ lâu dài!'
  },
  {
    name: 'Trần Văn Kha',
    avatar: 'https://ui-avatars.com/api/?name=Trần+Văn+Kha&background=E0F2F1&color=00695C&size=128',
    comment: 'Mùi thơm thảo mộc rất dễ chịu, pha nhanh gọn chỉ trong vài phút. Tôi thường uống mỗi sáng để bắt đầu ngày mới thật tỉnh táo và thư giãn. Sản phẩm tuyệt vời!'
  },
  {
    name: 'Lê Thị Hồng',
    avatar: 'https://ui-avatars.com/api/?name=Lê+Thị+Hồng&background=E0F2F1&color=00695C&size=128',
    comment: 'Tôi mua cho cả gia đình dùng, ai cũng thích. Trà thơm, vị dịu, uống thường xuyên thấy khỏe hơn nhiều.'
  },
  {
    name: 'Phạm Văn Tùng',
    avatar: 'https://ui-avatars.com/api/?name=Phạm+Văn+Tùng&background=E0F2F1&color=00695C&size=128',
    comment: 'Dịch vụ tốt, giao hàng nhanh. Trà chất lượng, đóng gói đẹp, rất hài lòng!'
  },
  {
    name: 'Hoàng Minh Châu',
    avatar: 'https://ui-avatars.com/api/?name=Hoàng+Minh+Châu&background=E0F2F1&color=00695C&size=128',
    comment: 'Trà giúp tôi ngủ ngon hơn, cảm giác thư thái sau mỗi lần uống. Sẽ giới thiệu cho bạn bè!'
  },
  {
    name: 'Ngô Quang Huy',
    avatar: 'https://ui-avatars.com/api/?name=Ngô+Quang+Huy&background=E0F2F1&color=00695C&size=128',
    comment: 'Hương vị tự nhiên, không chất bảo quản. Rất yên tâm khi sử dụng lâu dài.'
  },
])

const props = defineProps({
  featuredBlogs: {
    type: Array,
    default: () => []
  }
})
</script>

<style scoped>
/* Basic animations for elements */
/* Customer comment marquee slider */
.customer-marquee {
  width: 100%;
  overflow: hidden;
  position: relative;
  padding: 8px 0;
}
.customer-marquee-track {
  display: flex;
  gap: 2rem;
  width: max-content;
  animation: marqueeScroll 32s linear infinite;
}
.group:hover .customer-marquee-track,
.customer-marquee:hover .customer-marquee-track {
  animation-play-state: paused;
}
.customer-card {
  min-width: 340px;
  max-width: 360px;
  background: #fff;
  border-radius: 1.25rem;
  box-shadow: 0 2px 12px 0 rgba(52,211,153,0.08);
  border: 1px solid #d1fae5;
  padding: 2rem 1.5rem;
  margin-bottom: 0.5rem;
  transition: box-shadow .3s, transform .3s;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  cursor: grab;
}
.customer-card:hover {
  box-shadow: 0 8px 32px 0 rgba(52,211,153,0.15), 0 1.5px 6px 0 rgba(16,185,129,0.08);
  transform: scale(1.04);
}
@keyframes marqueeScroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
@keyframes fadeInLeft {
  from { opacity: 0; transform: translateX(-20px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes fadeInRight {
  from { opacity: 0; transform: translateX(20px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes bounceSlow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
@keyframes pulseOnce {
  0% { transform: scale(1); }
  50% { transform: scale(1.05); }
  100% { transform: scale(1); }
}


.animate-fade-in-left {
  animation: fadeInLeft 0.8s ease-out forwards;
}
.animate-fade-in-right {
  animation: fadeInRight 0.8s ease-out forwards;
}
.animate-fade-in-up {
  animation: fadeInUp 0.7s ease-out forwards;
  opacity: 0; /* ensure it starts hidden */
}
.animate-fade-in-up.delay-100 { animation-delay: 0.1s; }
.animate-fade-in-up.delay-200 { animation-delay: 0.2s; }
.animate-fade-in-up.delay-300 { animation-delay: 0.3s; }
.animate-fade-in-up.delay-400 { animation-delay: 0.4s; }

.animate-bounce-slow {
  animation: bounceSlow 3s infinite ease-in-out;
}
.animate-pulse-once {
    animation: pulseOnce 1.5s ease-in-out;
}

/* Custom background pattern for CTA */
.bg-texture-pattern {
    background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'%3E%3Cpath d='M5 0h1v1L0 6V5h1V0h4zm-2 2h1v1L2 6V5h1V2zm-2 2h1v1L0 6V5h1V4z'/%3E%3C/g%3E%3C/svg%3E");
    background-size: 6px 6px;
}
</style>