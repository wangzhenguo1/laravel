<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'brand';
    protected $primaryKey= 'brand_id';
    public $timestamps = false;
    protected $guarded = [];



}
