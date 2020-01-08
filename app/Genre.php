<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * Prrimary Keeey
     */
    protected $primaryKey = "genre_ID";

    /**
     * Define Table Name
     */
    protected $table = "genre";
    /**
     * Define custom Created_At
     */
    const CREATE_AT = "genre_CreatedAt";

    /**
     * Define custom Updated_At
     */
    const UPDATED_AT = "genre_UpdatedAt";

    /**
     * Remove default timestamps
     */
    public $timestamps = false;

    /**
     * Fillablee Fields
     */
    protected $fillable = [
        'genre_Name',
        'genre_CreatedAt',
        'genre_UpdatedAt',
    ];
    public function videos()
    {
        return $this->hasMany('App\Video', 'video_ID', 'video_ID');
    }
}
