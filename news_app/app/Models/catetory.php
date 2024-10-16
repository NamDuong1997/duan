<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catetory extends Model
{
    use HasFactory;
    protected $table = 'catetory';
    protected $fillable = [
        'name',
        'description',
    ]; 
}



