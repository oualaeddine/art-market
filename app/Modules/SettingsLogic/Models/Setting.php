<?php

namespace App\Modules\SettingsLogic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings_cod';

    protected $fillable = [
        'name',
        'value'
    ];
    
}
