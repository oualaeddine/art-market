<?php

namespace App\Models;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HomeCategory
 *
 * @property int $id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HomeCategory extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
