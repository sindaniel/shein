<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased" x-data="component()">
        <header class="flex shadow-sm fixed w-full justify-between px-5 py-3 items-center">
            <div>
                <img src="{{asset('img/logo-v.png')}}" alt="">
            </div>
            <div class='flex items-center space-x-2'>
                <a href="" class='font-bold flex items-center text-sm'>
                    <span>Necesitas ayuda?</span>
                </a>
                <button class='bg-yellow text-dark px-3 py-2 block rounded font-bold  ' @click="loginModal = true">Ingresar</button>
            </div>
        </header>   
        @yield('content')


        <footer class="flex shadow-sm fixed bottom-0 w-full justify-end px-5 py-3 items-center z">
            <a class=' text-white px-3 py-2 block rounded font-bold shadow '>Nosotros</a>
        </footer>   


        <div class="absolute top-0 left-0 w-full h-full  items-center justify-center hidden" style="background-color: rgba(0,0,0,.5);" :class="{ 'flex': loginModal, 'hidden': !loginModal  }">
            <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="loginModal = false">
              <h2 class="text-2xl">Login</h2>
              
            </div>
        </div>



          


    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function component() {
            
                return {
                    formData: {
                        link: '13',    
                    },
                    message: '',
                    loginModal: false,
                    productModal: false,
                    loading: false,
                    
                    submitData() {
                        console.log(this.productModal)
                        this.productModal = true
                        this.loading = true
                        console.log(this.productModal)
                        // this.message = ''

                        // fetch('/contact', {
                        //     method: 'POST',
                        //     headers: { 'Content-Type': 'application/json' },
                        //     body: JSON.stringify(this.formData)
                        // })
                        // .then(() => {
                        //     this.message = 'Form sucessfully submitted!'
                        // })
                        // .catch(() => {
                        //     this.message = 'Ooops! Something went wrong!'
                        // })
                    }
                }
            }
    </script>
</html>
