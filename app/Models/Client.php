<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'surname',
        'number',
        'balance',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function company()
    {
        $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
