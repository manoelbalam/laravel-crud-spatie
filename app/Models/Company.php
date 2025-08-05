<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Company extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'employees',
        'user_id',
    ];
    
    /**
     * Bind the relationships
     *
     * @return array<object, object>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
