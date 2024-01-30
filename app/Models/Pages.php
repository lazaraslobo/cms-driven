<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $table = 'tbl_pages';
    protected $fillable = ['parent_id', 'slug', 'title', 'content'];

    public function children()
    {
        return $this->hasMany(Pages::class, 'parent_id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Pages::class, 'parent_id')->with('parent');
    }

    protected static function booted()
    {
        static::retrieved(function ($page) {
            if ($page->parent_id) {
                $parent = Pages::find($page->parent_id);
                if ($parent) {
                    $page->slug = $parent->slug . '/' . $page->slug;
                }
            }
        });

        static::deleting(function ($page) {
            $page->children()->delete();
        });
    }
}
