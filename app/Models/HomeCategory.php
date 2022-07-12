<?php

namespace App\Models;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
