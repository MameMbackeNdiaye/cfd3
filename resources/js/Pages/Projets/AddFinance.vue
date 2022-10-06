<script setup   >
import { Head, Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Footer from '@/Layouts/Footer.vue';
import Argon from '@/Layouts/Argon.vue';
import FooterDashboard from '@/Layouts/FooterDashboard.vue';


  components: {
      Argon,
      FooterDashboard,
      AppLayout,
      Footer
  }

const props = defineProps({
    projet: Object,
    user: Object,
    cagnotte: Object,

   data() {
    return {
      projetAddProject: this.projet
    }
  },
  daisyui: {
    themes: ["light", "dark", "cupcake", "bumblebee", "emerald", "corporate", "synthwave", "retro", "cyberpunk", "valentine", "halloween", "garden", "forest", "aqua", "lofi", "pastel", "fantasy", "wireframe", "black", "luxury", "dracula", "cmyk", "autumn", "business", "acid", "lemonade", "night", "coffee", "winter"],
  }
  });
  const form = useForm({
    projet_id: props.projet.id,
    sommeFinancee: '',
    users_id: props.user.id,
    facture:'',
});
const submit = () => {
    form.post(route('projets.addFinancementStore'), {
        onFinish: () => form.reset('projet_id','sommeFinancee','nom','facture','users_id'),
    });
};

</script>


<template data-theme="light">
  <p > <!--{{ greeting }} !--></p>
  <AppLayout title="Crowdfunding" data-theme="light">
        <div id="multi-step-form" >
            
        </div>
        <section class="bg-gray-100 m-6 flex bg-local">
        <div class="mx-auto max-w-6xl rounded-lg bg-gradient-to-br from-indigo-50 to-indigo-200 py-20 px-12 lg:px-24 shadow-xl mb-24"> 
         <div class="text-2xl p-4  justify-center md:text-3xl font-extrabold text-indigo-900 sm:pr-12">
            <p>Formulaire de financement</p>
         </div>
        <form @submit.prevent='submit'>
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="projet_id">
                    Projet #
                    </label>
                    <div>
                        <input readonly="readonly" v-model="form.projet_id" class="w-full text-white font-bold bg-blue-900 border border-none rounded py-3 px-4 mb-3"  id="projet_id" type="number"  placeholder="">
                    </div>

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
              <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="sommeFinancee">
                            Je veux financer*
                        </label>
                        <label class="input-group">
                            <input type="text" placeholder="10" v-model="form.sommeFinancee" class="bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" />
                            <span class="bg-gray-300 rounded py-3 px-4 mb-3">FR</span>
                        </label> 
                    <div>
                    <span class="text-red-500 text-xs italic">
                        Please fill out this field.
                    </span>
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                        Nom du projet
                    </label>
                    <input readonly class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" v-model="projet.nom" id="title" type="text"  placeholder="project name">
                </div>
             </div>
             <div>
                 <select v-model="form.facture"  name="" id="">
                     <option selected>Voudriez-vous une facture (1:oui / 2:non) ?</option>
                     <option value=0 >Oui</option>
                     <option value=1 >Non</option>
                 </select>
             </div>
            <div class="-mx-3 md:flex">            
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nom">
                    nom
                    </label>
                    <div>
                        <input readonly="readonly"  v-model="$page.props.user.name" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="nom" type="text"  placeholder="votre nom">
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="prenom">
                    Prenom
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.prenom" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="prenom" type="text"  placeholder="votre prenom">
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="department">
                    vous etes
                    </label>
                    <div v-if="$page.props.user.genre==1">
                        <input readonly="readonly" value="homme" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="genre" type="text" >
                    </div>
                    <div v-if="$page.props.user.genre==2">
                        <input readonly="readonly" value=" femme" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="genre" type="text" >
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="location">
                        Date de nassance
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.dateNaissance" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="dateNaissance" type="date"  placeholder="votre date de naissance">
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="paysNaissance">
                        Pays de naissance
                    </label>
                    <div>
                    <div>
                        <input readonly="readonly" name="paysNaissance" v-model="$page.props.user.paysNaissance" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="paysNaissance" type="text"  placeholder="votre date de naissance">
                    </div>
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nationalite">
                    nationalité
                    </label>
                    <div>
                        <input readonly="readonly" name="nationalite" v-model="$page.props.user.nationalite" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="nationalite" type="text"  placeholder="votre nationalite">
                    </div>
                </div>
            </div>
                        <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="codePostal">
                    Code postal
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.codePostal" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="codePostal" type="text"  placeholder="votre code postal">
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="pays">
                    Pays
                    </label>
                    <div>
                        <input readonly="readonly" name="pays" v-model="$page.props.user.pays" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="pays" type="text"  placeholder="votre pays">
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="telephone">
                    Téléphone
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.telephone" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="telephone" id="telephone" type="text"  placeholder=" votre numéro de téléphone">
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="contactAnnex">
                        Contact annex
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.contactAnnex" name="contactAnnex" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="contactAnnex" type="text"  placeholder="N° personne de confiance">
                    </div>
                </div>

            </div>

                <div class="-mx-3 md:flex mt-2">
                <div class="md:w-full px-3">
                    <button type="submit" class="md:w-full mt-6 w-full font-extrabold bg-indigo-900 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Envoyer
                    </button>
                </div>
                </div>
            </div>
            </form>
        </div>
        </section>
<Footer></Footer>
        </AppLayout> 
</template>

