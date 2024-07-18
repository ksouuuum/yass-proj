<!-- Contact form  -->
@extends('layouts.default')
@section('content')
<div id="Contact" class="mt-8 ">
    <div class="flex flex-col justify-center items-center ">
      <!-- section header -->
      <h1 class="text-violet-500 text-3xl md:text-4xl font-bold text-center max-w-2xl py-4" 
              x-intersect:enter="$el.classList.add('animate-fadeUp')" 
              x-intersect:leave="$el.classList.remove('animate-fadeUp')">
              Mise à jour du traitement d'une demande de contact
      </h1>
      <div class="w-[90%] flex flex-col items-center justify-center md:flex-row gap-0 ">
          <div class="p-2 w-full md:w-96  flex flex-row items-center  justify-end">
              <div class="w-full flex flex-col items-start gap-2 text-base accent-violet-400 bg-red-100">

                    <input type="text" id="nom" name="nom" value="{{ $contact->nom }}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400" disabled >
                    <input type="text" id="prenom" name="prenom" value="{{ $contact->prenom }}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400" disabled >
                    <input type="tel" id="mobile" name="mobile" value="{{ $contact->mobile }}" class="px-3 py-2  border border-violet-200 rounded-md hover:border-violet-400  focus:outline-none focus:border-violet-500 placeholder-gray-400 " disabled >                          
                    <input type="email"  name="email" value="{{ $contact->email}}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400 " disabled>
                    <input type="text"  name="sujet" value="{{ $contact->sujet}}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400 " disabled>

                    <textarea  name="message" class="w-full px-4 py-2 placeholder-gray-400 border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500 " 
                          rows="5"  disabled>{{$contact->message}}</textarea>
                    <textarea  name="traitement" class="w-full px-4 py-2 placeholder-gray-400 border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500 " 
                          rows="5"  disabled>{{$contact->traitement}}</textarea>

                </div>
          </div>
          <div class="lg:max-w-md  md:w-96 p-2   "> 
            <form action="{{route('pmcontact')}}" method="POST" class="w-full flex flex-col items-start gap-2 text-base accent-violet-400">
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id" value="{{ $contact->id }}" >
                    <textarea  name="message" class="w-full px-4 py-2 placeholder-gray-400 border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500 " 
                          rows="10" placeholder="Saisir les informations de traitements ..." required ></textarea>
                    <button type="submit" class="px-4 py-2 uppercase rounded-md text-white font-semibold bg-violet-500  hover:bg-violet-400 ransition-all duration-700 ">envoyer</button>                
            </form>            
          </div>
      </div>
    </div>
</div>

@endsection

