<script setup>
import Container from "@/Components/Container.vue";
import InputField from "@/Components/InputField.vue";
import PrimaryBtn from "@/Components/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";
import ErrorMessages from "@/Components/ErrorMessages.vue";
import SessionMessages from "@/Components/SessionMessages.vue";

defineProps({
    status: String
});

const form = useForm({
    email: ''
});

const submit = () => {
    form.post(route('password.email'))
};
</script>

<template>
    <Head title="- Forgot Password" />
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will
            allow you to choose a new one.
        </div>

        <ErrorMessages :errors="form.errors" />
        <SessionMessages :status="status" />

        <form @submit.prevent="submit()" class="space-y-6">
            <InputField v-model="form.email" label="Email" type="email" icon="at" placeholder="Enter your email" />
            <PrimaryBtn :disabled="form.processing">Send Password Reset Link</PrimaryBtn>
        </form>
    </Container>
</template>
