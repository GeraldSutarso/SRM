<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Severity extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'AoC_id',
        'financial_value',
        'financial_score',
        'productivity_value',
        'productivity_score',
        'rep_value',
        'rep_score',
        'safety_value',
        'safety_score',
        'fines_value',
        'fines_score',
        'rr_score'
    ];
    protected $primaryKey = 'AoC_id';
    public $incrementing = false;
    protected $table = 'severity';

}