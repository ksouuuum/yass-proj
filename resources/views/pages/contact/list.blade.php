<!-- list of contacts  -->
@extends('layouts.default')
@section('content')
<div id="" class="mt-8 " 
     x-data="{  init : function() { this.sorting= '{{ Request::get('sort', '') }}'.split(','); 
                                    this.name = ['', 'nom', '-nom']; 
                                    this.date = ['', 'created_at', '-created_at'];  
                                    this.traite = ['', 'traitee', '-traitee'];                                   
                                    this.sname= (this.sorting.includes('-'+'nom'))? 2 :((this.sorting.includes('nom'))?1:0);
                                    this.sdate=(this.sorting.includes('-'+'created_at'))? 2 :((this.sorting.includes('created_at'))?1:0);
                                    this.straite=(this.sorting.includes('-'+'traitee'))? 2 :((this.sorting.includes('traitee'))?1:0); 
                                    this.sujet='{{ Request::get('sujet', '') }}';
                                }, 
                prefresh : function(strSujet) {console.log('{{route('lcontact')}}' + '?sujet=' + strSujet + ((this.sortstr()=='')?'':'&'+this.sortstr()) ); 
                                               window.location.href =  '{{route('lcontact')}}' + '?sujet=' + strSujet + ((this.sortstr()=='')?'':'&'+this.sortstr()) ;
                                },                
                sortstr : function () { tmp = []; 
                                    if (this.name[this.sname] != '') tmp.push(this.name[this.sname]);
                                    if (this.date[this.sdate] != '') tmp.push(this.date[this.sdate]);
                                    if (this.traite[this.straite] != '') tmp.push(this.traite[this.straite]);
                                    if (tmp.length == 0) return '';
                                    return 'sort=' + tmp.toString() ;                
                                },
            }"
>

    <div class="relative overflow-x-auto flex flex-col ">
        <h2 class="text-violet-500 text-xl md:text-2xl font-bold px-2"> Liste des demandes faites sur le site </h2>
        {{ $contacts->links() }}
        <table class="w-full text-sm text-left text-violet-500 ">            
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        &nbsp;
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex flex-row items-center gap-1">
                            <a href="#" x-on:click="sname=(sname+1)%3" class="cursor-pointer"> Nom</a> 
                            <div class=" flex flex-col gap-1" >
                                <!-- chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  fill="currentColor" class="h-3 w-3 text-red-500" x-show="sname== 1">
                                    <path fill-rule="evenodd" d="M11.47 7.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z" 
                                        clip-rule="evenodd" />
                                </svg>
                                <!-- chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"  fill="currentColor" class="h-3 w-3 text-red-500" x-show="sname== 2">
                                    <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" 
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        mobile 
                    </th>
                    <th scope="col" class="px-6 py-3" >
                                <select name="sujet" id="sujet" 
                                    class="px-2 py-1  bg-violet-50 opacity-60 border border-violet-200 rounded-md focus:outline-none focus:border-violet-500 hover:border-violet-400" 
                                    x-on:change="prefresh($event.target.value)" >
                                        <option value="" class="" disabled >Filtre par sujet</option>
                                        <option value="" class=""  @selected(Request::get('sujet') == '')> Tous les contacts </option>
                                        <option value="compte" @selected(Request::get('sujet') == 'compte') > Besoin d'un compte </option>
                                        <option value="publication" @selected(Request::get('sujet') == 'publication') > Signaler une publication </option>
                                        <option value="commentaire" @selected(Request::get('sujet') == 'commentaire') > Signaler un commentaire </option>
                                        <option value="rubrique" @selected(Request::get('sujet') == 'rubrique') > Idee de rubrique </option>
                                        <option value="site" @selected(Request::get('sujet') == 'site') > Idee pour le site </option>
                                        <option value="autre" @selected(Request::get('sujet') == 'autre') > Autre </option>
                                </select> 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Message 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex flex-row items-center gap-1">
                                <a href="#" x-on:click="sdate=(sdate+1)%3" class="cursor-pointer"> Date demande </a> 
                                <div class=" flex flex-col gap-1" >
                                    <!-- chevron-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  fill="currentColor" class="h-3 w-3 text-red-500" x-show="sdate== 1">
                                        <path fill-rule="evenodd" d="M11.47 7.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z" 
                                            clip-rule="evenodd" />
                                    </svg>
                                    <!-- chevron-down -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"  fill="currentColor" class="h-3 w-3 text-red-500" x-show="sdate== 2">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" 
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                        </div>                        
                    </th>
                    <th scope="col" class="px-6 py-3">                        
                        <div class="flex flex-row items-center gap-1">
                                <a href="#" x-on:click="straite=(straite+1)%3" class="cursor-pointer"> Traitée </a> 
                                <div class=" flex flex-col gap-1" >
                                    <!-- chevron-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  fill="currentColor" class="h-3 w-3 text-red-500" x-show="straite== 1">
                                        <path fill-rule="evenodd" d="M11.47 7.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z" 
                                            clip-rule="evenodd" />
                                    </svg>
                                    <!-- chevron-down -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"  fill="currentColor" class="h-3 w-3 text-red-500" x-show="straite== 2">
                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" 
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                        </div>                           
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $index => $row)
                        <tr class="bg-white border-b cursor-pointer hover:bg-gray-50" x-on:click="window.location.href = '{{ route('mcontact', ['id' => $row->id ]) }}'">
                            <td class="px-6 py-4 ">
                                {{ $index + 1  }}
                            </td>
                            <td class="px-6 py-4 ">
                                {{ $row->prenom . ' ' . $row->nom  }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $row->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $row->mobile }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $row->sujet }}
                            </td>
                            <td class="px-6 py-3  max-w-44 truncate  " title=" {{ $row->message }} " >
                                {{ $row->message }} 
                            </td> 
                            <td class="px-6 py-4">
                                {{ $row->created_at}}
                            </td> 
                            <td class="px-6 py-4 text-center" title="{{ $row->traitement}}" >
                                @if ($row->traitee == 0 )
                                    <input type="checkbox" id="traitee" name="traitee"  class="accent-violet-500" >
                                @else
                                    {{ $row->updated_at}}
                                @endif                                
                            </td>
                        </tr>
                @empty <tr> <td colspan="4"> <span> No contacts Found</span> </td> </tr>
                @endforelse
            </tbody>
            <tfoot>                
            </tfoot>
        </table>
    </div>    

</div>

@endsection


