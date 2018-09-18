<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable=[ 'title','organization_name','address','phone','email','submitted_by_name','summary','background','activities','budget'];
}
