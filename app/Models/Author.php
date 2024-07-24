<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 *
 * @property int $id
 * @property string $author_name
 * @property int $user_id
 *
 * @property User $user
 * @property Collection|Recipe[] $recipes
 *
 * @package App\Models
 */
class Author extends Model
{
    use HasFactory;
	protected $table = 'authors';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'author_name',
		'user_id'
	];

	/**
	 * Get an author & list of recipes for a specified users user_id.
	 * @param integer $user_id The id of the user to get the author & recipes.
	 * @param integer $recipes_limit An optional recipes limit that defaults to 3 if not supplied.
	 * @return Collection The Author & related Recipes.
	 */
	public static function getAuthor4User($user_id, $recipes_limit=3)
	{
		// get the author model for there user id
		$query = static::_withRecipes(static::where("user_id", $user_id), $recipes_limit);
        return $query->first();
	}

	/**
	 * Get an author & list of recipes for a specified users user_id.
	 * @param integer $user_id The id of the user to get the author & recipes.
	 * @param integer $recipes_limit An optional recipes limit that defaults to 3 if not supplied.
	 * @return Collection The Author & related Recipes.
	 */
	public static function getAuthor($author_id, $recipes_limit=3)
	{
		// get the author model for there user id
		$query = static::_withRecipes(static::where("id", $author_id), $recipes_limit);
        return $query->first();
	}

	/**
	 * Attach a recipe sub-query to the existing query being passed in.
	 * @param Builder $query The query builder to add the sub-query to.
	 * @param integer $recipes_limit An optional recipes limit that defaults to 3 if not supplied.
	 * @return Builder The query builder for further processing.
	 */
    protected static function _withRecipes($query, $recipes_limit=3)
    {
		// include the authors recipes but use a sub query builder
		// to limit the number of recipes returned
        return $query->with("recipes", function($q) use($recipes_limit) {
			//
            return $q->with("ingredients")
				->limit($recipes_limit);
        });
    }

	public static function myRecipeCount($user_id)
	{
		// get the author model for there user id
		$query = static::where("user_id", $user_id)
		// include the authors recipes but use a sub query builder
		// to limit the number of recipes returned
        ->with("recipes", function($q) {
            return $q->count();
        });
        return $query->first();
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function recipes()
	{
		return $this->hasMany(Recipe::class);
	}
}
