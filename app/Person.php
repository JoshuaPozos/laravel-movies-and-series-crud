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
     * Fillable Fields
     */
    protected $fillable = [
        'person_Name',
        'person_Role',
        'person_CreatedAt',
        'person_UpdatedAt',
    ];

    public function videoPerson()
    {
        return $this->belongsToMany('App\Person', 'videoPerson', 'video_ID', 'person_ID');
    }
    public function seasonPerson()
    {
        return $this->belongsToMany('App\SeasonPerson', 'seasonPerson', 'season_ID', 'person_ID');
    }
}
