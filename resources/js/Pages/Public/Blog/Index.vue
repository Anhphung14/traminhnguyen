<template>
  <PublicLayout>
    <section class="relative overflow-hidden bg-gradient-to-b from-emerald-50 to-white">
      <div class="max-w-7xl mx-auto px-6 py-12 md:py-16">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-emerald-900">Blog sức khỏe</h1>
            <p class="mt-2 text-emerald-800/80">Kiến thức và mẹo hay về thức uống thảo mộc, sống xanh mỗi ngày.</p>
          </div>
          <div class="w-full md:w-80">
            <input v-model="query" placeholder="Tìm bài viết..." class="w-full rounded-xl border-emerald-200 focus:ring-emerald-500 focus:border-emerald-500 px-4 py-2.5 bg-white" />
          </div>
        </div>
      </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 py-10">
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <article v-for="post in filtered" :key="post.id" class="group rounded-2xl bg-white ring-1 ring-emerald-100 shadow-sm hover:shadow-md transition overflow-hidden">
          <div class="aspect-video bg-gradient-to-br from-emerald-100 to-emerald-200 relative overflow-hidden">
            <img v-if="post.cover_image" :src="post.cover_image" :alt="post.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
            <div v-else class="w-full h-full flex items-center justify-center">
              <div class="text-emerald-600 text-4xl">📝</div>
            </div>
          </div>
          <div class="p-5">
            <div class="text-xs text-emerald-700/70" v-if="post.published_at">{{ new Date(post.published_at).toLocaleDateString() }}</div>
            <h2 class="mt-2 text-xl font-extrabold text-emerald-900 group-hover:text-emerald-700 transition">{{ post.title }}</h2>
            <p class="mt-2 text-emerald-800/80 line-clamp-3" v-if="post.excerpt">{{ post.excerpt }}</p>
            <a class="mt-4 inline-flex items-center gap-1 text-emerald-700 font-semibold hover:text-emerald-800" :href="route('blog.show', post.slug)">Đọc tiếp <span>→</span></a>
          </div>
        </article>
      </div>

      <div class="mt-10 flex items-center justify-center gap-2" v-if="posts.links && !query">
        <a v-for="link in posts.links" :key="(link.url||'') + link.label" :href="link.url || '#'" class="px-3 py-1.5 rounded-md text-sm"
           :class="[link.active ? 'bg-emerald-600 text-white' : 'text-emerald-700 hover:bg-emerald-50']" v-html="link.label" />
      </div>
    </div>
  </PublicLayout>
 </template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
import { computed, ref } from 'vue'
const props = defineProps({ posts: Object })
const query = ref('')
const normalized = (s) => (s||'').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
const filtered = computed(() => {
  const all = props.posts?.data || []
  if (!query.value) return all
  const q = normalized(query.value)
  return all.filter(p => normalized(p.title).includes(q) || normalized(p.excerpt).includes(q))
})
</script>

<style scoped>
</style>


