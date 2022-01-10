<?php

namespace App\Http\Controllers;

use App\Http\Requests\LowonganRequest;
use App\Models\ArtFinder;
use App\Models\JobVacancy;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
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
        $paginationJob = JobVacancy::join('art_finder','art_finder.id', '=','art_finder_id')
        ->where('art_finder.user_id', '=', Auth::id())->paginate(3);
        return view('admin.dashboard',compact('paginationJob'));
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
    public function store(Request $request)
    { 

        $request->validate([
            'photo_url' => 'required|image|mimes:png,jpg,jpeg|max:5000|dimensions:width=1280,height=720',
            'job_payment' => 'required|numeric|min:500000|max:1000000000',
            'job_due_date' => 'required|date',
            'job_description' => 'required|max:10000|min:100'
        ]);
        $userId =  ArtFinder::where('user_id','=',Auth::id())->get('id');
        foreach ($userId as $key) {  
            $dateFormat = Carbon::parse($request->job_due_date)->format('Y-m-d');
            if($request->hasfile('photo_url')){
                $file = $request->file('photo_url');
                $extention = $file->getClientOriginalExtension();
                $filename = date('d-m-Y').'.'.$extention;
                $file->move('uploads/job/',$filename);
                $photo = $request->photo_url = $filename;
            }
            JobVacancy::create([    
                'art_finder_id' => $key->id,
                'is_visible' => 1,
                'photo_url' => $photo,
                'job_payment' => $request->job_payment,
                'job_due_date' => $dateFormat,
                'job_description' => $request->job_description
            ]);
        }
        return redirect(route('admin.dashboard'))->with('success','Gambar berhasil di upload, data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobVacancy = JobVacancy::where('id_job','=',$id)->join('art_finder','art_finder.id', '=','art_finder_id')->first();
        return view('admin.detail',compact('jobVacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobVacancy = JobVacancy::where('id_job','=',$id)->first();
        return view('admin.edit',compact('jobVacancy',compact('jobVacancy')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_job)
    {
        $request->validate([
            'job_payment' => 'required|numeric|min:500000|max:1000000000',
            'job_due_date' => 'required|date',
            'job_description' => 'required|max:10000|min:100',
        ]);
       $job = JobVacancy::where('id_job',$id_job)->update([
            'job_payment' => $request->job_payment,
            'job_due_date' => $request->job_due_date,
            'job_description'=>$request->job_description,
            'is_visible' => $request->is_visible
        ]);
        if($job){
            return redirect(route('admin.dashboard'))->with('success','Gambar berhasil di upload, data berhasil di tambahkan');
        }
        return redirect(route('admin.dashboard'))->with('error','Error input data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_job)
    {
            JobVacancy::where('id_job',$id_job)->delete();
            return redirect(route('admin.dashboard'))->with('error', 'Job Deleted!');
    }
}
