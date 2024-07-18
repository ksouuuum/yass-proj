<!-- Contact form  -->
@extends('layouts.default')
@section('content')
<div id="Contact" class="mt-8 ">
    <div class="flex flex-col justify-center items-center ">
      <!-- section header -->
      <h1 class="text-violet-500 text-3xl md:text-4xl font-bold text-center max-w-2xl py-4" 
              x-intersect:enter="$el.classList.add('animate-fadeUp')" 
              x-intersect:leave="$el.classList.remove('animate-fadeUp')">
              Contact 
      </h1>
      <div class="w-[90%] flex flex-col items-center justify-center md:flex-row gap-0 ">
          <div class="p-2 w-full md:w-96  flex flex-row items-center  justify-end">
              <form action="{{route('pcontact')}}" method="POST" class="w-full flex flex-col items-start gap-2 text-base accent-violet-400">
                    {{ csrf_field() }}
                    {{-- on a joute un champ hidden _btoken qui contient le timestamp mis a dispo du formulaire, on comparera ce timestamp avec l heure du serveur - si en dessous de 15 secondes c'est un bot --}}
                    {{-- on a joute un champ hidden _vtoken qui ne contient rien, s il revient filled, le bot l'a rempli  --}}
                    <input type="hidden" name="_btoken" id="_btoken" value="{{time()}}" >
                    <input type="hidden" name="_vtoken" id="_vtoken" value="">
                    <input type="text" id="nom" name="nom" placeholder="Nom*" value="{{ old('nom') }}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400" required >
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom*" value="{{ old('prenom') }}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400" required >
                    <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="Téléphone-10 chiffres*" class="px-3 py-2  border border-violet-200 rounded-md hover:border-violet-400  focus:outline-none focus:border-violet-500 placeholder-gray-400 " required  pattern="[0-9]{10}" >                          
                    <input type="email"  name="email" value="{{ old('email') }}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400 " 
                          placeholder="vous@domain.ext"
                          required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <select name="sujet" id="sujet" class="px-3 py-2   bg-violet-50 opacity-60 border border-violet-200 rounded-md focus:outline-none focus:border-violet-500 hover:border-violet-400" required>
                        <option value="" class="" disabled selected >Choisir un sujet*</option>
                        <option value="Besoin d'un compte" {{ (old('sujet') == "Besoin d'un compte" ? "selected":"") }} >Besoin d' un compte</option>
                        <option value="Signaler une publication" {{ (old('sujet') == "Signaler une publication" ? "selected":"") }} >Signaler une publication</option>
                        <option value="Signaler un commentaire" {{ (old('sujet') == "Signaler un commentaire" ? "selected":"") }} >Signaler un commentaire</option>
                        <option value="Idee de rubrique" {{ (old('sujet') == "Idee de rubrique" ? "selected":"") }}>Idee de rubrique</option>
                        <option value="idee pour le site" {{ (old('sujet') == "Idee pour le site" ? "selected":"") }}>Idee pour le site</option>
                        <option value="Autre" {{ (old('sujet') == "Autre" ? "selected":"") }}>Autre</option>
                    </select> 
                    <textarea  name="message" class="w-full px-4 py-2 placeholder-gray-400 border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500 " 
                          rows="5" 
                          placeholder="votre message..." 
                          required>{{old('message')}}</textarea>
                    <button type="submit" class="px-4 py-2 uppercase rounded-md text-white font-semibold bg-violet-500  hover:bg-violet-400 ransition-all duration-700 ">envoyer</button>
              </form>
          </div>
          <div class="lg:max-w-md  md:w-96 p-2   "> 
              <p class="text-justify text-sm"> *Champs obligatoires. En renseignant ce formulaire, vous acceptez d'être contacté. Vos coordonnées ne seront transmises à aucun tiers. 
                Vous pouvez vous désinscrire à tout moment à l’aide des liens de désinscription ou en nous contactant à cette adresse yass@home
              </p>
          </div>
      </div>
    </div>
</div>

@endsection

