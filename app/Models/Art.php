<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','art_full_name','kontak','art_description','job_status'];
    protected $table = 'art';
}
