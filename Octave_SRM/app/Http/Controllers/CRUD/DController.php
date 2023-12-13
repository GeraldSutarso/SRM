<?php
  
namespace App\Http\Controllers\CRUD;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Asset;
use App\Models\Priority;
use App\Models\Severity;
use App\Models\Map_Human;
use App\Models\Map_Physical;
use App\Models\Map_Technical;
use App\Models\Risk_Identification;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DController extends Controller{

    public function delete_asset($asset_id)
{
    //find RI where its asset id is the same
    $RIs = Risk_Identification::where('asset_id', $asset_id)->get();
    foreach ($RIs as $RI){//for every RI, get severity which the aoc id
    $severities=Severity::where('AoC_id', $RI->AoC_id)->get();
        foreach($severities as $severity){//for every severity, delete
            $severity->delete();
        }
    //after that, delete the RI
    $RI->delete();
    }
    //mapping delete
    Map_Human::where('asset_id', $asset_id)->each(function($map_h){
        $map_h->delete();
    });
    Map_Physical::where('asset_id', $asset_id)->each(function($map_p){
        $map_p->delete();
    });
    Map_Technical::where('asset_id', $asset_id)->each(function($map_t){
        $map_t->delete();
    });
    //priority delete
    $priority = Priority::where('asset_id', $asset_id)->first();
    if ($priority){
    $priority->delete();
    }
    //asset delete
    $asset = Asset::findOrFail($asset_id);
    $asset->delete();
    return redirect()->route('home')->with('success', 'Asset and all related records deleted successfully.');
}
}