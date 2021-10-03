@extends('layouts.site')


@section('content')
    
    <div style="background-image:url(img/bg.png)" class="h-screen w-screen bg-red-100 bg-cover bg-center flex flex-col items-center justify-center px-5">
        <div class='flex flex-col space-y-2 items-center text-center'>
            <h1 class='text-5xl font-bold text-dark'>Ingresa tu link de Shein</h1>
            <p class='text-muted text-lg'>Date prisa hasta agotar existencias.</p>
        </div>

        <form class='flex w-full lg:w-6/12 xl:w-4/12 mt-5 relative' @submit.prevent="submitData" >
            <input required x-model="formData.link" type="search" placeholder="Ingresa tu link de Shein aquí" class='text-sm py-4 pl-4 pr-32 w-full border-0 shadow rounded focus:outline-none focus:ring-0  focus:border-transparent'>
            <button type="submit" class='absolute right-0 top-0 bg-yellow h-full text-dark hover:text-brown rounded-r   px-4 text-sm font-bold flex space-x-1 items-center'>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                <span>Buscar</span>
            </button>

           
        </form>
    </div>



    
    <div class="absolute top-0 left-0 w-full h-full  items-center justify-center hidden" style="background-color: rgba(0,0,0,.5);" :class="{ 'flex': productModal, 'hidden': !productModal  }">
        <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="productModal = false">
          <h2 class="text-2xl">Product Modal</h2>
          <div>
            <div x-show="loading">Cargando</div>
          </div>
        </div>
    </div>
    
@endsection