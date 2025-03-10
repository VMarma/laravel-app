<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 */
class Calculator extends Model
{
    protected $table = 'calc_log';
    protected $fillable = ['calculation', 'response', 'created_at', 'updated_at',];
}
