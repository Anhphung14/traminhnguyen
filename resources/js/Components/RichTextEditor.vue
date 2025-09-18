<template>
  <div class="richtext space-y-2">
    <div class="flex flex-wrap gap-2">
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="cmd('toggleBold')"><strong>B</strong></button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="cmd('toggleItalic')"><em>I</em></button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="cmd('toggleStrike')"><s>S</s></button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="cmd('toggleBulletList')">• List</button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="cmd('toggleOrderedList')">1. List</button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="cmd('toggleBlockquote')">“ Quote</button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="cmd('setParagraph')">P</button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="() => setHeading(2)">H2</button>
      <button type="button" class="px-3 py-1.5 rounded-md bg-white ring-1 ring-emerald-200 hover:bg-emerald-50" @click="() => setHeading(3)">H3</button>
    </div>
    <editor-content :editor="editor" class="min-h-[200px] rounded-lg border border-emerald-200 p-4 bg-white" />
    <input type="hidden" :name="name" :value="modelValue" />
  </div>
 </template>

<script setup>
import { onMounted, onBeforeUnmount, watch, computed } from 'vue'
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Link from '@tiptap/extension-link'
import Image from '@tiptap/extension-image'
import Placeholder from '@tiptap/extension-placeholder'

const props = defineProps({
  modelValue: { type: String, default: '' },
  name: { type: String, default: 'body' },
  placeholder: { type: String, default: 'Nhập nội dung bài viết...' }
})
const emit = defineEmits(['update:modelValue'])

let editor

onMounted(() => {
  editor = new Editor({
    extensions: [
      StarterKit,
      Link,
      Image,
      Placeholder.configure({ placeholder: props.placeholder })
    ],
    content: props.modelValue || '',
    onUpdate: ({ editor }) => {
      emit('update:modelValue', editor.getHTML())
    }
  })
})

onBeforeUnmount(() => {
  if (editor) editor.destroy()
})

watch(() => props.modelValue, (val) => {
  if (!editor) return
  const isSame = editor.getHTML() === (val || '')
  if (!isSame) editor.commands.setContent(val || '', false)
})

const cmd = (action) => {
  if (!editor) return
  editor.chain().focus()[action]().run()
}
const setHeading = (level) => {
  if (!editor) return
  editor.chain().focus().toggleHeading({ level }).run()
}
</script>

<style scoped>
.ProseMirror:focus {
  outline: none;
}
</style>


