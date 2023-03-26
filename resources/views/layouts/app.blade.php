<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <x-head-links />

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>{{ config('app.name') }}</title>

</head>

<body>

    <header>
        <x-navbar />
    </header>

    <main class="container-fluid">
        <div id="content" class="row">
            @auth('web')
                <x-sidebar />
            @endauth
            <section role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                @yield('content')
            </section>
        </div>
    </main>
    <footer class="bg-dark fixed-bottom text-white text-center">
        <div class="text-center p-3">
            © 2023 Copyright: HelpDesk
        </div>
    </footer>

</body>

</html>
