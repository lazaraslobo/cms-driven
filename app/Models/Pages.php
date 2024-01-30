<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $table = 'tbl_pages';
    protected $fillable = ['parent_id', 'slug', 'title', 'content'];
}
