<script setup>
import UpdateInfo from "@/Pages/Profile/Sections/UpdateInfo.vue";
import UpdatePassword from "@/Pages/Profile/Sections/UpdatePassword.vue";

defineProps({
    user: Object,
    status: String
});
</script>

<template>
    <Head title="- Profile" />

    <UpdateInfo :user="user" :status="status" />
    <UpdatePassword />
</template>
