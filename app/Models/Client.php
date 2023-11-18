<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='tb_m_clients';
    public function project()
    {
        return $this->belongsTo(Project::class) ;
    }
    public function delete()
    {
        parent::delete();
}
}
