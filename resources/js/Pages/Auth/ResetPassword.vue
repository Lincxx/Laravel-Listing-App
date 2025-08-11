<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    token: String,
    email: String
})

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
}
</script>

<template>
<Head title="Reset Password"/>
    <Container class="w-1/2">
        <div class="text-center mb-8">
            <Title>Reset Password</Title>
        </div>

        <!-- errors messages -->
        <ErrorMessage :errors="form.errors"/>
        <form @submit.prevent="submit" class="space-y-6">
            <InputField 
                label="Email" 
                icon="at" 
                type="email" 
                v-model="form.email"
            />

            <InputField 
                label="Password" 
                icon="key" 
                type="password" 
                v-model="form.password"
            />

            <InputField 
                label="Password Confirmation" 
                icon="key" type="password" 
                v-model="form.password_confirmation"
            />

            <PrimaryBtn :disabled="form.processing">Reset Password</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped>

</style>