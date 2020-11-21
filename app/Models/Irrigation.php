<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $terrace_id
 * @property integer $officer_id
 * @property string $time
 * @property int $debit
 * @property string $created_at
 * @property string $updated_at
 * @property Officer $officer
 * @property Terrace $terrace
 * @property IrrigationDetail[] $irrigationDetails
 */
class Irrigation extends Model
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
    protected $fillable = ['terrace_id', 'officer_id', 'time', 'debit', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function officer()
    {
        return $this->belongsTo('App\Models\Officer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terrace()
    {
        return $this->belongsTo('App\Models\Terrace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function irrigationDetails()
    {
        return $this->hasMany('App\Models\IrrigationDetail');
    }
}
