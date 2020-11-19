<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Products\Entities\Product;
use App\Models\Plugin;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $plugins = Plugin::all();
        $products = Product::all();
        return view('products::index', ['products' => $products, "plugins" => $plugins]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $plugins = Plugin::all();
        return view('products::create', ["plugins" => $plugins]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('products::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $plugins = Plugin::all();
        $product = Product::findOrFail($id);
        return view('products::edit', ['product' => $product, "plugins" => $plugins]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $productTemp = $request->all();

        $product->name = $productTemp['name'];
        $product->brand = $productTemp['brand'];
        $product->unit_price = $productTemp['unit_price'];
        $product->stock = $productTemp['stock'];
        $product->provider = $productTemp['provider'];

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
