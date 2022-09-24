
<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Argon from '@/Layouts/Argon.vue';
import FooterDashboard from '@/Layouts/FooterDashboard.vue';


Argon
FooterDashboard

const props = defineProps({
    user: Object,
    role: Object,
    data: Object,
});
const form = useForm({
    _method: 'PUT',
    nom: props.role.nom,
});

const submit = () => {

    form.post(route('admin.roles.update',props.role.id), {
        preserveScroll: true,
    });
   };
</script>
<template>
<Argon></Argon>
      <div class="row py-4 w-50 ml-80">
        <div class="col-lg-8 mb-lg-0 mb-4 ml-52">
          <div class="card">
            <form @submit.prevent="submit">
                <div class="card-header pb-0 px-3 ">
                <h2 class="text-primary font-bold mb-4">Modification de role</h2>
                </div>
                <div class="form-group">
                    <label for="example-text-input " class="form-control-label text-lg ml-28">Nom:</label>
                    <input type="hidden" name="id" v-model="form.id">
                    <input type="text" class="form-control border-inherit rounded-lg shadow-sm w-50 m-auto" name="title" id="title" v-model="form.nom" />
                </div>
                    <div class="p-1 ml-80">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }"   :disabled="form.processing">
                           <p class="text-sm">Valider</p> 
                        </PrimaryButton>
                        <ActionMessage :on="form.recentlySuccessful" class="mr-3 text-green-300">
                            <p class="text-green-400 p-1 ">succès!</p> 
                        </ActionMessage>

                    </div>
            </form>
        </div>
    </div>
 </div>

    <FooterDashboard></FooterDashboard>
</template>

