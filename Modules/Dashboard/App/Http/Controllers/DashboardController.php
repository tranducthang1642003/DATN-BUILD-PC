<?php

namespace Modules\Dashboard\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Auth\Entities\User;
use Illuminate\Support\Facades\Auth;
use Modules\Settings\Entities\Menu;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuItems = Menu::all();

        $users=Auth::User();
        return view('public.dashboard.dashboard',compact('users','menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update()
    {
        $user = Auth::user();
        return view('public.dashboard.updateaccount', compact('user'));
    }

    public function update_auth(Request $request)
{
    $user = Auth::user();

    // Perform validation on the request data
    // Add your validation logic here and handle any validation errors

    // Retrieve the input values from the request and update the user model
    $user->name = $request->input('name');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');

    // Save the updated user model
    $user->save();

    return redirect()->route('dashboard')->with('success', 'Account updated successfully.');
}

    public function destroy($id)
    {
        //
    }
}
