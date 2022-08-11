<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'email',
        'bin',
        'balance',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function clients()
    {
        $this->hasMany(Client::class, 'company_id', 'id');
    }
}
