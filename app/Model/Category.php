<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'category';
    protected $primaryKey= 'cate_id';
    public $timestamps = false;
    protected $guarded = [];



}
