<template>
  <PublicLayout>
    <Head :title="post.title" />

    <section class="relative overflow-hidden h-64 md:h-72 bg-emerald-700">
      <div class="absolute inset-0">
        <div class="absolute -top-24 -right-16 h-72 w-72 rounded-full bg-emerald-400 blur-3xl opacity-40"></div>
        <div class="absolute -bottom-24 -left-16 h-72 w-72 rounded-full bg-green-300 blur-3xl opacity-40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(255,255,255,0.15),transparent_60%)]"></div>
      </div>
      <div class="relative h-full flex items-end">
        <div class="max-w-4xl mx-auto w-full px-6 pb-8">
          <h1 class="text-3xl md:text-5xl font-extrabold text-white">{{ post.title }}</h1>
          <div class="mt-3 text-emerald-50/90 text-sm" v-if="post.published_at">
            {{ new Date(post.published_at).toLocaleDateString() }}
          </div>
        </div>
      </div>
    </section>

    <div class="max-w-4xl mx-auto px-6 py-10">
      <div class="flex items-center justify-between gap-4">
        <a href="/blog" class="text-emerald-700 hover:text-emerald-800">← Quay lại Blog</a>
        <div class="flex items-center gap-2 text-sm text-emerald-700/80" v-if="post.published_at">
          <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
          <span>{{ new Date(post.published_at).toLocaleString() }}</span>
        </div>
      </div>

      <header class="mt-6">
        <p v-if="post.excerpt" class="mt-3 text-lg text-emerald-800/80">{{ post.excerpt }}</p>
      </header>

      <article class="mt-8 reading-area" v-html="post.body"></article>

      <section v-if="related && related.length" class="mt-12">
        <h2 class="text-xl font-bold text-emerald-900">Bài viết liên quan</h2>
        <div class="mt-4 grid sm:grid-cols-2 gap-6">
          <article v-for="r in related" :key="r.id" class="p-5 rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition">
            <div class="text-sm text-emerald-700/70" v-if="r.published_at">{{ new Date(r.published_at).toLocaleDateString() }}</div>
            <h3 class="mt-2 text-lg font-bold text-emerald-900">{{ r.title }}</h3>
            <p class="mt-2 text-emerald-800/80 line-clamp-2" v-if="r.excerpt">{{ r.excerpt }}</p>
            <a class="mt-3 inline-block text-emerald-700 font-semibold hover:text-emerald-800" :href="route('blog.show', r.slug)">Đọc tiếp →</a>
          </article>
        </div>
      </section>

      <div class="mt-12 pt-8 border-t border-emerald-100 flex items-center justify-between">
        <a href="/blog" class="text-emerald-700 hover:text-emerald-800 font-semibold">← Xem thêm bài khác</a>
        <div class="flex items-center gap-3 text-sm">
          <span class="text-emerald-700/70">Chia sẻ:</span>
          <a :href="`https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`" target="_blank" class="px-3 py-1.5 rounded-md bg-emerald-600 text-white hover:bg-emerald-700">Facebook</a>
          <a :href="`https://twitter.com/intent/tweet?url=${currentUrl}&text=${encodeURIComponent(post.title)}`" target="_blank" class="px-3 py-1.5 rounded-md bg-emerald-600 text-white hover:bg-emerald-700">X</a>
          <a :href="`https://zalo.me/share?url=${encodeURIComponent(currentUrl)}`" target="_blank" class="px-3 py-1.5 rounded-md bg-emerald-600 text-white hover:bg-emerald-700">Zalo</a>
        </div>
      </div>
    </div>
  </PublicLayout>
 </template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
import { Head } from '@inertiajs/vue3'
const props = defineProps({ post: Object })
const currentUrl = typeof window !== 'undefined' ? window.location.href : ''
</script>

<style scoped>
.reading-area {
	color: rgb(4 47 46 / 1);
	font-size: 1.05rem;
	line-height: 1.8;
}
.reading-area :deep(h2) {
	margin-top: 2rem;
	margin-bottom: 0.75rem;
	font-size: 1.5rem;
	font-weight: 800;
	color: rgb(6 78 59 / 1);
}
.reading-area :deep(h3) {
	margin-top: 1.5rem;
	margin-bottom: 0.5rem;
	font-size: 1.25rem;
	font-weight: 700;
	color: rgb(6 95 70 / 1);
}
.reading-area :deep(p) { margin: 0.9rem 0; }
.reading-area :deep(ul) { list-style: disc; padding-left: 1.25rem; }
.reading-area :deep(ol) { list-style: decimal; padding-left: 1.25rem; }
.reading-area :deep(a) { color: rgb(5 150 105 / 1); text-decoration: underline; }
.reading-area :deep(blockquote) {
	border-left: 4px solid rgb(16 185 129 / 1);
	padding-left: 1rem;
	margin: 1rem 0;
	color: rgb(4 120 87 / 1);
	background: rgb(236 253 245 / 0.4);
	border-radius: 0.25rem;
}
.reading-area :deep(img) {
	max-width: 100%;
	border-radius: 0.75rem;
	box-shadow: 0 10px 25px rgba(16,185,129,0.15);
	margin: 1rem auto;
	display: block;
}
.reading-area :deep(code) {
	background: rgba(0,0,0,0.05);
	padding: 0.2rem 0.4rem;
	border-radius: 0.25rem;
}
.reading-area :deep(pre) {
	background: #0f172a;
	color: #e2e8f0;
	padding: 1rem;
	border-radius: 0.5rem;
	overflow: auto;
}
</style>


