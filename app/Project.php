<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property integer $type_id
 * @property string $client
 * @property string $description
 * @property string $image
 * @property string $date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Type $type
 * @property-read mixed $actual_image
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereClient($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    protected $fillable = ['title', 'link', 'type_id', 'client', 'date', 'description', 'image'];
    protected $hidden = ['password', 'remember_token',];
    protected $dates = ['date'];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function getActualImageAttribute()
    {
        return asset('/images/projects/resized/' . $this->getAttribute('image'));
    }

    public function getPrettyDateAttribute()
    {
        return $this->getAttribute('date')->format('Y');
    }
}