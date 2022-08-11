<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('dashboard', compact([
            'companies'
        ]));
    }

    public function create(): View
    {
        return view('companies/add-new-company');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'email' => 'required|string',
                'bin' => 'required|string|max:12',
                'balance' => 'required|integer',
                'password' => 'required|string'
            ]
        );

        $user = User::create(
            [
                'name' => $request->input('title'),
                'email' => $request->input('email'),
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Company::create(
            [
                'title' => $request->input('title'),
                'user_id' => $user->id,
                'email' => $request->input('email'),
                'bin' => $request->input('bin'),
                'balance' => $request->input('balance'),
                'password' => $request->input('password'),
            ]
        );

        $user->assignRole('company');

        return redirect()->back()->with('status', 'Company is added!');
    }

    public function edit(int $id)
    {
        $company = Company::findOrFail($id);

        return view('companies/edit-company', compact([
            'company'
        ]));
    }

    public function update(int $id, Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'email' => 'required|string',
                'bin' => 'required|string|max:12',
                'balance' => 'required|integer',
                'password' => 'required|string'
            ]
        );

        $company = Company::findOrFail($id);
        $user = User::where('id', $company->user_id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->updated_at = Carbon::now();
        $user->refresh();

        $company->update(
            [
                'title' => $request->input('title'),
                'user_id' => $user->id,
                'email' => $request->input('email'),
                'bin' => $request->input('bin'),
                'balance' => $request->input('balance'),
                'password' => $request->input('password'),
            ]
        );

        return redirect()->back()->with('status', 'Company was updated!');
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        User::where('id', $company->user_id)->delete();
        $company->delete();

        return redirect()->route('dashboard')->with('status', 'Company was deleted!');
    }
}
