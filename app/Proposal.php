<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable=[ 'title','organization:name','address','phone','email','submitted_by:name','summary','background','activities','budget'];
}
