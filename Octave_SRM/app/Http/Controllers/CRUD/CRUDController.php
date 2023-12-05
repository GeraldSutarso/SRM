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
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CRUDController extends Controller{

        /**
     * Write code on Method
     *
     * @return response()
     */

     //view page of the steps (1 until 5)
    public function step1(): View
    {
        return view('add.step1');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function step2(): View
    {
        return view('add.step2');
    } 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function step3(): View
    {
        return view('add.step3');
    } 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function step4(): View
    {
        return view('add.step4');
    } 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function step5(): View
    {
        return view('add.step5');
    }  
    //step(1 - 5) posts

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step1(Request $request){
        $validatedData = $request->validate([
            'asset_name' => 'required|string|max:255',
            'rationale_for_select' => 'required|string|max:255',
            'description' => 'required|string',
            'owner' => 'required|string',
            'a_department' => 'required|string',
            'confidentiality' => 'required|string',
            'integrity' => 'required|string',
            'availability' => 'required|string',
            'most_important_SR' => 'required|string|in:Confidentiality,Integrity,Availability',
        ]);
        // $asset = new Asset($validatedData);

        // // Assign the authenticated user's ID to the user_id foreign key
        // $asset->user_id = auth()->user()->user_id;
    
        // Save the new asset
        // $asset->save();
        // Store data in the session
        $request->session()->put('asset', [
            'user_id' => auth()->user()->user_id, // Get the authenticated user's ID
            'asset_name' => $validatedData['asset_name'],
            'asset_desc' => $validatedData['description'],
            'owner' => $validatedData['owner'],
            'a_department' => $validatedData['a_department'],
            'SR_confidentiality' => $validatedData['confidentiality'],
            'SR_integrity' => $validatedData['integrity'],
            'SR_availability' => $validatedData['availability'],
            'most_important_SR' => $validatedData['most_important_SR'],
            'rationale_for_select' => $validatedData['rationale_for_select'],
        ]);
        
        // Redirect to the next step or return a response
        return redirect()->route('step2');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step2(Request $request){
        $validatedData = $request->validate([
            'trust' => 'required|string|in:1,2,3,4,5',
            'finance' => 'required|string|in:1,2,3,4,5',
            'productivity' => 'required|string|in:1,2,3,4,5',
            'safety' => 'required|string|in:1,2,3,4,5',
            'fines' => 'required|string|in:1,2,3,4,5',

        ]);
        // $priority = new Priority($validatedData);
        // $priority->asset_id = session('asset.asset_id');
        // $priority->save();

        $request->session()->put('priority', [
            // 'asset_id'=>$validatedData['']               
            'trust' => $validatedData['trust'],
            'finance' => $validatedData['finance'],
            'productivity' => $validatedData['productivity'],
            'safety' => $validatedData['safety'],
            'fines' => $validatedData['fines'],

        ]);
        return redirect()->route('step3');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step3(Request $request){
        
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step4(Request $request){
        
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step5(Request $request){
    // Retrieve the asset data from the session
    $assetData = $request->session()->get('asset');
    $priorityData = $request->session()->get('priority');
    $mapHData = $request->session()->get('map_human'); //mapping human
    $mapPData = $request->session()->get('map_physical'); //mapping phys
    $mapTData = $request->session()->get('map_technical'); //mapping tech
    $RIData = $request->session()->get('RI'); //risk_ident
    $severityData = $request->session()->get('severity'); // severity
    // Check if the session data exists
    // Create a new Asset instance and fill it with the session data
    $asset = new Asset($assetData);
    // Save the new asset to the database
    $asset->save();
    $priority = new Priority($priorityData);
    $priority->asset_id = $asset->asset_id;
    $priority -> save();

    $request->session()->forget(['asset','priority','severity','map_human','map_physical','map_technical','RI']);//forget everyone
    return redirect()->route('home')->with('success', 'Asset created successfully from session data.');
    if(!$assetData or !$priorityData or !$mapHData or !$mapPData or !$mapTData or !$RIData or !$severityData) {// if any of those are missing
        // Handle the case where there is no session data
        return redirect()->route('step5')->with('error', 'Some data are missing in session.');
    }
    } 
    

    
}