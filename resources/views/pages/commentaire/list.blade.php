<!-- list of ressources  -->
@extends('layouts.default')
@section('content')
<div id="" class="mt-8 ">

    <div class="flex flex-col gap-2 justify-center ">
        <h2 class="text-violet-500 text-xl md:text-2xl font-bold px-2"> Liste de tout les commentaire du site   </h2>

     
        
        
        {{ $commentaires->links() }}
        
        <!-- cadre de tous  les contenus  -->
        <div class="w-full min-h-screen flex flex-row gap-4 flex-wrap justify-center  items-start text-sm text-violet-500  "> 
            @forelse($commentaires as $index => $row)
                <!-- Le cadre d'une ressource  -->
                <div class="w-80 mt-1 flex flex-col gap-1 ">
                            
                            <div class="flex flex-col gap-1  items-center mt-1 space-y-0 ">
                                <h1 class="font-bold text-violet-500 text-md leading-tight">{{ $row->id}}</h1>
                                <p class=" mt-4 mb-4 text-slate-900 border-b border-t border-slate-300 ">   {{ Str::limit($row->corps, 50) }} </p>
                                <p class=" mt-4 mb-4 text-slate-900 border-b border-t border-slate-300 ">   {{ $row->created_at}} </p>
                                <p class=" mt-4 mb-4 text-slate-900 border-b border-t border-slate-300 ">   {{ $row->isactif }} </p>
                            </div>  
                </div>

            @empty <p class="text-violet-500 text-justify"> Aucune commentaire trouvé !!</p>
            @endforelse
        </div>

    </div>    

</div>

@endsection