<script setup>
import Container from '../../Components/Container.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import SessionMessages from '../../Components/SessionMessages.vue';
import { useForm } from "@inertiajs/vue3";


const form = useForm({
    email: ''
});

defineProps({
    status: String
})

const submit = () => {
    form.post(route('password.email'));
}
</script>

<template>
    <Head title="- Forgot Password"/>
    <Container class="w-1/2">
        <div class="text-center mb-8">
            <p>Forgot your password? No Problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
        </div>

        <!-- errors messages -->
        <ErrorMessage :errors="form.errors"/>

        <SessionMessages :status="status"/>

        <form @submit.prevent="submit" class="space-y-6">
          
            <InputField label="Email" icon="at" type="email" v-model="form.email"/>

            <PrimaryBtn :disabled="form.processing">Send Password Reset Link</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped>

</style>