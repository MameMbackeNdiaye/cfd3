<script setup>
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
    projets: Object,
    user: Object,
    cagnotte: Object,

   data() {
    return {
      //projetList: this.projets,
      cagnotteList: this.cagnotte
    }
  },

    daisyui: {
        themes: ["light", "dark", "cupcake", "bumblebee", "emerald", "corporate", "synthwave", "retro", "cyberpunk", "valentine", "halloween", "garden", "forest", "aqua", "lofi", "pastel", "fantasy", "wireframe", "black", "luxury", "dracula", "cmyk", "autumn", "business", "acid", "lemonade", "night", "coffee", "winter"],
  }

});
const form = useForm({
    cagnottes_id:'',
    nom: '',
    themes_id: '',
    budjet: '',
    description: '',
    users_id: props.user.id,
    
});

const submit = () => {
    form.post(route('projets.addProjectStore'), {
        onFinish: () => form.reset('themes_id','budjet','nom','description','users_id','cagnottes_id'),
    });
};

</script>

<template >
  <p > <!--{{ greeting }} !--></p>
  <AppLayout title="Crowdfunding" data-theme="light">
        <div id="multi-step-form" >
        </div>
        <section class="bg-gray-100 m-6 flex bg-local">
        <div class="mx-auto max-w-6xl rounded-lg bg-gradient-to-br from-indigo-50 to-indigo-200 py-20 px-12 lg:px-24 shadow-xl mb-24"> 
         <div class="text-2xl p-4  justify-center md:text-3xl font-extrabold text-indigo-900 sm:pr-12">
            <p>Formulaire Ajout De Projet</p>
         </div>
        <form @submit.prevent='submit'>
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="users_id">
                    User #
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.id" class="w-full text-white font-bold bg-blue-900 border border-none rounded py-3 px-4 mb-3"  id="users_id" type="number"  placeholder="">
                    </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
              <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="themes_id">
                    Theme du projet
                    </label>
                    <div class="">
                    <select v-model="form.themes_id" class="w-100 bg-gray-100 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="themes_id">
                        <option value="1">Technologie</option>
                        <option value="2">Agriculture</option>
                        <option value="4">Energie/Ressources naturelles</option>
                    </select>
                    </div>
                </div>
                    <div>
                    <span class="text-red-500 text-xs italic">
                        Please fill out this field.
                    </span>
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nom">
                        Nom du projet
                    </label>
                    <input class="w-full bg-gray-100 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="nom" type="text" v-model="form.nom"  placeholder="project name">
                </div>
             </div>
                <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                    Description
                    </label>
                    <input class="w-full bg-gray-100 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" v-model="form.description" type="text" placeholder="Entrer les impacts du projet, ses avantages et aboutissants">
                </div>
                </div>
                            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="location">
                    Somme de financement demand??e
                    </label>
                        <label class="input-group">
                            <input type="text" v-model="form.budjet" placeholder="10.000" class="bg-gray-100 text-black border border-gray-200 rounded py-3 px-4 mb-3" />
                            <span class="bg-gray-300 rounded py-3 px-4 mb-3">FR</span>
                        </label> 
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="job-type">
                    Nombre de jours de campagne
                    </label>
                    <div>
                        <input class="w-full bg-gray-100 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="number"  placeholder="saisissez un nombre">
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="multiple_files">Ajouter une photo de Projet</label>
                    <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-none mt-2 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple="">
                </div>
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
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.genre" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="genre" type="text" >
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
                    nationalit??
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
                    T??l??phone
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.telephone" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="telephone" id="telephone" type="text"  placeholder=" votre num??ro de t??l??phone">
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="contactAnnex">
                        Contact annex
                    </label>
                    <div>
                        <input readonly="readonly" v-model="$page.props.user.contactAnnex" name="contactAnnex" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="contactAnnex" type="text"  placeholder="N?? personne de confiance">
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

