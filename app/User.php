<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Proposal;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //
   
    protected $fillable = [
        'name', 'email', 'password','Verifytoken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //function to determine if user is admin or an applicant

    public function admin(){
        if($this->is_admin){
        return true;
        }

        return false;
    }

    public function proposal()
    {
        return $this->hasOne('App\Proposal');
    }


   }
