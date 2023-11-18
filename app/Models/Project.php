<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $fillable = ['project_name', 'client_id', 'project_start', 'project_end', 'project_status'];
    protected $table = 'tb_m_projects';
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function project()
    {
        return $this->belongsTo(Client::class) ;
}
}
