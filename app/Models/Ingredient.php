<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ingredient
 * 
 * @property int $id
 * @property string $name
 * @property string $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $recipe_id
 * 
 * @property Recipe $recipe
 *
 * @package App\Models
 */
class Ingredient extends Model
{
    use HasFactory;
	protected $table = 'ingredients';

	protected $casts = [
		'recipe_id' => 'int'
	];

	protected $fillable = [
		'name',
		'quantity',
		'recipe_id'
	];

	public function recipe()
	{
		return $this->belongsTo(Recipe::class);
	}
}
