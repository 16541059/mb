<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $appends = ['next', 'previous'];

    public function getNextAttribute()
    {
        return $this->where('id', '>', $this->id)->orderBy('id','asc')->first();
    }

    public function getPreviousAttribute()
    {
        return $this->where('id', '<', $this->id)->orderBy('id','asc')->first();
    }


}
