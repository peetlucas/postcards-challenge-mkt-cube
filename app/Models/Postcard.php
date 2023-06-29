<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcard extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
