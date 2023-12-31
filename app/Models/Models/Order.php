<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $guarded = [''];
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}
