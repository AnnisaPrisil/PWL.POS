<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;


use Illuminate\Foundation\Auth\User as Authenticatable;




class UserModel extends Authenticatable implements JWTSubject {
    
    use HasFactory;
    
    public function getJWTIdentifier() {
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
    protected $fillable = ['username', 'nama', 'password', 'level_id'];
    public function getRouteKeyName(){
        return 'user_id';
    }


    public function level(): BelongsTo{
        return $this->belongsTo(Level::class,'level_id','level_id');
    }
}







