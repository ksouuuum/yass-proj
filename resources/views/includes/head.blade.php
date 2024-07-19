
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- <script  src="https://cdn.tailwindcss.com"></script> -->
         <!-- tailwindcss file was added to public folder -->
        <script src="{{secure_asset ('tailwindcss.js') }}"></script>

        <!-- Alpinejs file was added to public folder -->
        <script defer src="{{secure_asset ('alpinejs.js') }}"></script>

        <!-- Alpinejs file was added to public folder -->
        <style>
                body {
                        font-family: 'Figtree';
                       }
        </style>
