<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Risk_Identification extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'asset_id',
        'area_of_concern',
        'actor',
        'objective',
        'motive',
        'result',
        'security_needs',
        'probability',
        'consequences',
        'control'
    ];
    protected $primaryKey = 'AoC_id';
    // public $incrementing = false;
    protected $table = 'risk_identification';

}