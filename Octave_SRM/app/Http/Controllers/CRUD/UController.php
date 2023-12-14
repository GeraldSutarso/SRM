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

class UController extends Controller{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update($asset_id)
    {   
        //get session mapping counting
        session(['technical_asset_count' => 1]);
        session(['physical_asset_count' => 1]);
        session(['human_asset_count' => 1]);

        // Find the asset
        $asset = Asset::findOrFail($asset_id);
        if(Auth::user()->user_id != '1' && Auth::user()->department != $asset->a_department){
            return redirect('home')->withErrors('Asset inaccessible.');
        }
        // Initialize arrays to store the data
        $severityData = [];
        $mapHumanData = [];
        $mapPhysicalData = [];
        $mapTechnicalData = [];
        // Find Risk Identifications (RIs)
        $RIs = Risk_Identification::where('asset_id', $asset_id)->get();


        // For every RI, get severity and store it
        foreach ($RIs as $RI) {
            $severities = Severity::where('AoC_id', $RI->AoC_id)->get();
            foreach ($severities as $severity) {
                $severityData[] = $severity;
            }
        }

        // Get mapping data
        $mapHumans = Map_Human::where('asset_id', $asset_id)->get();
        foreach($mapHumans as $mapHuman){
            $count = session()->get('human_asset_count', 1);
            session()->put('human_asset_count', ++$count);
            $mapHumanData[] = $mapHuman;
        }
        $mapPhysicals = Map_Physical::where('asset_id', $asset_id)->get();
        foreach($mapPhysicals as $mapPhysical){
            $count = session()->get('physical_asset_count', 1);
            session()->put('physical_asset_count', ++$count);
            $mapPhysicalData[] = $mapPhysical;
        }
        $mapTechnicals = Map_Technical::where('asset_id', $asset_id)->get();
        foreach($mapTechnicals as $mapTechnical){
            $count = session()->get('technical_asset_count', 1);
            session()->put('technical_asset_count', ++$count);
            $mapTechnicalData[] = $mapTechnical;
        }
        // Get priority
        $priority = Priority::where('asset_id', $asset_id)->first();

        return redirect()->view('update.update', compact('RIs', 'severityData', 'mapHumanData', 'mapPhysicalData', 'mapTechnicalData', 'priority', 'asset'));
    } 

    /** 
    * Write code on Method
    *
    * @return response()
    */
   public function add_technical(Request $request){
   if ($request -> has('add_technical')){
   // Increment the row count for technical assets
   $count = $request->session()->get('technical_asset_count', 1);
   $request->session()->put('technical_asset_count', ++$count);

   // Redirect back to the form
   return back()->withInput();
   }
   }
   /**
    * Write code on Method
    *
    * @return response()
    */
   public function add_physical(Request $request){
   if ($request -> has('add_physical')){
   // Increment the row count for technical assets
   $count = $request->session()->get('physical_asset_count', 1);
   $request->session()->put('physical_asset_count', ++$count);

   // Redirect back to the form
   return back()->withInput();
   }
   }   
   /**
    * Write code on Method
    *
    * @return response()
    */
   public function add_human(Request $request){
   if ($request -> has('add_human')){
   // Increment the row count for technical assets
   $count = $request->session()->get('human_asset_count', 1);
   $request->session()->put('human_asset_count', ++$count);

   // Redirect back to the form
   return back()->withInput();
   }
   }

   /**
    * Write code on Method
    *
    * @return response()
    */
    public function del_mh(Request $request){
        if ($request -> has('del_mh')){
        
        return back()->withInput();
        }
        }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function del_mp(Request $request){
        if ($request -> has('del_mp')){
        
        return back()->withInput();
        }
        }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function del_mt(Request $request){
        if ($request -> has('del_mt')){
        
        return back()->withInput();
        }
        }


}