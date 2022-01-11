<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtAcceptedJob extends Model
{
    use HasFactory;
    protected $fillable = ['art_finder_id','job_vacancy_id','art_id','accepted_job_status'];
    protected $table = 'art_accepted_job';
}
