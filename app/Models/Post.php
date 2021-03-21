<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable; 

class Post extends Model
{
    use HasFactory;
    
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    //we had to put foreignKey cause function name isn't the same as foreign key column
    // public function myUserRelation()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}

