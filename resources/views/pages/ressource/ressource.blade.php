<!-- Une ressource et ses commentaires éventuels + la possibilité de saisir un commentaire  -->
@extends('layouts.default') 
@section('content')
<div id="" class="mt-8 ">

    <div class="w-[90%] flex flex-row gap-4 items-start justify-center  "> 

        <div class="w-[50%] mt-1 flex flex-col gap-1 ">
                            <div class="flex flex-col shrink-0 w-2/3 mx-auto aspect-square">
                                <img class="h-60 object-cover rounded-xl" src="{{ route('res-img', [ 'fn' => $myres->media ]);}}">
                            </div>                            
                            <div class="flex flex-col items-center mt-2 space-y-1 ">
                                <h1 class="font-bold text-violet-500 text-md leading-tight">{{ $myres->titre}}</h1>
                                <p class="p-2 text-slate-600 text-justify">    {{ $myres->corps }}</p>                                
                            </div>
                            <div class="flex flex row gap-4 items-center">
                                <span> Rédacteur : {{$myres->user->name}}</span>
                                <span> Créé le : {{$myres->created_at}}</span>
                                <span>Likes : {{ $myres->nblikes }} </span>
                                <span> Vus : {{ $myres->nbvus }} </span>

                            </div>
        </div>

        <div class="w-[50%] flex flex-col gap-2 items-center">
            <!-- la zone de saisie de commentaire -->
            @auth()
            <div class="space-y-8 w-full" > 
                <form action="{{ route('pcomm')}}" method="POST">
                @csrf
                <div class="flex h-12">
                    <input class="w-full bg-slate-100 rounded-lg px-2 text-violet-500 focus:outline-violet-200" 
                            type="text" name="comment" placeholder="Votre commentaire ..." autocomplete="off" required>
                    <input type="hidden" name="r_id" id="r_id" value="{{$myres->id}}">
                    <button type="submit" class="ml-2 w-8 flex justify-center items-center shrink-0 text-violet-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </button>
                </div>
                </form>
            </div>
            @endauth()

            <!-- la zonne d affichage des commentaires -->
            <div class=" w-full space-y-2 overflow-y-auto max-h-screen ">
                @forelse($myres->commentaires as $index => $row)
                    @if ($row->isactif === true)
                        <div class="flex bg-slate-50 p-2 rounded-md">                       
                            <div class="ml-2 flex flex-col">
                                <div class="flex flex-col">
                                    <p class="text-slate-900 text-sm">{{ $row->user->name }}</p>
                                    <p class="mt-2 text-xs text-slate-400" >{{ $row->created_at }}</p>
                                </div>
                                <p class="mt-4 text-slate-800 text-xs "> {{ Str::limit($row->corps, 200) }} </p>
                            </div>
                        </div>
                    @endif
                @empty <p class="text-violet-500 text-justify"> Aucun commentaire, vous serez le premier !!</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection