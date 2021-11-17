<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Password extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_name',
        'password',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function decrypt($content)
    {
        return Crypt::decrypt($content);
    }
}
