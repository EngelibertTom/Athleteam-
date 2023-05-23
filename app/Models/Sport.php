<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table = 'sports';
    protected $fillable = ['name'];

    // Relation avec les matchs
    public function matches()
    {
        return $this->hasMany(Match::class);
    }
}

