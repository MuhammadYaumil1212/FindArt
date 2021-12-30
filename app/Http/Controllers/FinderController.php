<?php

namespace App\Http\Controllers;

use App\Http\Requests\LowonganRequest;
use App\Models\ArtFinder;
use App\Models\JobVacancy;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \validator;

class FinderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambahLowongan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LowonganRequest $request)
    { 
        $userId =  ArtFinder::where('user_id','=',Auth::id())->get('id');
        foreach ($userId as $key) {  
            $dateFormat = Carbon::parse($request->job_due_date)->format('Y-m-d');
            if($request->hasfile('photo_url')){
                $file = $request->file('photo_url');
                $extention = $file->getClientOriginalExtension();
                $filename = date('d-m-Y').'.'.$extention;
                $file->move(public_path('uploads/job/'),$filename);
                $photo = $request->photo_url = $filename;
            }
            $job = JobVacancy::create([
                'art_finder_id' => $key->id,
                'is_visible' => 1,
                'photo_url' => $request->photo_url,
                'job_payment' => $request->job_payment,
                'job_due_date' => $dateFormat,
                'job_description' => $request->job_description
            ]);
        }
        return $job;
        // return redirect(route('admin.dashboard'))->with('success','Gambar berhasil di upload, data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
