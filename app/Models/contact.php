<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{

    protected $fillable = ['name','contact'];  //campos que serão inseridos pelo usuário
    protected $guarded = ['id', 'created_at', 'update_at']; //inserções
    protected $table = 'contact';

}
