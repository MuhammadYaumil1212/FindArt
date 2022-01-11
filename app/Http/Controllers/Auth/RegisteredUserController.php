<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\ArtFinder;
use App\Models\City;
use App\Models\District;
use App\Models\Provincy;
use App\Models\SubDistrict;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $provinces = Provincy::all();
        $cities = City::all();
        $districts = District::all();
        $sub_districts = SubDistrict::all();
        return view('user.register',compact('provinces','cities','districts','sub_districts'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'numeric','digits_between:11,13'],
            'address'=> ['required','string'],
            'province_id'=>['required'],
            'city_id' => ['required'],
            'district_id'=>['required'],
            'sub_district_id'=>['required'],
            'role'=>['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation'=>['required']
        ]);
      
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'photo_id' => 1,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'sub_district_id' => $request->sub_district_id,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
            Auth::login($user);
            if($request->role == 0){
                $artFinder = ArtFinder::create([
                    'user_id' => Auth::id(),
                    'full_name' => $request->name,
                ]);
                event(new Registered($user));
                $request->session()->flash('success','Data anda berhasil di daftarkan Sebagai pencari! ');
                return redirect(route('user.login'));
            }else if($request->role == 1){
                $art = Art::create([
                    'user_id' => Auth::id(),
                    'kontak' => $request->contact_number,
                    'art_full_name' => $request->name,
                    'art_description' => null
                ]);     
                Auth::login($user);
                event(new Registered($user));
                $request->session()->flash('success','Data anda berhasil di daftarkan sebagai ART! ');
                return redirect(route('user.login'));
            }else{
                $request->session()->flash('error','Error Gagal Mendaftar');
                return redirect(route('user.login'));
            }
        }
    }
    // return redirect(RouteServiceProvider::HOME);
