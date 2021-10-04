@extends('layouts.dashboard')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
    <span>Orden #{{ $order->id }}  </span>
    <div class='flex flex-col text-right'>
        <span>${{ number_format($order->total) }}</span>
        <span class='text-sm text-green-600'>${{ number_format($order->profit) }}</span>
    </div>
</h2>
@endsection


@section('content')

<div class="py-8">
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class='flex justify-end mb-2'>
            <a href="{{ route('orders.items.create',$order) }}" class='bg-green-400 hover:bg-green-700 text-white rounded px-2 py-2'>Agregar producto</a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class=" bg-white border-b border-gray-200">
                
                
                <div class="overflow-x-auto">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Producto</th>
                                <th class="py-3 px-6 text-left">Total</th>
                                <th class="py-3 px-6 text-left">Cliente</th>
                                <th class="py-3 px-6 text-center">Credito</th>
                              
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($order->items as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img src="{{ $item->thumb }}" class="w-10">
                                            </div>
                                            <span class="font-medium">{{ $item->name }}</span>
                                        </div>
                                    </td>
                                    <td  class="py-3 px-6 flex flex-col justify-center">
                                        <strong>${{ number_format($item->price) }}</strong>
                                        @if ($item->attempts)
                                        <span class='text-sm text-green-600'>${{ number_format($item->attempts) }}</span>
                                        @endif
                                       
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $item->user->name }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        
                                        @if ($item->credit)
                                            <div class='flex flex-col'>
                                                <span>Si</span>
                                                <span class='text-gray-400'>${{ number_format(($item->attempts/2) + ($item->price/2)) }}</span>
                                            </div>

                                        @else
                                            <span class="bg-purple-200 text-indigo-600 py-1 px-3 rounded-full text-xs">No</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            {{-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div> --}}
                                            <form action="{{ route('orders.items.destroy', [$order, $item]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Realmente desea eliminar este elemento?')" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
</div>
    
@endsection

