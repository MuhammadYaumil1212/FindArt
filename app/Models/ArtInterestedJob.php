<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtInterestedJob extends Model
{
    use HasFactory;
    protected $fillable = ['art_id','job_vacancy_id','interested_job_status'];
    protected $table = 'art_interested_job';
}
