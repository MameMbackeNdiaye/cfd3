<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
    prenom: '',
    genre: '',
    dateNaissance: '',
    paysNaissance: '',
    nationalite: '',
    codePostal: '',
    pays: '',
    telephone: '',
    contactAnnex: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Nom" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="prenom" value="Prénom" />
                <TextInput
                    id="prenom"
                    v-model="form.prenom"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="prenom"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>


            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div>
                <InputLabel for="genre" value="Genre" />
                <select name="genre" id="genre" v-model="form.genre">
                    <option value="" selected>Choisir une option</option>
                    <option value="1">homme</option>
                    <option value="2">femme</option>
                </select>
            </div> 

            <div class="mt-4">
                <InputLabel for="dateNaissance" value="Date de naissance" />
                <TextInput
                    id="dateNaissance"
                    v-model="form.dateNaissance"
                    type="date"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <InputLabel for="paysNaissance" value="Pays de naissance" />
                <TextInput
                    id="paysNaissance"
                    v-model="form.paysNaissance"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <InputLabel for="nationalite" value="Nationalite" />
                <TextInput
                    id="nationalite"
                    v-model="form.nationalite"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <InputLabel for="codePostal" value="Code Postal" />
                <TextInput
                    id="codePostal"
                    v-model="form.codePostal"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <InputLabel for="pays" value="Pays" />
                <select name="pays" id="pays" v-model="form.pays">
                    <option value="" selected>Choisir une option</option>
                    <option value="1">senegal</option>
                    <option value="2">gambie</option>
                </select>
            </div>
            <div class="mt-4">
                <InputLabel for="telephone" value="Telephone" />
                <TextInput
                    id="telephone"
                    v-model="form.telephone"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <InputLabel for="contactAnnex" value="Contact Annex" />
                <TextInput
                    id="contactAnnex"
                    v-model="form.contactAnnex"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>




            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    j'ai deja un compte
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Enregistrer 
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
