@extends('layouts.dashboard')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Nuevo cliente
</h2>
@endsection


@section('content')

<div class="py-8">
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class=" bg-white border-b border-gray-200 p-6">
                
                {{ Aire::open()->route('clients.store') }}
                  
                    {{ Aire::input('name', 'Nombre')}}
                    {{ Aire::input('email', 'Email')}}
                    {{ Aire::input('phone', 'Celular')}}
                    {{ Aire::submit('Crear cliente') }}
                        
                {{ Aire::close() }}


            </div>
        </div>
    </div>
</div>
    
@endsection

