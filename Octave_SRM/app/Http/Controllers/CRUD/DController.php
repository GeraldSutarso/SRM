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

    $RI = Risk_Identification::where('asset_id', $asset_id);
    $severity=Severity::where('AoC_id', $RI->AoC_id);
    $severity->delete();
    $RI->delete();

    //mapping delete
    $map_h = Map_Human::where('asset_id', $asset_id);
    $map_h->delete();
    $map_p = Map_Physical::where('asset_id', $asset_id);
    $map_p->delete();
    $map_t = Map_Technical::where('asset_id', $asset_id);
    $map_t->delete();
    //priority delete
    $priority = Priority::where('asset_id', $asset_id);
    $priority->delete();

    //asset delete
    $asset = Asset::findOrFail($asset_id);
    $asset->delete();
    return redirect()->route('home')->with('success', 'Asset deleted successfully.');
}
}