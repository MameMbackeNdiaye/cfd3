<script >
import { Head, Link } from '@inertiajs/inertia-vue3';
import { defineComponent } from "vue"
import Footer from '@/Layouts/Footer.vue';
import Welcome from '@/Jetstream/Welcome.vue';


export default defineComponent({
  components: {
    Welcome,
    Footer,
    Head,
    Link
  },
    props:['projets','canLogin','canRegister'],

   data() {
    return {
      projetList: this.projets
    }
  },
  daisyui: {
    themes: ["light", "dark", "cupcake", "bumblebee", "emerald", "corporate", "synthwave", "retro", "cyberpunk", "valentine", "halloween", "garden", "forest", "aqua", "lofi", "pastel", "fantasy", "wireframe", "black", "luxury", "dracula", "cmyk", "autumn", "business", "acid", "lemonade", "night", "coffee", "winter"],
  }

});
</script>

<template >
    <Head title="Welcome" />
    <div data-theme="cupcake" class="navbar bg-base-100">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
    </div>
    <img src="/assets/img/logo3.png" class="navbar-brand-img h-100 ml-4 w-20" alt="main_logo">  </div>
  <div class="navbar-center hidden lg:flex">
  </div>
</div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 font-bold  underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700   underline">Register</Link>
            </template>
        </div>

          <div class="" data-theme="garden">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="hero  shadow-sm border border-none" style="background-image: url(https://images.unsplash.com/photo-1547187028-d29fa38aeb91?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1261&q=80);">

                  <div class="hero-overlay bg-opacity-60"></div>
                  <div class="hero-content text-center text-neutral-content">
                    <div class="max-w-md">
                      <h1 class="mb-5 text-5xl text-white  font-bold">ToGether !</h1>
                      <p class="mb-5 text-white">ACTIVONS DES IMPACTS POSITIFS
                            GR??CE AU FINANCEMENT
                            PARTICIPATIF
                            </p>
                          <a :href=" 'login' " class="m-4 inline-flex items-center justify-center font-extrabold px-5 py-3 text-base  text-center text-indigo-500 border border-indigo-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-gray dark:border-indigo-400 dark:hover:bg-indigo-900 dark:focus:ring-gray-100">
                              Lancer mon projet
                          </a> 

                          <a :href=" '/login'" class=" m-4 inline-flex items-center justify-center font-extrabold px-5 py-3 bg-indigo-700 text-base  text-center text-white border border-indigo-300 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:ring-gray-100 ">
                              Financer un projet
                          </a> 
                    </div>
                  </div>
                    
                </div>
            </h2>
            <div class="stats shadow ml-80 p-6 mt-20">
              <div class="stat">
                <div class="stat-figure text-secondary">
                  <img src="https://www.svgrepo.com/show/427074/done-checkmark.svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </div>
                <div class="stat-title">Projets Lanc??s</div>
                <div class="stat-value">+ 150</div>
                <div class="stat-desc">Jan 1st - Feb 1st</div>
              </div>
              
              <div class="stat">
                <div class="stat-figure text-secondary">
                  <img src="https://www.svgrepo.com/show/427064/money.svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                </div>
                <div class="stat-title">Fonds lev??s</div>
                <div class="stat-value">+ 4,2 M</div>
                <div class="stat-desc">?????? 400 (22%)</div>
              </div>
              
              <div class="stat">
                <div class="stat-figure text-secondary">
                  <img src="https://www.svgrepo.com/show/427066/corporate-user.svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </div>
                <div class="stat-title">Investisseurs</div>
                <div class="stat-value">+ 1,200</div>
                <div class="stat-desc">?????? 200 (12%)</div>
              </div>
              
            </div>
            <section class="mt-24 bg-gray-100">
              <div class="py-12 w-50 bg-light">
                <div class="w-50 mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Crowdfunding</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Un nouveau moyen pour financer son projet</p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Le financement participatif est une strat??gie de financement d'entreprise qui se concentre sur la collecte de petites sommes d'argent aupr??s d'un plus grand collectif d'individus.</p>
                  </div>
                </div>
              </div>
                  </section>
                  <section class="mt-8">
                    <div class="bg-white ">
                      <div class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
                        <div>
                          <h2 class="text-3xl ml-24 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Comment ??a marche..</h2>
                          <img src="https://img.freepik.com/free-vector/businessmans-hand-holding-question-mark-person-asking-answer-help-support-flat-vector-illustration-faq-interrogation-difficulty-concept-banner-website-design-landing-web-page_74855-24358.jpg?w=996&t=st=1664867012~exp=1664867612~hmac=4dc76a3ea6ad5ead52816f8c508269dc0f74f057aa81b53e1141ff464c2241e4" class="mt-4 text-gray-500"/>
                        </div>
                        <div class="mx-auto">
                          <p class="mb-4">    
                              Sur ToGether, vous pouvez investir sur les projets de votre choix et avoir des impacts positifs ??conomiques, sociaux, et environnementaux en ??change de royalties. 
                          </p>
                              <h2 class="text-2xl mb-4 font-extrabold tracking-tight text-indigo-900 sm:text-2xl">Lancer sa campagne:</h2>
                          <p>
                                Il suffit alors de s???inscrire sur la plateforme choisie et de d??poser un dossier pour pr??senter son projet et ses besoins.
                              La plateforme ??tudie le dossier en fonction de la solidit?? de l???entreprise et du potentiel du projet.
                              Apr??s avoir fix?? les modalit??s de collecte (montant vis??, dur??e, contreparties offertes ou conditions de remboursement des pr??ts ???), l???appel ?? lev??e des fonds est lanc??.
                          </p>
                        </div>
                      </div>
                    </div>

                  </section>
                  <div class="divider"></div> 
                  <section>
                    <div class="bg-white ">
                      <div class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
                        <div class="mx-auto">
                              <h2 class="text-2xl mb-4 font-extrabold tracking-tight text-indigo-900 sm:text-2xl">Pour r??ussir sa campagne de crowdfunding,</h2>
                            <p>
                              le projet doit susciter l???int??r??t des crowdfundeurs (contributeurs).
                              Il faut donc soigneusement le pr??parer et v??rifier qu???il soit suffisamment solide et s??duisant.
                              Il faut aussi faire conna??tre son projet autour de soi, sur les r??seaux sociaux, professionnels et personnels.                  </p>
                        </div>
                        <div>
                          <h2 class="text-3xl ml-24 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Ma communaut?? ToGether</h2>
                          <img src="https://img.freepik.com/free-vector/multicultural-people-standing-together_74855-6583.jpg?w=1380&t=st=1664869859~exp=1664870459~hmac=d67152d41a59e9dc5a817d7fd4e7c38393a2b1902617bfb169a8343f52c824be" class="mt-4 text-gray-500"/>
                        </div>

                      </div>
                    </div>

                  </section>
                  <div class="divider"></div> 
                  <section class="">
                    <div class="bg-white ">
                      <div class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
                        <div>
                          <h2 class="text-3xl ml-32 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Objctif final..</h2>
                          <img src="https://img.freepik.com/free-vector/business-leader-standing-arrow-holding-flag-flat-vector-illustration-cartoon-people-training-doing-business-plan-leadership-victory-challenge-concept_74855-9812.jpg?w=740&t=st=1664871371~exp=1664871971~hmac=b9ebc038b518f55826434c7ddebaeed919fa8338114c71d01e31cceecb524013" class="mt-4 text-gray-500"/>
                        </div>
                        <div class="mx-auto">
                              <h2 class="text-2xl mb-4 font-extrabold tracking-tight text-indigo-900 sm:text-2xl">Une fois la p??riode de collecte termin??e,</h2>
                          <p>
                            les sommes r??colt??es vous sont vers??es.
                            Pour fonctionner les plateformes prennent une commission sur le montant des sommes r??colt??es (5 ?? 12 %).
                          </p>
                        </div>
                      </div>
                    </div>

                  </section>
                  <div class="divider"></div> 
                  <section class="mt-4 bg-gray-100">
                      <div class="py-12 w-50 bg-light">
                        <div class="w-50 mx-auto px-4 sm:px-6 lg:px-8">
                          <div class="lg:text-center">
                            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Crowdfunding</h2>
                            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Avec ToGether, vous avez la possibilit?? d'accompagner les entrepreneurs et les nouvelles technologies d??s les premiers stades de d??veloppement.</p>
                            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                              Parcourez les campagnes, lisez les histoires des entrepreneurs eux-m??mes, ??valuez le stade de d??veloppement et les risques potentiels de production,
                              puis financez les projets que vous souhaitez aider ?? r??ussir. </p>
                          </div>
                        </div>
                      </div>
                  </section>
                  <div class="divider"></div> 
              <section>
                <div class="max-w-4xl mx-auto py-24 px-4 grid items-center grid-cols-1 ml-24 gap-y-16 gap-x-8 sm:px-3 sm:py-16 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
                  <div class="card w-96 bg-base-100 ml-16 shadow-xl image-full">
                    <figure><img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Shoes" /></figure>
                    <div class="card-body">
                      <h2 class="card-title">Financer un projet</h2>
                      <p>Avoir un impact positif sur la vie d'un entrepreneur</p>
                      <div class="card-actions justify-end">
                        <a :href=" '/login'" class="btn bg-indigo-700">Investir sur un projet</a>
                      </div>
                    </div>
                  </div>
                  <div class="card w-96 bg-base-100 shadow-xl image-full">
                    <figure><img src="https://images.unsplash.com/photo-1578574577315-3fbeb0cecdc2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80" alt="Shoes" /></figure>
                    <div class="card-body">
                      <h2 class="card-title">Lancer sa campagne</h2>
                      <p>Demarrer une collecte pour financer mon projet</p>
                      <div class="card-actions justify-end">
                        <a :href=" '/login'" class="btn bg-indigo-700">Ajouter mon projet</a>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

          </div>
    </div>
    <Footer></Footer>
</template>
