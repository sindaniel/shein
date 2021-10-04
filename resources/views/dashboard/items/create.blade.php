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
                
                {{ Aire::open()->route('orders.items.create', $order) }}
                  
                    {{ Aire::input('url', 'Url de producto')->value($url) }}
                    {{ Aire::submit('Consultar') }}
                        
                {{ Aire::close() }}


            </div>
        </div>
    </div>

    @if ($product)
        
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
       
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class=" bg-white border-b border-gray-200 p-6">
                
               {{-- <div class='flex justify-between'>
                    <h1 class='text-2xl font-bold'>{{ $product['name'] }}</h1>

                    <h2 class='text-xl'>{{ $product['price'] }}</h2>
               </div> --}}

               <div class='flex items-center justify-center'>
                <img src="{{ $product['thumb'] }}" alt="">
               </div>

              

               {{ Aire::open()->route('orders.items.store', $order) }}
                  
                    {{ Aire::input('name', 'Nombre del producto')->value( $product['name']) }}
                    {{ Aire::input('price', 'Precio')->readonly()->value( $product['price'])->addClass('bg-gray-100') }}
                    {{ Aire::select($sizes, 'size', 'Talla'); }}
                    {{ Aire::select($clients, 'user_id', 'Cliente'); }}    
                    {{ Aire::select(['No', 'Si'], 'credit', 'Crédito')->value(1); }}
                    {{ Aire::hidden('url')->value($url) }}
                    {{ Aire::hidden('thumb')->value($product['thumb']) }}
                    {{ Aire::submit('Consultar') }}
                        
                {{ Aire::close() }}


            </div>
        </div>
    </div>

    @endif



    {{-- {{ $product }} --}}




</div>
    
@endsection

