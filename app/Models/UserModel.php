<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserModel extends Authenticatable implements JWTSubject{
    use HasFactory;


    public function getJWTIdentifier()
    {
        return $this->getkey();
    }


    public function getJWTCustomClaims()
    {
        return[];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $hidden = ['password'];
    protected $cast = ['password'=>'hashed'];
    protected $fillable = ['username', 'nama', 'password', 'level_id','image'];
    public function getRouteKeyName(){
        return 'user_id';
    }


    public function level(): BelongsTo{
        return $this->belongsTo(Level::class,'level_id','level_id');
    }


    protected function image(): Attribute
   {
       return Attribute::make(
           get: fn ($image) => url('/storage/posts/' . $image),
       );
   }
}





