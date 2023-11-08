<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class plantlistadmin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'name',
        'description',
        'image_url'
    ];
}
