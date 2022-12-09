<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


const props = defineProps({
    projet: Object,
    user: Object,
    cagnotte: Object,

   data() {
    return {
      SoldeCompte: this.user
    }
  },
  });

</script>
<template>
<FormSection>
        <template #title>
            Compte
        </template>

        <template #description>
            Les informations liées a votre solde et vos investissements
        </template>

    <template #form>
            <div class="col-xl-3 mx-auto">
              <div class="row">
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-landmark opacity-100"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center text-black mb-0">Capital</h6>
                      <span class="text-xs">Montant <br> Solde</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0 text-black">{{$page.props.user.capital}} F</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-xl-3">
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fab fa-paypal opacity-100"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center text-black mb-0">Solde</h6>
                      <span class="text-xs">Compte D'ivestissements</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0 text-black">{{$page.props.user.capital}} F</h5>
                    </div>
                  </div>
                </div>
             </div>
             <div class="col-xl-3">
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fab fa-paypal opacity-100"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-0 text-center">
                      <h6 class="text-center text-black mb-0">Investissements</h6>
                      <span class="text-xs">Nombre de projet investis</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0 text-black">5</h5>
                    </div>
                  </div>
                </div>
             </div>
    </template>
</FormSection>
</template>