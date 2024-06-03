<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('F j, Y');
    }

    public function category() {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }

}
