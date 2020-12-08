<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $admin_id
 * @property int $map_id
 */
class Region extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'admin_id', 'map_id'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%');
    }
}
