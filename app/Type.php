<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Type
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
