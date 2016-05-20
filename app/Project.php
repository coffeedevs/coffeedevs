<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = ['title', 'links', 'type', 'client', 'date', 'description',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var  array
     */
    protected $hidden = ['password', 'remember_token',];

    public function links()
    {
        return $this->hasMany('App\Links');
    }
}