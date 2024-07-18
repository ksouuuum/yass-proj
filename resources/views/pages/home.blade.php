@extends('layouts.default')
    @section('content')
       i am the home page

<h2 class="mb-2 text-lg font-semibold text-gray-900">Password requirements:</h2>
<ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside">
    <li>
        At least 10 characters (and up to 100 characters)
    </li>
    <li>
        At least one lowercase character
    </li>
    <li>
        Inclusion of at least one special character, e.g., ! @ # ?
    </li>
</ul>


    @endsection