<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Camps;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Checkout\Store;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Camps $camps, Request $request)
    {
        if ($camps->isRegistered) {
            $request->session()->flash('error', "You already registered on {$camps->title} camp.");
            return redirect(route('dashboard'));
        };
        return view(
            'checkout.create',
            [
                'camps' => $camps
            ]
        );
    }

    public function success()
    {
        return view('checkout.success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request, Camps $camps)
    {
        return $request->all();

        // cek variable and value
        // return $camps;
        // return $request->all();

        // mapping request data

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camps->id;

        // Update user data

        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        // create checkout

        $checkout = Checkout::create($data);

        return redirect(route('checkout.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}