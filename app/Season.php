<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $primaryKey = "season_ID";
    protected $table = "season";
    protected $fillable = [
        'season_Number',
        'season_Year',
        'season_Image',
        'season_CreatedAt',
        'seeason_UpdatedAt',
    ];
    public function video()
    {
        return $this->belongsTo('App\Video', 'video_ID', 'video_ID');
    }
    public function chapters()
    {
        return $this->hasMany('App\Chapter', 'chapter_ID', 'chapter_ID');
    }
    public function people()
    {
        return $this->belongsToMany('App\Person', 'seasonPerson', 'season_ID', 'person_ID');
    }
}
