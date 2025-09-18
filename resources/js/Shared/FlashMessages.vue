<template>
  <div class="space-y-3">
    <div v-if="flash.success" class="rounded-lg bg-emerald-100 text-emerald-900 px-4 py-2 ring-1 ring-emerald-200">{{ flash.success }}</div>
    <div v-if="flash.error" class="rounded-lg bg-red-100 text-red-900 px-4 py-2 ring-1 ring-red-200">{{ flash.error }}</div>
  </div>
 </template>

<script setup>
import { usePage } from '@inertiajs/vue3'
const { props } = usePage()
const flash = props.flash || {}
</script>

<style scoped>
</style>


