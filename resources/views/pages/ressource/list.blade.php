<!-- list of ressources  -->
@extends('layouts.default')
@section('content')
<div id="" class="mt-8 ">
            <form action="{{ route('lressource') }}"  method="GET"  class="pb-3 pr-2 flex flex-row items-center text-slate-300 focus-within:border-b-slate-900 focus-within:text-slate-900 gap-2">

                <select name="catalogue_id" id="catalogue_id" class="px-3 py-2   bg-violet-50 opacity-60 border border-violet-200 rounded-md focus:outline-none focus:border-violet-500 hover:border-violet-400">
                        <option value="" class="" disabled selected >Choisir dans catalogue*</option>                       
                        <option value="1" > Sport </option>
                        <option value="2" >  Cuisine </option>
                        <option value="3" > Cinéma </option>
                        <option value="4" > Théatre   </option>
                        <option value="5" >  Lecture </option>
                        <option value="6" >  Documentation  </option>
                </select>                
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
    <div class="flex flex-col gap-2 justify-center ">
        <h2 class="text-violet-500 text-xl md:text-2xl font-bold px-2"> Les ressources les plus récentes  </h2>

        @if (Request::input('search','') != '') 

        <span>Contenant  <b> {{Request::input('search') }}</b> </span>

        @endif
        
        
        
        {{ $ressources->links() }}
        
        <!-- cadre de tous  les contenus  -->
        <div class="w-full min-h-screen flex flex-row gap-4 flex-wrap justify-center  items-start text-sm text-violet-500  "> 
            @forelse($ressources as $index => $row)
                <!-- Le cadre d'une ressource  -->
                <div class="w-80 mt-1 flex flex-col gap-1 ">
                            <div class=" flex flex-col  w-2/3 mx-auto aspect-square ">
                                <img class="h-40 object-cover rounded-xl" src="{{ route('res-img', [ 'fn' => $row->media ]);}}">
                            </div>
                            
                            <div class="flex flex-col gap-1  items-center mt-1 space-y-0 ">
                                <h1 class="font-bold text-violet-500 text-md leading-tight">{{ $row->titre}}</h1>
                                <p class=" mt-4 mb-4 text-slate-900 border-b border-t border-slate-300 ">   {{ Str::limit($row->catalogue->lib , 20) }}</p>
                                <p class="p-2 text-slate-600 text-justify">    {{ Str::limit($row->corps, 150) }}</p>
                                <a class="p-2 text-blue-500 hover:text-blue-800 self-end"   href="{{ route('ressource', ['id' => $row->id]) }}">Voir...</a>
                            </div>  
                </div>

            @empty <p class="text-violet-500 text-justify"> Aucune ressource trouvée !!</p>
            @endforelse
        </div>

    </div>    

</div>

@endsection


