<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'asset_name',
        'asset_desc',
        'owner',
        'a_department',
        'SR_confidentiality',
        'SR_integrity',
        'SR_availability',
        'most_important_SR',
        'rationale_for_select',
        

    ];
    protected $primaryKey = 'asset_id';
}