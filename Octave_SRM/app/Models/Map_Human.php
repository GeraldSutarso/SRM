<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map_Human extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'asset_id',
        'h_description',
        'mh_owner',
        'h_location',
    ];
    protected $primaryKey = 'mh_id';
    // public $incrementing = false;
    protected $table = 'map_human';

}