<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('layouts.template.head')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            @include('layouts.template.header')
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

                @include('layouts.template.sidebar')
            </div>
            <div id="layoutSidenav_content">


                <main>
                    {{ $slot }}
                </main>


                <footer class="py-4 bg-light mt-auto">
                    @include('layouts.template.footer')
                </footer>
            </div>
        </div>


        @stack('scripts')
        

        
    </body>
</html>
