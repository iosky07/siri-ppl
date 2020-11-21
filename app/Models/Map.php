<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $map_picture
 * @property string $village
 * @property string $created_at
 * @property string $updated_at
 * @property Terrace[] $terraces
 */
class Map extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['map_picture', 'village', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function terraces()
    {
        return $this->hasMany('App\Models\Terrace');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('village', 'like', '%'.$query.'%');
    }
}
