<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $terrace_id
 * @property integer $neighbor_id
 * @property string $created_at
 * @property string $updated_at
 * @property Terrace $terrace
// * @property Terrace $terrace
 */
class TerraceNeighbor extends Model
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
    protected $fillable = ['terrace_id', 'neighbor_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terrace()
    {
        return $this->belongsTo('App\Models\Terrace', 'neighbor_id');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//     */
//    public function terrace()
//    {
//        return $this->belongsTo('App\Models\Terrace');
//    }
}
