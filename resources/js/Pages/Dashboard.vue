<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
defineProps({ stats: Object })
</script>

<template>
	<AdminLayout>
		<div class="grid md:grid-cols-3 gap-6">
			<div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100">
				<div class="text-sm text-emerald-700/70">Tổng số bài viết</div>
				<div class="mt-2 text-3xl font-extrabold">{{ stats.posts }}</div>
			</div>
			<div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100">
				<div class="text-sm text-emerald-700/70">Bài đã xuất bản</div>
				<div class="mt-2 text-3xl font-extrabold">{{ stats.published }}</div>
			</div>
			<div class="p-6 rounded-2xl bg-white ring-1 ring-emerald-100">
				<div class="text-sm text-emerald-700/70">Bài nháp</div>
				<div class="mt-2 text-3xl font-extrabold">{{ stats.drafts }}</div>
			</div>
		</div>
	</AdminLayout>
</template>
