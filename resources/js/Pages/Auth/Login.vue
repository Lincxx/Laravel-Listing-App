<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessage from '../../Components/ErrorMessage.vue';
import Checkbox from '../../Components/CheckBox.vue';
import { useForm } from "@inertiajs/vue3";


const form = useForm({
    email: '',
    password: '',
    remember: null
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
}
</script>

<template>
    <Head title="Login"/>
    <Container class="w-1/2">
        <div class="text-center mb-8">
            <Title>Login to your account</Title>
            <p>Need an account? 
                <TextLink routeName="register" label="Register" />
            </p>
        </div>

        <!-- errors messages -->
        <ErrorMessage :errors="form.errors"/>

        <form @submit.prevent="submit" class="space-y-6">
          
            <InputField label="Email" icon="at" type="email" v-model="form.email"/>
            <InputField label="Password" icon="key" type="password" v-model="form.password"/>
        
            <div class="flex items-center justify-between">
                <Checkbox name="remember" v-model="form.remember">Remember me</Checkbox>
                <TextLink routeName="home" label="Forgot Password" />
            </div>

            <PrimaryBtn :disabled="form.processing">login</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped>

</style>