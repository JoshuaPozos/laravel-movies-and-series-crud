<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Primary Keeey
     */
    protected $primaryKey = "video_ID";

    /**
     * Define Table Name
     */
    protected $table = "video";

    /**
     * Define custom Created_At
     */
    const CREATE_AT = "video_CreatedAt";

    /**
     * Define custom Updated_At
     */
    const UPDATED_AT = "video_UpdatedAt";

    /**
     * Remove default timestamps
     */
    public $timestamps = false;

    /**
     * Fillablee Fields
     */
    protected $fillable = [
        'video_Name',
        'video_Duration',
        'video_Image',
        'video_Description',
        'video_Year',
        'video_Type',
        'genre_ID',
        'season_ID',
        'video_CreatedAt',
        'video_UpdatedAt',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre', 'genre_ID', 'genre_ID');
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'season_ID', 'season_ID');
    }
}
