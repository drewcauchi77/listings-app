<script setup>
defineProps({
    routeName: String,
    label: String
})
</script>

<template>
    <Link :href="route(routeName)" class="text-link">{{ label }}</Link>
</template>
