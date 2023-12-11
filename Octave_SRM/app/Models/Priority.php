<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Priority extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'asset_id',
        'trust',
        'finance',
        'productivity',
        'safety',
        'fines'
    ];
    protected $primaryKey = 'asset_id';
    public $incrementing = false;
    protected $table = 'priority';

}