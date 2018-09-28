<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\User;

class Proposal extends Model
{

	use Notifiable;

    protected $fillable=['user_id','title','organization_name','address','phone','email','submitted_by_name','summary','submitted_at','Status','background','activities','budget'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

   
}
