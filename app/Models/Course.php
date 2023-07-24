<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'status', 'track_id', 'link', 'description', 'slug'];
     /**
     * Get all of the course's photo.
     */
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function track()
    {
        return $this->belongsTo(Track::class);
    }

}
