<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Order $order)
    {
        $product = null;
        $url = null;
        $sizes = null;
        $clients = null;

        if($request->has('url')){


            $url = env('URL_SERVICE');
            $path = $url.'/get_product';

            $response = Http::asForm()->post($path, [
                'url' => $request->url,
            ]);
            $url = $request->url;
            $product = $response->json();
            //$product =  json_decode($response->json());
            $sizes = collect($product['sizes']);

            $sizes = $sizes->pluck('attr_value', 'attr_value');

            $clients = User::doesntHave('roles')->get()->pluck('name', 'id');

            #$product['price'] = filter_var($product['price'], FILTER_SANITIZE_NUMBER_INT);

        }

        $context = compact('order', 'product', 'url', 'sizes', 'clients');
        return view('dashboard.items.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {

        $request['price'] = filter_var($request['price'], FILTER_SANITIZE_NUMBER_INT);

        if($request->credit){
            $attemps = $request->price * 0.05;
            $request['attemps'] = $attemps;
        }

        $order->items()->create($request->all());

        $order->update(['total'=>$order->items->sum('price')]);

        return redirect()->route('orders.show', $order);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Item $item)
    {
        $item->delete();
        $order->update(['total'=>$order->items->sum('price')]);
        return back()->with('Elemento eliminado');
    }
}
