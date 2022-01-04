<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobVacancy extends Model
{
    use HasFactory;
    protected $fillable = ['photo_url','is_visible','art_finder_id','job_payment','job_due_date','job_description'];
    protected $table = 'job_vacancy';
    
    public function ArtFinder() : HasOne {
        return $this->hasOne(ArtFinder::class);
    }

    public function Photo() : HasOne
    {
        return $this->hasOne(Photo::class);
    }
}
