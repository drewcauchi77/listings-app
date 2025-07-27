<script setup>
import Container from "@/Components/Container.vue";
import PrimaryBtn from "@/Components/PrimaryBtn.vue";
import {useForm} from "@inertiajs/vue3";
import SessionMessages from "@/Components/SessionMessages.vue";

defineProps({
    status: String
})

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};
</script>

<template>
    <Head title="- Email Verification" />
    <Container class="w-1/2">
        <div class="mb-8">
            Thanks for signing up! Before getting started, could you verify
            your email address by clicking on the link we just emailed to
            you? If you didn't receive the email, we will gladly send you
            another.
        </div>

        <SessionMessages :status="status" />

        <form @submit.prevent="submit()">
            <PrimaryBtn :disabled="form.processing">Resend Verification</PrimaryBtn>
        </form>
    </Container>
</template>
