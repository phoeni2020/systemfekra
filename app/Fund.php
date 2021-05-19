<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $table ='fund_accounts';
    protected $fillable = ['name','from','to'];

    public function fundfields(){
        return $this->hasMany(Fundfields::class,'fundaccount','id');
    }
}
