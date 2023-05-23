<?php

// app\Models\Club.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';
    protected $fillable = ['name'];

    // Relation avec les matchs en tant que club local
    public function homeMatches()
    {
        return $this->hasMany(Match::class, 'home_club_id');
    }

    // Relation avec les matchs en tant que club visiteur
    public function awayMatches()
    {
        return $this->hasMany(Match::class, 'away_club_id');
    }
}

