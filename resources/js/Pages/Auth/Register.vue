<script setup>
    import Container from '../../Components/Container.vue';
    import Title from '../../Components/Title.vue';
    import TextLink from '../../Components/TextLink.vue';
    import InputField from '../../Components/InputField.vue';
    import PrimaryBtn from '../../Components/PrimaryBtn.vue';
</script>

<template>
    <Container class="w-1/2">
        <div class="text-center mb-8">
            <Title>Register a new account</Title>
            <p>Aleady have an account? 
                <TextLink routeName="home" label="Login" />
            </p>
        </div>

        <form class="space-y-6">
            <InputField label="Name" icon="id-badge" type="text" />
            <InputField label="Email" icon="at" type="email" />
            <InputField label="Password" icon="key" type="password" />
            <InputField label="Password Confirmation" icon="key" type="password" />

            <p class="text-slate-500 text-sm dark:text-slate-400">
                By registering, you agree to the <TextLink routeName="home" label="Terms of Service" /> and <TextLink routeName="home" label="Privacy Policy" />
            </p>
            <PrimaryBtn disabled>Register</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped>

</style>