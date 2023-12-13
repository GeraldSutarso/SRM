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

class CRController extends Controller{

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
        session(['technical_asset_count' => 1]);
        session(['physical_asset_count' => 1]);
        session(['human_asset_count' => 1]);
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

//step(1 - 5) posts or could be said as submit button function? anything goes

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step1(Request $request){
        $validatedData = $request->validate([
            'asset_name' => 'required|string|max:255',
            'rationale_for_select' => 'required|string',
            'description' => 'required|string',
            'owner'=> 'required|string|max:255',
            'a_department' => 'required|string|in:IT,HR,Logistic,Engineering,RnD,FA,Sales,BD,PPIC',
            'SR_confidentiality' => 'required|string',
            'SR_integrity' => 'required|string',
            'SR_availability' => 'required|string',
            'most_important_SR' => 'required|string|in:Confidentiality,Integrity,Availability',
        ]);

        //ask to forget in case another same session already exist
        $request->session()->forget('asset');
        // Store data in the session
        $request->session()->put('asset', [
            'user_id' => auth()->user()->user_id, // Get the authenticated user's ID
            'asset_name' => $validatedData['asset_name'],
            'asset_desc' => $validatedData['description'],
            'owner' => $validatedData['owner'],
            'a_department' => $validatedData['a_department'],
            'SR_confidentiality' => $validatedData['SR_confidentiality'],
            'SR_integrity' => $validatedData['SR_integrity'],
            'SR_availability' => $validatedData['SR_availability'],
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
        if (count($validatedData) !== count(array_unique($validatedData)))
        {
            return back()->withErrors(['message' => 'Each priority value must be different from the others! Different Impact Area, different priority.']);
        }
        //ask to forget in case another same session already exist
        $request->session()->forget('priority');
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
         // Loop through the input data for technical assets
    // Initialize arrays to store session data
    $request->session()->forget('map_technical');
    $request->session()->forget('map_physical');
    $request->session()->forget('map_human');
    $map_technical = $request->session()->get('map_technical', []);
    $map_physical = $request->session()->get('map_physical', []);
    $map_human = $request->session()->get('map_human', []);

    // Loop through the input data for technical assets
    for ($i = 0; $i < session('technical_asset_count', 1); $i++) {
        // Validate the form
        $validatedData = $request->validate([
            't_location.*' => 'required|string|max:255',
            't_description.*' => 'required|string',
            'mt_owner.*' => 'required|string|max:255',            
        ]);

        // Append to session array
        $map_technical[] = [         
            't_location' => $validatedData['t_location'][$i],
            't_description' => $validatedData['t_description'][$i],
            'mt_owner' => $validatedData['mt_owner'][$i],
        ];
    }
        // Store the updated array in the session
        $request->session()->put('map_technical', $map_technical);
        //same as above but physical
        // Loop through the input data for physical assets
        for ($i = 0; $i < session('physical_asset_count', 1); $i++) {
            // Validate the form
            $validatedData = $request->validate([
                'p_location.*' => 'required|string|max:255',
                'p_description.*' => 'required|string',
                'mp_owner.*' => 'required|string|max:255',            
            ]);
    
            // Append to session array
            $map_physical[] = [         
                'p_location' => $validatedData['p_location'][$i],
                'p_description' => $validatedData['p_description'][$i],
                'mp_owner' => $validatedData['mp_owner'][$i],
            ];
        }
        // Store the updated array in the session
        $request->session()->put('map_physical', $map_physical);
    
        // Loop through the input data for human assets
        for ($i = 0; $i < session('human_asset_count', 1); $i++) {
            // Validate the form
            $validatedData = $request->validate([
                'h_location.*' => 'required|string|max:255',
                'h_description.*' => 'required|string',
                'mh_owner.*' => 'required|string|max:255',            
            ]);
    
            // Append to session array
            $map_human[] = [         
                'h_location' => $validatedData['h_location'][$i],
                'h_description' => $validatedData['h_description'][$i],
                'mh_owner' => $validatedData['mh_owner'][$i],
            ];
        }
        // Store the updated array in the session
        $request->session()->put('map_human', $map_human);
        return redirect()->route('step4');
        
    }

//from here on is add button ( + ) for the container mapping (Step 3) forms
     
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

//Continue to step 4 ^_^


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step4(Request $request){
        $validatedData = $request->validate([
            'area_of_concern' => 'required|string',
            'actor' => 'required|string|max:255',
            'objective' => 'required|string',
            'motive'=> 'required|string',
            'result' => 'required|string',
            'security_needs' => 'required|string',
            'consequences' => 'required|string',
            'control' => 'required|string',
            'probability' => 'required|string|in:high,medium,low',
        ]);

        //ask to forget in case another same session already exist
        $request->session()->forget('RI');
        // Store data in the session
        $request->session()->put('RI', [
            'area_of_concern' => $validatedData['area_of_concern'],
            'actor' => $validatedData['actor'],
            'objective' => $validatedData['objective'],
            'motive' => $validatedData['motive'],
            'result' => $validatedData['result'],
            'security_needs' => $validatedData['security_needs'],
            'consequences' => $validatedData['consequences'],
            'control' => $validatedData['control'],
            'probability' => $validatedData['probability'],
        ]);
        
        // Redirect to the next step or return a response
        return redirect()->route('step5');
    }


// step 5 submit button controller looking a bit ugly
// because this is where all the form sessions are submitted to the database


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_step5(Request $request){
        $validatedData = $request->validate([
            'rep_value' => 'required|string|in:high,medium,low',
            'rep_score' => 'required|string|in:1,2,3,4,5,6,7,8,9,10',
            'finance_value' => 'required|string|in:high,medium,low',
            'finance_score' => 'required|string|in:1,2,3,4,5,6,7,8,9,10',
            'productivity_value' => 'required|string|in:high,medium,low',
            'productivity_score' => 'required|string|in:1,2,3,4,5,6,7,8,9,10',
            'safety_value' => 'required|string|in:high,medium,low',
            'safety_score' => 'required|string|in:1,2,3,4,5,6,7,8,9,10',
            'fines_value' => 'required|string|in:high,medium,low',
            'fines_score' => 'required|string|in:1,2,3,4,5,6,7,8,9,10',
            'rr_score' => 'required|integer|max:50'

        ]);
        //ask to forget in case another same session already exist
        $request->session()->forget('severity');
        $request->session()->put('severity', [             
            'rep_value' => $validatedData['rep_value'],
            'rep_score' => $validatedData['rep_score'],
            'finance_value' => $validatedData['finance_value'],
            'finance_score' => $validatedData['finance_score'],
            'productivity_value' => $validatedData['productivity_value'],
            'productivity_score' => $validatedData['productivity_score'],
            'safety_value' => $validatedData['safety_value'],
            'safety_score' => $validatedData['safety_score'],
            'fines_value' => $validatedData['fines_value'],
            'fines_score' => $validatedData['fines_score'],
            'rr_score' =>$validatedData['rr_score']

        ]);


//This is the save button

// Retrieve all of the data from the session
    $assetData = $request->session()->get('asset');//assetdata
    $priorityData = $request->session()->get('priority');//priority
    $mapHData = $request->session()->get('map_human'); //mapping human
    $mapPData = $request->session()->get('map_physical'); //mapping phys
    $mapTData = $request->session()->get('map_technical'); //mapping tech
    $RIData = $request->session()->get('RI'); //risk_identification
    $severityData = $request->session()->get('severity'); // severity

//     if(!$assetData) {// if any of those are missing
// // Handle the case where there is no session data asset
//                 $error = 'Please fill step 1.';
//                 return view('add.step5', compact('error'));
//             }
//             else if(!$priorityData) {// if any of those are missing 
// // Handle the case where there is no session data priority
//                 $error = 'Please fill step 2.';
//                 return view('add.step5', compact('error'));
//             }
//             else if(!$mapHData or !$mapPData or !$mapTData) {// if any of those are missing
// // Handle the case where there is no session data mapping
//                 $error = 'Please fill step 3.';
//                 return view('add.step5', compact('error'));
//             }
//             else if(!$RIData) {// if any of those are missing
// // Handle the case where there is no session data risk identification
//                 $error = 'Please fill step 4.';
//                 return view('add.step5', compact('error'));
//             }
//             else if(!$severityData) {// if any of those are missing
// // Handle the case where there is no session data severity
//                 $error = 'Please fill step 5.';
//                 return view('add.step5', compact('error'));
//             }

//create array to check which step is not filled yet, if its not filled, put in array
$errors = [];
// Handle the case where there is no session data asset
    if (!$assetData) {
        $errors[] = 'Please fill step 1.';
    }
// Handle the case where there is no session data priority
    if (!$priorityData) {
        $errors[] = 'Please fill step 2.';
    }
// Handle the case where there is no session data mapping
    if (!$mapHData || !$mapPData || !$mapTData) {
        $errors[] = 'Please fill step 3.';
    }
// Handle the case where there is no session data risk identification
    if (!$RIData) {
        $errors[] = 'Please fill step 4.';
    }
// Handle the case where there is no session data severity
    if (!$severityData) {
        $errors[] = 'Please fill step 5.';
    }

    if (!empty($errors)) {
        // If there are any errors, return to the step 5 view with the errors
        return view('add.step5', ['errors' => $errors]);
    }

// Create a new Asset instance and fill it with the session data
    $asset = new Asset($assetData);
    $asset->user_id = auth()->user()->user_id;
    $asset->owner = auth()->user()->username;
// Save the new asset to the database
    $asset->save();
// Create a new Priority instance and fill it with the session data
    $priority = new Priority($priorityData);
    $priority->asset_id = $asset->asset_id;
    $priority -> save();
// Create a new Human Mapping instance and fill it with the session data
    foreach ($mapHData as $data) {
        $mapH = new Map_Human(); // Create a new instance of Map_Human
        $mapH->fill($data); // Fill the model with data
        $mapH->asset_id = $asset->asset_id; // Set the asset_id
        $mapH->save(); // Save the record to the database
    }
// same as above, but Physical Mapping
    foreach ($mapPData as $data) {
        $mapP = new Map_Physical(); // Create a new instance of Map Physical
        $mapP->fill($data); // Fill the model with data
        $mapP->asset_id = $asset->asset_id; // Set the asset_id
        $mapP->save(); // Save the record to the database
    }
    // same as above, but Technical Mapping
    foreach ($mapTData as $data) {
        $mapT = new Map_Technical(); // Create a new instance of Map Technical
        $mapT->fill($data); // Fill the model with data
        $mapT->asset_id = $asset->asset_id; // Set the asset_id
        $mapT->save(); // Save the record to the database
    }
//Create a new Risk Identification instance and fill it with the session data
    foreach ($RIData as $data) { 
        $RI = new Risk_Identification();
        $RI->fill($data);
        $RI->asset_id = $asset->asset_id;
        $RI->save();
    }
//Create a new Severity Instance and fill it with the session data
    foreach ($severityData as $data) {
        $Severity = new Severity();
        $Severity->fill($data);
        $Severity->AoC_id = $RI->AoC_id;
        $RI->save();
    } 
//when done,
    $request->session()->forget(['asset','priority','severity','map_human','map_physical','map_technical','RI']);//forget everyone
    return redirect()->route('home')->with('success', 'Asset created successfully.');
    } 
}