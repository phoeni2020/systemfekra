<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundfields extends Model
{
    protected $table = 'account_fund_felids';
    protected $fillable =['name','balance','amount','debit','credit','fundaccount'];
}
