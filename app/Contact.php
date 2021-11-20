<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{

    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'contact',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Variables uses SoftDeletes
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];
    
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //..
    ];

    /**
     * Get users list
     */
    public static function getUsers()
    {
        $result = Self::select('name', 'id')
            ->orderBy('name', 'ASC')
            //->withTrashed()
            ->get();
        return $result;
    }

    /**
     * Delete User
     */
    public static function deleteUsers($user_id)
    {
        $result = Self::find($user_id);
        $result->deleted_at = date('Y-m-d H:i:s');
        $result->save();
        return (count($result->changes) > 0) ? true : false ;
    }

    /**
     * Check if user existis
     */
    public static function checkUsers($user_id)
    {
        $result = Self::where('id', '=', $user_id)->count();
        return ($result > 0) ? true : false ;
    }

    /**
     * Get user
     */
    public static function getUser($user_id)
    {   
        $result = Self::where('id', '=', $user_id)
            ->first();

        return $result;
    }
}
