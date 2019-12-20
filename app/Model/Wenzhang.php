<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wenzhang extends Model
{
    protected $table = 'wenzhang';
    protected $primaryKey= 'wen_id';
    public $timestamps = false;
    protected $guarded = [];

}
