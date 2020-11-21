<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $writter
 * @property string $publish_date
 * @property string $publisher
 * @property string $content
 * @property int $view
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 */
class Blog extends Model
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
    protected $fillable = ['title', 'slug', 'writter', 'publish_date', 'publisher', 'content', 'view', 'thumbnail', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%');
    }
}
