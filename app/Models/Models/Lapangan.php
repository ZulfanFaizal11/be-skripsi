<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'lapangan';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}
