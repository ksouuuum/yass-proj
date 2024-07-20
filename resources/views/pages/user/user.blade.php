   @extends('layouts.default')
   @section('content')
         <div class="container">
         
               <ul class="ml-2 flex flex-col gap-6 text-gray-500 w-[800px]">
                     <h2 class="text-3xl font-bold" > Liste des utilisateurs du site web   </h2>
                     <div class="text-start mb-2"> <button href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" disabled>Ajouter un utilisateur</button>  </div>
                     @forelse($users as $index => $row)                     
                              <ul class="ml-2 pt-2 flex flex-row border-b-0 gap-6 justify-between  items-center" > 
                                 <li  > {{ $index + 1 }} </li>
                                 <li  > {{ $row->name }} </li>
                                 <li > {{ $row->email }}</li>     
                                 <li > {{ $row->groupe->lib }}</li>                         
                                 <li > <button href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded p-2" disabled>Editer</button></li>
                                 <li > <button href="" class="bg-red-200 hover:bg-red-300 text-white font-bold  rounded p-2">Desactiver le compte</button></li>

                              </ul>
                     @empty <span> No Users Found</span>
                     @endforelse
               </ul>
         </div>
 
   @endsection