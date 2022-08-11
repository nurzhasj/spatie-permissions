<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $company_id = Company::where('user_id', $user_id)->first()->id;

        $clients = Client::where('company_id', $company_id)->get();

        return view('company', compact([
            'clients'
        ]));
    }

    public function create(int $id)
    {
        $company = Company::findOrFail($id);
        return view('clients/add-new-client', compact(['company']));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'company_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'number' => 'required|string',
                'email' => 'required|string',
                'balance' => 'required|integer',
                'password' => 'required|string',
            ]
        );

        $user = User::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $company_id = (int) $request->input('company_id');
        $user_id = $user->id;

        Client::create(
            [
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'balance' => $request->input('balance'),
                'password' => $request->input('password'),
                'number' => $request->input('number'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user_id,
                'company_id' => $company_id,
            ]
        );

        $user->assignRole('client');

        return redirect()->back()->with('status', 'Client is created!');
    }
}
