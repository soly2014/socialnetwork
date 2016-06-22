<?php

namespace Facemash;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    protected $table = 'statuses';

    protected $fillable = [

    	'body'
    ];

    public function users()
    {
    	return $this->belongsTo('Facemash\User','user_id');
    }

    public function reply($id)
    {
    	return $this->users->whereNotNull('user_id')->where('id',$id);
    }
}
