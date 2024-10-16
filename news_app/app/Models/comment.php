<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $fillable = [
        'content',
        'id_user',
        'id_post',
        'status',
    ]; 
}
