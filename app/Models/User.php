<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ["firstname", "lastname", "email", "phone", "password", "otp"];

    protected  $attributes = [
        "otp"=> "0",
    ] ;
}
