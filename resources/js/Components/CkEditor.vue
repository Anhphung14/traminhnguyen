<template>
  <div>
    <CKEditor :editor="ClassicEditor" v-model="content" :config="config" />
    <input type="hidden" :name="name" :value="content" />
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { CKEditor } from '@ckeditor/ckeditor5-vue'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

// Register CKEditor as a local component
const components = { CKEditor }

const props = defineProps({
  modelValue: { type: String, default: '' },
  name: { type: String, default: 'body' }
})
const emit = defineEmits(['update:modelValue'])

const content = ref(props.modelValue || '')
const config = {
  toolbar: [
    'heading','|','bold','italic','underline','link','bulletedList','numberedList','blockQuote','insertTable','undo','redo'
  ]
}

watch(content, (v) => emit('update:modelValue', v))
watch(() => props.modelValue, (v) => { if (v !== content.value) content.value = v || '' })

</script>

<style scoped>
.ck-content {
  min-height: 260px;
  border-radius: 0.5rem;
}
</style>


