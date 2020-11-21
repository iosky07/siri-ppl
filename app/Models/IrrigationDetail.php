<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $terrace_id
 * @property integer $irrigation_id
 * @property string $created_at
 * @property string $updated_at
 * @property Irrigation $irrigation
 * @property Terrace $terrace
 */
class IrrigationDetail extends Model
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
    protected $fillable = ['terrace_id', 'irrigation_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function irrigation()
    {
        return $this->belongsTo('App\Models\Irrigation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terrace()
    {
        return $this->belongsTo('App\Models\Terrace');
    }
}
