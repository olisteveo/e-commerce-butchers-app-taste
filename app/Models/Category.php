<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property Collection|Recipe[] $recipes
 *
 * @package App\Models
 */
class Category extends Model
{

    use HasFactory;
	protected $table = 'categories';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'description'
	];


	public static function getAll()
	{
		$query = static::orderBy('id', 'asc');
		return $query->get();
	}

	public function recipes()
	{
		return $this->belongsToMany(Recipe::class, 'recipe2category');
	}
}
