<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announce extends Model
{
    use HasFactory;
    protected $fillable = [
        'Firstname',
        'Lastname',
        'Section',
        'Role',
        'message',
        'sender'
    ];
    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}