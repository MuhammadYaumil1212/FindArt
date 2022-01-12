<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Provincy extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'provinces';

    public function Province() :BelongsTo{
        return $this->belongsTo(Provincy::class);
    }
}
