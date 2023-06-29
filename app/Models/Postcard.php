<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\SchemaOrg\Schema;

class Postcard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',            
        'price',
        'online_at',
        'offline_at',
        'is_draft',
        'user_id',
        'team_id'
    ];

    //Generate Schema-org structured data
    public function getSchema()
    {
        return Schema::product()
            ->title($this->title)
            ->price($this->price)
            ->author($this->user->name)
            ->online($this->online_at)
            ->offline($this->offline_at)
            ->photo($this->photo)            
            // Add more properties as needed
            ->toScript();
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
