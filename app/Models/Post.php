<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $with = ['category', 'user']; //eager loading prevent from n+1 problem
    // protected $fillable = ['slug', 'title', 'excerpt', 'body'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function scopeFilter($query, array $filters)
    {
        // dd(request(['search']));
        //checks if the search key exists in the array $filters
        if ($filters['search'] ?? false) {
            $query->where(function($subquery) {
                $searchTerm = '%' . request('search') . '%';
                $subquery->where('title', 'like', $searchTerm)
                         ->orWhere('body', 'like', $searchTerm);
            });
        }
        

        if ($filters['category'] ?? false) {
            $query->whereExists(function ($subquery) {
                $subquery
                    ->from('categories')
                    ->whereColumn('categories.id', 'posts.category_id')
                    ->where('categories.slug', request('category'));
            });
        }
        if ($filters['author'] ?? false) {
            $query->whereExists(function ($subquery) {
                $subquery->from('users')->whereColumn('users.id', 'posts.user_id')->where('users.username', request('author'));
            });
        }
    }
}
