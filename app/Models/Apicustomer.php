<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apicustomer extends Model
{
    use HasFactory;
    protected $table = "apicustomer";
    protected $fillable = [
        'json', 
        'client_id',
    ];  
}
