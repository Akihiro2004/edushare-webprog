<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    protected $dates = ['publish_date'];
    protected $fillable = [
        'title',
        'category_id',
        'thumbnail',
        'creator',
        'publish_date',
        'description',
        'url',
    ];
    /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function casts(): array
    {
        return [
            'publish_date' => 'date:d F, Y'
        ];
    }
}
