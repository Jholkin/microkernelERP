<?php

namespace Modules\Sales\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sales\Entities\Sale;
use Modules\Customer\Entities\Customer;
use Modules\Products\Entities\Product;
use App\Models\Plugin;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $plugins = Plugin::all();
        $sales = Sale::all();
        return view('sales::index', ['sales' => $sales, "plugins" => $plugins]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $plugins = Plugin::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('sales::create', ["products" => $products, "customers" => $customers, "plugins" => $plugins]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $newSale = Sale::create([
            'customer_id' => $request->customer,
            'fecha' => $request->fecha
        ]);
        // dd($newSale);

        $dataForProductSale = [
            'sale_id' => $newSale->id,
            'product_id' => $request->product,
            'amount' => $request->amount,
            'price' => $request->price
        ];

        $product = Product::findOrFail($request->product);
        $product->stock = $product->stock - $request->amount;

        $product->save();

        $newSale->products()->attach($newSale->id, $dataForProductSale);
        return redirect()->route('sales.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('sales::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $plugins = Plugin::all();
        $sale = Sale::findOrFail($id);
        return view('sales::edit', ['plugins' => $plugins, 'sale' => $sale]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $product = Product::where('id',$request->product_id)->get();
        $dataForProductSale = [
            'sale_id' => $sale->id,
            'product_id' => $product[0]->id,
            'amount' => $request->amount,
            'price' => $request->price
        ];

        $sale->products()->updateExistingPivot($sale->id, $dataForProductSale);
        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index');
    }
}
