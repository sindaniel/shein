@extends('layouts.dashboard')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Nueva Orden
</h2>
@endsection


@section('content')

<div class="py-8">
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class=" bg-white border-b border-gray-200 p-6">
                
                {{ Aire::open()->route('orders.store') }}
                  
                    {{ Aire::date('date', 'Fecha de orden')}}
                    {{ Aire::submit('Crear orden') }}
                        
                {{ Aire::close() }}


            </div>
        </div>
    </div>
</div>
    
@endsection

