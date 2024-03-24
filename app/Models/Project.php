<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'is_published', 'slug'];

    public function getFormatedDate($date, $format = 'd-m-y')
    {
        return Carbon::create($this->date)->format($format);
    }

    public function printImage()
    {
        return asset('storage/' . $this->image);
    }
}
