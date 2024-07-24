<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Recipe
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $cooking_method
 * @property string $prep_time
 * @property int $serves
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $author_id
 *
 * @property Author $author
 * @property Collection|Ingredient[] $ingredients
 * @property Collection|Category[] $categories
 *
 * @package App\Models
 */
class Recipe extends Model
{
    use HasFactory;
	protected $table = 'recipes';

	protected $casts = [
		'serves' => 'int',
		'author_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'cooking_method',
		'prep_time',
		'serves',
		'image',
		'author_id'
	];

	public function author()
	{
		return $this->belongsTo(Author::class);
	}

	public function ingredients()
	{
		return $this->hasMany(Ingredient::class);
	}

	public function category()
	{
		return $this->belongsToMany(Category::class, 'recipe2category');
	}
}
