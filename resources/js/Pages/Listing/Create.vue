<script setup>
import Container from "@/Components/Container.vue";
import {useForm} from "@inertiajs/vue3";
import Title from "@/Components/Title.vue";
import InputField from "@/Components/InputField.vue";
import TextArea from "@/Components/TextArea.vue";
import ImageUpload from "@/Components/ImageUpload.vue";
import ErrorMessages from "@/Components/ErrorMessages.vue";

const form = useForm({
    title: null,
    desc: null,
    tags: null,
    email: null,
    link: null,
    image: null
})
</script>

<template>
    <Head title="- New Listing" />
    <Container>
        <div class="mb-6">
            <Title>Create a new listing</Title>
        </div>

        <ErrorMessages :errors="form.errors" />

        <form class="grid grid-cols-2 gap-6">
            <div class="space-y-6">
                <InputField label="Title" icon="heading" placeholder="My New Listing" v-model="form.title" />
                <InputField label="Tags (separate with comma)" icon="tags" placeholder="Tag1, Tag2, Tag3" v-model="form.tags" />
                <TextArea label="Description" icon="newspaper" placeholder="This is my listing description" v-model="form.desc" />
            </div>

            <div class="space-y-6">
                <InputField label="Email" icon="at" placeholder="john.doe@example.com" v-model="form.email" />
                <InputField label="External Link" icon="up-right-from-square" placeholder="https://example.com" v-model="form.link" />
                <ImageUpload @image="(e) => form.image = e" />
            </div>
        </form>
    </Container>
</template>
