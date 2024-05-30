<template>
    <span class="input-error">{{ errorMsg }}</span>
</template>

<script setup>
const props = defineProps({
    errorMsg: String,
})
</script>