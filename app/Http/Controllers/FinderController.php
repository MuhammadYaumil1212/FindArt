<?php

namespace App\Http\Controllers;

use App\Http\Requests\LowonganRequest;
use App\Models\Art;
use App\Models\ArtAcceptedJob;
use App\Models\ArtFinder;
use App\Models\ArtInterestedJob;
use App\Models\ArtRating;
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
     
        // 0 = pending
        // 1 = ditolak
        // 2 = diterima
        // 3 = sudah berhenti
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginationJob = JobVacancy::join('art_finder','art_finder.id_finder', '=','art_finder_id')
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
        $userId =  ArtFinder::where('user_id','=',Auth::id())->get('id_finder');
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
                'art_finder_id' => $key->id_finder,
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
        $jobVacancy = JobVacancy::where('id_job','=',$id)->join('art_finder','art_finder.id_finder', '=','art_finder_id')->first();
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

    public function listArt(){
        $listSeeker = ArtAcceptedJob::join('art_finder','art_finder.id_finder', '=','art_accepted_job.art_finder_id')
        ->join('job_vacancy','job_vacancy.id_job','=','art_accepted_job.job_vacancy_id')
        ->join('art','art.id','=','art_accepted_job.art_id')
        ->where('art_finder.user_id','=',Auth::id())
        ->get();
        return view('admin.daftarArt',compact('listSeeker'));
    }

    public function updateJob(Request $request, $id){
       $firePeople = ArtAcceptedJob::where('id_accepted',$id)->update([
           'accepted_job_status' => $request->accepted_job_status
        ]);
        $addRate = ArtRating::create([
            'art_id' => $request->art_id,
            'art_finder_id' => $request->art_finder_id,
            'rating' => 0
        ]);
        if($firePeople && $addRate){
            return redirect(route('admin.addRating'))->with('error','Berhasil Diberhentikan, silahkan menambahkan rating 1-10 untuk ART ini');
        }   
        return redirect(route('admin.daftarArt'))->with('error','Error! Periksa kendala anda');
    }

    public function interested(){
        $interested = ArtInterestedJob::join('job_vacancy','job_vacancy.id_job','=','art_interested_job.job_vacancy_id')
        ->join('art_finder','art_finder.id_finder','=','job_vacancy.art_finder_id')
        ->join('art','art.id','=','art_interested_job.art_id')
        ->where('art_finder.user_id','=',Auth::id())
        ->get();
        return view('admin.ArtInterestedList',compact('interested'));
    }

    public function hireJob(Request $request,$id){
        $addToAccepted = ArtAcceptedJob::where('id_accepted',$id)->Create([
            'art_id' => $request->art_id,
            'art_finder_id' => $request->art_finder_id,
            'job_vacancy_id' => $request->job_vacancy_id,
            'accepted_job_status'=>$request->accepted_job_status
        ]);
        $updateInterested = ArtInterestedJob::where('id_interested',$id)->update([
            'interested_job_status' => $request->accepted_job_status
        ]);
        if($addToAccepted && $updateInterested){
            return redirect(route('admin.interested'))->with('success','Lamaran Diterima!');
        }   
        return redirect(route('admin.interested'))->with('error','Error! Periksa kendala anda');
    }
    public function rejectJob(Request $request,$id){
        $reject = ArtInterestedJob::where('id_interested',$id)->update([
            'art_id' => $request->art_id,
            'job_vacancy_id' => $request->job_vacancy_id,
            'interested_job_status' => $request->interested_job_status
        ]);
        if($reject){
            return redirect(route('admin.interested'))->with('error','Lamaran Ditolak!');
        }   
        return redirect(route('admin.interested'))->with('error','Error! Periksa kendala anda');
    }
    // Hanya nampilin view saja
    public function rating(){
        $rating = ArtRating::join('art','art.id', '=','art_rating.art_id')
        ->join('art_finder','art_finder.id_finder','=','art_rating.art_finder_id')
        ->where('art_finder.user_id','=',Auth::id())->get();
        return view('admin.rating',compact('rating'));
    }
    //menambahkan rating
    public function giveRate(){
        $addRating = ArtRating::join('art','art.id', '=','art_rating.art_id')
        ->join('art_finder','art_finder.id_finder','=','art_rating.art_finder_id')
        ->where('art_finder.user_id','=',Auth::id())->get();
        return view('admin.addRating',compact('addRating'));
    }
    public function storeRating(Request $request, $id){
        $request->validate([
            'rating' => 'required|numeric|min:1|max:10',
        ]);
        $giveRating = ArtRating::where('id_rating',$id)->update([
            'art_id' => $request->art_id,
            'art_finder_id' => $request->art_finder_id,
            'rating' => $request->rating
        ]);
        if($giveRating){
            return redirect(route('admin.addRating'))->with('success','Rating berhasil ditambahkan!');
        }   
        return redirect(route('admin.addRating'))->with('error','Error! Periksa kendala anda');
    }
}
