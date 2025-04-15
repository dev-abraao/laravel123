<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notes extends Model
{
    use HasFactory , HasUuids;

    protected $keytype = 'string';
    public $incrementing = false;

    protected $fillable = [
        'note',
        'user_id',
    ];
}
