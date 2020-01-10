<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * Primary Key
     */
    protected $primaryKey = "person_iD";

    /**
     * Table Name
     */
    protected $table = "person";

    /**
     * Define custom Created_At
     */
    const CREATE_AT = "person_CreatedAt";

    /**
     * Define custom Updated_At
     */
    const UPDATED_AT = "person_UpdatedAt";

    /**
     * Remove default timestamps
     */
    public $timestamps = false;

    /**
     * Fillable Fields
     */
    protected $fillable = [
        'person_Name',
        'person_Role',
        'person_CreatedAt',
        'person_UpdatedAt',
    ];

    public function people()
    {
        return $this->belongsToMany('App\Person', 'videoPerson', 'video_ID', 'person_ID');
    }
    public function seasonPerson()
    {
        return $this->belongsToMany('App\SeasonPerson', 'seasonPerson', 'season_ID', 'person_ID');
    }
}
