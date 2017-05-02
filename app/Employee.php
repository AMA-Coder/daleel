<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded=[];

    function morphToJSON(){
        return [
            'name'=>$this->name,
            'company'=>$this->company,
            'extension'=>$this->extension
        ];
    }
}
