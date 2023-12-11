<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Map_Physical extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'asset_id',
        'p_description',
        'mp_owner',
        'p_location',
    ];
    protected $primaryKey = 'mp_id';
    // public $incrementing = false;
    protected $table = 'map_physical';

}