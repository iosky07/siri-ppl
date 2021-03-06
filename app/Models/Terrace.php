<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $map_id
 * @property int $width
 * @property int $height
 * @property string $node
 * @property string $coordinate
 * @property string $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property Map $map
 * @property IrrigationDetail[] $irrigationDetails
 * @property Irrigation[] $irrigations
 * @property TerraceNeighbor[] $terraceNeighbors
 */
class Terrace extends Model
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
    protected $fillable = ['map_id', 'width', 'height', 'node', 'coordinate', 'user_id', 'plant', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function map()
    {
        return $this->belongsTo('App\Models\Map');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function irrigationDetails()
    {
        return $this->hasMany('App\Models\IrrigationDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function irrigations()
    {
        return $this->hasMany('App\Models\Irrigation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function terraceNeighbors()
    {
        return $this->hasMany('App\Models\TerraceNeighbor', 'neighbor_id');
    }

    public static function search($query,$id)
    {
//        return empty($query) ? static::query()->whereMapId($id)
//            : static::whereMapId($id)->where('node', 'like', '%'.$query.'%');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function terraceNeighbors()
//    {
//        return $this->hasMany('App\Models\TerraceNeighbor');
//    }
}
