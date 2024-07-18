<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @include('includes.head')
    </head>
<body class="md:text-lg text-sm"> 
    
    <div class="mx-auto max-w-7xl  py-4 px-4 sm:px-6 lg:px-8 ">
       <header class="">
           @include('includes.header')
       </header>
       {{-- zone informations et alertes --}}
                @if (session('success'))
                <div class="pt-2  " x-show="info" x-data="{info:true}"> 
                    <div class="relative  bg-green-100 border-l-4 border border-green-500 text-green-500 p-4" x-transition.duration.500ms>
                        <p class="font-bold">Information </p>
                        <p>{{ session('success')}}</p>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" x-on:click="info=false" >
                                <svg class="fill-current h-6 w-6 text-green-500" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                </div>
                @endif
                @if (session('errors'))
                <div class="pt-2  "   x-show="alerte" x-data="{alerte:true}"> 
                    <div class="relative bg-red-100 border-l-4 border-red-500 text-red-500 p-4" x-transition.duration.500ms>
                        <p class="font-bold">Alerte </p>
                        <p>{{ session('errors')->all()[0]}}</p>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" x-on:click="alerte=false" >
                                <svg class="fill-current h-6 w-6 text-red-500" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                </div>
                @endif 
        {{-- fin zone informations et alertes --}}
        
       {{-- zone contenu principal  --}}
       <div class="mt-10 md:mt-12 lg:mt-16">
               @yield('content')
       </div>
       {{-- fin zone contenu principal  --}}

       <footer class="row"> @include('includes.footer') </footer>
    </div>

    
</body>
</html>