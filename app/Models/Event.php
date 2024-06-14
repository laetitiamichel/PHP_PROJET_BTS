<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

   /*  protected $fillable = ['nom', 'description', 'user_id', 'image']; */

    // Définir la relation avec User
   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
