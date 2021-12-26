<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Art;
use App\Models\ArtFinder;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.login');
    }

    public function role()
    {
        return view('user.role');
    }

    public function storeRole(Request $request)
    {
        switch($request->role){
            case 1 :
             ArtFinder::create([
                    'user_id' => Auth::id(),
                    'full_name' => Auth::user()->ArtFinder->full_name,
                ]);
            // Auth::login($artFinder);
            $request->session()->flash('success','Berhasil Mendaftar!');
            return redirect(route('finder.dashboard'));
            case 0 :
                Art::create([
                    'user_id' => Auth::id(),
                    'full_name' => Auth::user()->Art->full_name,
                    'art_description' => null
                ]);
            // Auth::login($art);
            $request->session()->flash('success','Berhasil Mendaftar!');
            return redirect(route('art.dashboard'));
            default:
            $request->session()->flash('error','Error Fetching Role');
            return redirect(route('user.role'));
        }  
    }
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
