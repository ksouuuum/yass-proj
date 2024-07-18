<!-- Ajout d une ressource avec telechargement fichier image  -->
@extends('layouts.default') 
@section('content')
<div id="Contact" class="mt-8 ">
    <div class="flex flex-col justify-center items-center ">
      <!-- section header -->
      <h1 class="text-violet-500 text-3xl md:text-4xl font-bold text-center max-w-2xl py-4"> Ajout d'une ressource </h1>
      <div class="w-[90%] flex flex-col items-center justify-center md:flex-row gap-0 ">
          <div class="p-2 w-full md:w-96  flex flex-row items-center  justify-end">
              <form action="{{route('pressource')}}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col items-start gap-2 text-base accent-violet-400">
                    @csrf
                    <input type="text" id="titre" name="titre" placeholder="Titre" value="{{ old('titre') }}" class="w-full px-4 py-2  border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500  placeholder-gray-400" required >

                    <select name="catalogue_id" id="catalogue_id" class="px-3 py-2   bg-violet-50 opacity-60 border border-violet-200 rounded-md focus:outline-none focus:border-violet-500 hover:border-violet-400" required>
                        <option value="" class="" disabled selected >Choisir dans catalogue*</option>
                        @foreach($mycat as $index => $row)
                            <option value="{{ $row->id }}" {{ ((old('catalogue_id') == $row->id) ? 'selected':'') }} > {{ $row->lib }} </option>
                        @endforeach

                    </select>

                    <textarea  name="corps" class="w-full px-4 py-2 placeholder-gray-400 border border-violet-200 rounded-md hover:border-violet-400 focus:outline-none focus:border-violet-500 " 
                          rows="5" 
                          placeholder="le texte de votre ressource" 
                          required> 
                          {{old('corps')}}
                    </textarea>
                    <input type="file" name="mymedia" id="mymedia" class="file:bg-violet-200 file:text-violet-700 file:px-2 file:py-1 file:font-semibold file:border-none file:rounded-full file:mr-4 file:hover:bg-violet-100" >

                    <button type="submit" class="mt-4 px-4 py-2 uppercase rounded-md text-white font-semibold bg-violet-500  hover:bg-violet-400 ransition-all duration-700 ">envoyer</button>
              </form>
          </div>
          <div class="lg:max-w-md  md:w-96 p-2   "> 
              <p class="text-justify text-sm"> *Champs obligatoires. Attention, Toute personne qui publie un contenu illégal sur internet peut être reconnu responsable pénalement. Un contenu est considéré comme illégal lorsqu'il entraîne une infraction. Acte interdit par la loi et puni d'une sanction pénale. </p>
          </div>
      </div>
    </div>
</div>

@endsection

