<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;
use App\Models\Plugin;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $plugins = Plugin::all();
        $customers = Customer::all();
        return view('customer::index', ['customers' => $customers, "plugins" => $plugins]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Customer::create($request->all());
        return redirect()->route('customer.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer::edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customerTemp = $request->all();

        $customer->name = $customerTemp['name'];
        $customer->lastname = $customerTemp['lastname'];
        $customer->email = $customerTemp['email'];
        $customer->phone = $customerTemp['phone'];
        $customer->birthday = $customerTemp['birthday'];
        $customer->address = $customerTemp['address'];

        $customer->save();

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
