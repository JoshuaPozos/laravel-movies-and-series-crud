<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $primaryKey = "chapter_ID";
    protected $table = "chapter";
    protected $fillable = [
        'chapter_Number',
        'chapter_Image',
        'chapter_Description',
        'chapter_CreatedAt',
        'chaptre_UpdatedAt',
    ];

    public function season()
    {
        return $this->belongsTo('App\Season', 'season_ID', 'season_ID');
    }
}
