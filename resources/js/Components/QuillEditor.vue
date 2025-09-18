<template>
  <div>
    <QuillEditor v-model:content="content" contentType="html" theme="snow" :toolbar="toolbar" class="bg-white"/>
    <input type="hidden" :name="name" :value="content" />
  </div>
 </template>

<script setup>
import { ref, watch, onMounted } from 'vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

const props = defineProps({
  modelValue: { type: String, default: '' },
  name: { type: String, default: 'body' }
})
const emit = defineEmits(['update:modelValue'])

const content = ref(props.modelValue || '')
const toolbar = [
  [{ 'font': [] }],
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  ['bold', 'italic', 'underline', 'strike'],
  [{ 'color': [] }, { 'background': [] }],
  [{ 'script': 'sub'}, { 'script': 'super' }],
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'indent': '-1'}, { 'indent': '+1' }],
  [{ 'align': [] }],
  ['blockquote', 'code-block'],
  ['link', 'image', 'video'],
  ['clean']
]

watch(content, (val) => emit('update:modelValue', val))
watch(() => props.modelValue, (val) => { if (val !== content.value) content.value = val || '' })
</script>

<style scoped>
.ql-container {
  min-height: 260px;
  border-radius: 0.5rem;
  border-color: rgb(167 243 208 / 1); /* emerald-200 */
}
.ql-toolbar {
  border-radius: 0.5rem 0.5rem 0 0;
  border-color: rgb(167 243 208 / 1);
}
</style>


