<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class MainAccount extends Model
{
    public $table="main_accounts";
    public function main(){
        return $this->belongsTo('App\MainAccount','main_id');
    }
}
