<template>
  <Editor
    v-model="content"
    :init="initOptions"
  />
  <input type="hidden" :name="name" :value="content" />
</template>

<script setup>
import { ref, watch } from 'vue'
import Editor from '@tinymce/tinymce-vue'
// Self-host TinyMCE (no API key) by bundling core/theme/icons/plugins
import 'tinymce/tinymce'
import 'tinymce/icons/default'
import 'tinymce/themes/silver'
import 'tinymce/models/dom'
// Plugins
import 'tinymce/plugins/advlist'
import 'tinymce/plugins/autolink'
import 'tinymce/plugins/lists'
import 'tinymce/plugins/link'
import 'tinymce/plugins/image'
import 'tinymce/plugins/charmap'
import 'tinymce/plugins/preview'
import 'tinymce/plugins/anchor'
import 'tinymce/plugins/searchreplace'
import 'tinymce/plugins/visualblocks'
import 'tinymce/plugins/code'
import 'tinymce/plugins/fullscreen'
import 'tinymce/plugins/insertdatetime'
import 'tinymce/plugins/media'
import 'tinymce/plugins/table'
import 'tinymce/plugins/help'
import 'tinymce/plugins/wordcount'
import 'tinymce/plugins/emoticons'
import 'tinymce/plugins/quickbars'

const props = defineProps({
  modelValue: { type: String, default: '' },
  name: { type: String, default: 'body' }
})
const emit = defineEmits(['update:modelValue'])

const content = ref(props.modelValue || '')
const initOptions = {
  height: 500,
  menubar: 'file edit view insert format tools table help',
  plugins: [
    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace',
    'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons', 'quickbars'
  ].join(' '),
  toolbar: [
    'undo redo | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify |',
    'bullist numlist outdent indent | link image media table | blockquote | removeformat | code fullscreen'
  ].join(' '),
  quickbars_selection_toolbar: 'bold italic underline | quicklink blockquote',
  toolbar_sticky: true,
  branding: false,
  content_style: 'body { font-family: Montserrat, sans-serif; font-size: 16px }',
  license_key: 'gpl',
  base_url: '/tinymce'
}

watch(content, (v) => emit('update:modelValue', v))
watch(() => props.modelValue, (v) => { if (v !== content.value) content.value = v || '' })
</script>

<style scoped>
</style>


