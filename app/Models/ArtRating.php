<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtRating extends Model
{
    use HasFactory;
    protected $fillable = ['art_id','art_finder_id','rating'];
    protected $table = 'art_rating';
}
