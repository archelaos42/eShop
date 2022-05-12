<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Attribute
 * @package App\Models
 */
class Attribute extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'frontend_type', 'is_filterable'
    ];

    /**
     * @var array
     */
    protected $casts  = [
        'is_filterable' =>  'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
