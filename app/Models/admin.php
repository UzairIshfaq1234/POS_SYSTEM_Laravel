<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillable = ['Name','Username','Email','Password','Status'];

    use HasFactory;
}
