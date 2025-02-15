<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\TruckCompany;

class ProfileController extends Controller
{
    /**
     * Display the user's profile list.
     */
    public function index(): View
    {
        $users = User::where('role','!=','admin')->with('truckCompany')->get();
        return view('admin.userlist', [
            'users' => $users,
        ]);
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // dd($request->user());
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    
    /**
     * Display the company user's profile form.
     */
    public function companyuseredit(string $id): View
    {
        $user = User::find($id);
        $truckcompany = TruckCompany::all();
       
        return view('profile.company-user-edit', compact('user','truckcompany'));

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //  dd($request);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

        
    /**
     * Update the user's profile information.
     */
    public function companyuserupdate(Request $request): RedirectResponse
    {
        // dd($request);
        $id = $request->input('id');
        $item = User::find($id);
        $item->name = $request->input('name');
        // $item->email = $request->input('email');
        $item->companyid = $request->input('companyId');
        $item->save();
        return redirect('/admin/users')->with('success', 'User updated successfully');
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
