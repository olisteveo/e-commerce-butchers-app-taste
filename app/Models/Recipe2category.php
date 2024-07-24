<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Recipe2category
 * 
 * @property int $recipe_id
 * @property int $category_id
 * 
 * @property Category $category
 * @property Recipe $recipe
 *
 * @package App\Models
 */
class Recipe2category extends Model
{
    use HasFactory;
	protected $table = 'recipe2category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'recipe_id' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'recipe_id',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function recipe()
	{
		return $this->belongsTo(Recipe::class);
	}
}
