<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_history extends Model
{
    use HasFactory;
    protected $table = 'view_history';

    protected $fillable = [
        'id_post',
        'id_user',
        'ip_address',
    ]; 
}
