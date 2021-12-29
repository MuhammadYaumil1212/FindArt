<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Art;
use App\Models\ArtFinder;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $users = DB::select("SELECT `users`.`id`, `users`.`username`, `users`.`password`, `users`.`contact_number`, `users`.`photo_id`, `users`.`address`, `users`.`role`, `users`.`province_id`, `users`.`city_id`, `users`.`district_id`, `users`.`sub_district_id`, `photos`.`photo_url` AS photo
        FROM `users`
        JOIN `photos` ON `users`.`photo_id` = `photos`.`id`
        WHERE `username` = '$request[username]'"); 

        // return $users[0]->role;

        if (Auth::attempt($credentials)) {
            if ($users[0]->role == 0) {
                $request->session()->regenerate();
                session(['id', $users[0]->id,
                        ['contact_number', $users[0]->contact_number],
                        ['photo_id', $users[0]->photo_id],
                        ['address', $users[0]->id],
                        ['role', $users[0]->role],
                        ['province_id', $users[0]->province_id],
                        ['city_id', $users[0]->city_id],
                        ['district_id', $users[0]->district_id],
                        ['sub_district_id', $users[0]->sub_district_id],
                        ['photo', $users[0]->photo],
                ]);
                $request->session()->flash('success','Login sebagai finder.');
                return redirect()->intended(route('admin.dashboard'));
            } else if ($users[0]->role == 1) {
                $userId = $users[0]->id;
                $artData = DB::select("SELECT `job_status`, `art_description` FROM `art`WHERE `art`.`user_id` = '$userId'");
                $jobStatus = $artData[0]->job_status;
                $artDescription = $artData[0]->art_description;
                $request->session()->regenerate();
                session(['contact_number', $users[0]->contact_number],
                        ['photo_id', $users[0]->photo_id],
                        ['address', $users[0]->id],
                        ['role', $users[0]->role],
                        ['province_id', $users[0]->province_id],
                        ['city_id', $users[0]->city_id],
                        ['district_id', $users[0]->district_id],
                        ['sub_district_id', $users[0]->sub_district_id],
                        ['photo', $users[0]->photo],
                        ['job_status', $jobStatus],
                        ['art_description', $artDescription],
                );
                $request->session()->flash('success','Login sebagai ART.');
                return redirect()->intended(route('art.dashboard'));
            } else {
                $request->session()->flash('error','Error Gagal Mendaftar');
                return redirect(route('user.login'));
            }
            
        }
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
