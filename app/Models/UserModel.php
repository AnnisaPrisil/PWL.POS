<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserModel extends Model
{
    
    use HasFactory;
    protected $table = 'm_user';
    protected $primaryKey = 'user_id'; 
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; 
    protected $fillable = ['username', 'nama', 'password', 'level_id'];

    public function getRouteKeyName()
    {
        return 'user_id';
    }
    
     
}
