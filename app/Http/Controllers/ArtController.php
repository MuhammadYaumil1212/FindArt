<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\ArtInterestedJob;
use App\Models\City;
use App\Models\JobVacancy;
use App\Models\Provincy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class ArtController extends Controller
{
    // 0 = pending
    // 1 = ditolak
    // 2 = diterima
    // 3 = sudah berhenti

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobs = JobVacancy::join('art_finder','art_finder.id_finder','=','art_finder_id');
        if($request->search){
            $jobs->where('job_payment','like','%'.$request->search.'%')
            ->orWhere('full_name','like','%'.$request->search.'%')
            ->orWhere('job_description','like','%'.$request->search.'%');
        }
        return view('art.dashboard',['jobs' => $jobs->get()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function show($id)
    {
        $apply = JobVacancy::join('art_finder','art_finder.id_finder','=','art_finder_id')
        ->where('job_vacancy.id_job','=',$id)
        ->first();
        $userId = Art::where('art.user_id','=',Auth::id())->first();
        return view('art.detailLowongan',compact('apply','userId'));
    }

    public function apply(Request $request,$id){
        $submit = ArtInterestedJob::create([
            'art_id' => $request->art_id,
            'job_vacancy_id' => $id,
            'interested_job_status' => 0
        ]);
        if($submit){
            return redirect(route('art.daftarPekerjaan'))->with('success','Anda berhasil Melamar, silahkan Mengecek status penerimaan anda');
        }
        return redirect(route('admin.daftarPekerjaan'))->with('error','Error input data');
    }

    public function daftarPekerjaan(){
        $userId = Art::where('art.user_id','=',Auth::id())->first();
        $interestJob = ArtInterestedJob::join('job_vacancy','job_vacancy.id_job','=','job_vacancy_id')
        ->join('art','art.id','=','art_id')
        ->join('art_finder','art_finder.id_finder','=','job_vacancy.art_finder_id')
        ->join('users','users.id','=','art_finder.user_id')
        ->where('art_id','=',$userId->id)
        ->get();
        return view('art.daftarPekerjaan',compact('interestJob'));
    }
}
