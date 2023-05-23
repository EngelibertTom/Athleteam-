<?php

// app\Models\Match.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['sport_id', 'home_club_id', 'away_club_id', 'date', 'heure', 'score'];
    protected $table = 'matches';

    // Relation avec le sport
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    // Relation avec le club local
    public function homeClub()
    {
        return $this->belongsTo(Club::class, 'home_club_id');
    }

    // Relation avec le club visiteur
    public function awayClub()
    {
        return $this->belongsTo(Club::class, 'away_club_id');
    }
}

