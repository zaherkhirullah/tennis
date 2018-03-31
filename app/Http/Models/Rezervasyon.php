<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kiralayan;
use App\Http\Models\Kort;
use App\Http\Models\Servis;

class Rezervasyon extends Model
{
    protected $table = 'rezervasyons';
    protected $fillable = [
        ' kort_id','kiralayan_id','servis_id',
        'start_at','end_at','date','servis_address',
        'servis_time','price','pay_status',
    ];
    
    public function kiralayan()
    {
        return $this->belongsTo(Kiralayan::class);
    }
    public function kort()
    {
        return $this->belongsTo(Kort::class);
    }
    public function servis()
    {
        return $this->belongsTo(Kort::class);
    }
    
}
