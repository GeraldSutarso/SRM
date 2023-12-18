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
            // session()->forget([
            // //reset the database session
            // 'asset','priority','severity','map_human','map_physical','map_technical','RI',
            // //reset the container mapping count session
            // 'technical_asset_count','physical_asset_count','human_asset_count'
            // ]);
        //get session mapping counting
        
        session(['technical_asset_count' => 0]);
        session(['physical_asset_count' => 0]);
        session(['human_asset_count' => 0]);
        
        // Find the asset
        $asset = Asset::findOrFail($asset_id);
        if(Auth::user()->user_id != '1' && Auth::user()->department != $asset->a_department){
            return redirect('home')->withErrors('Asset inaccessible.');
        }
        //place the asset table to the session
        $assetArray = $asset->toArray();
        if(!session('asset')){
        session()->put('asset', $assetArray);
        }
        // Initialize arrays to store the data
        $severityData = [];
        $mapHumanData = [];
        $mapPhysicalData = [];
        $mapTechnicalData = [];
        // Find Risk Identifications (RIs)
        $RIs = Risk_Identification::where('asset_id', $asset_id)->get();
        // Convert the collection of model instances into an array of arrays
        $RIArray = $RIs->toArray();

        // Put the array into the session
        foreach ($RIArray as $risk){
        if(!session('RI')){
        session()->put('RI', $risk); // using the session helper function
        }}
        // For every RI, get severity and store it
        foreach ($RIs as $RI) {
        $severities = Severity::where('AoC_id', $RI->AoC_id)->get();
        foreach ($severities as $severity) {
        // Check the session for each severity key
        if(!session('severity')){
            session()->put('severity',$severity);
        }
        $severityData[] = $severity;
    }
}

        // Get mapping data
        $mapHumans = Map_Human::where('asset_id', $asset_id)->get();
        foreach($mapHumans as $mapHuman){
            $count = session()->get('human_asset_count', 1);
            session()->put('human_asset_count', $count);
            session()->put('human_asset_count', ++$count);
            $mapHumanArray = $mapHuman->toArray();
            if(!session('map_human')){
            session()->put('map_human.'.$mapHuman->mh_id, $mapHumanArray);
            }
            $mapHumanData[] = $mapHuman;
        }
        $mapPhysicals = Map_Physical::where('asset_id', $asset_id)->get();
        foreach($mapPhysicals as $mapPhysical){
            $count = session()->get('physical_asset_count', 1);
            session()->put('physical_asset_count', $count);
            session()->put('physical_asset_count', ++$count);
            $mapPhysicalArray = $mapPhysical->toArray();
            if(!session('map_physical')){
            session()->put('map_physical.'.$mapPhysical->mp_id, $mapPhysicalArray);
            }
            $mapPhysicalData[] = $mapPhysical;
        }
        $mapTechnicals = Map_Technical::where('asset_id', $asset_id)->get();
        foreach($mapTechnicals as $mapTechnical){
            $count = session()->get('technical_asset_count', 1);
            session()->put('technical_asset_count', $count);
            session()->put('technical_asset_count', ++$count);
            $mapTechnicalArray = $mapTechnical->toArray();

            session()->put('map_technical.'.$mapTechnical->mt_id, $mapTechnicalArray);

            $mapTechnicalData[] = $mapTechnical;
        }
        // Get priority
        $priority = Priority::where('asset_id', $asset_id)->first();
        $priorityArray = $priority->toArray();
        if(!session('priority')){
        session()->put('priority', $priorityArray);
        }
        return view('update.update', compact('RIs', 'severityData', 'mapHumanData', 'mapPhysicalData', 'mapTechnicalData', 'priority', 'asset'));
    } 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function uMap($asset_id){
        session(['technical_asset_count' => 0]);
        session(['physical_asset_count' => 0]);
        session(['human_asset_count' => 0]);
        
        // Find the asset
        $asset = Asset::findOrFail($asset_id);
        if(Auth::user()->user_id != '1' && Auth::user()->department != $asset->a_department){
            return redirect('home')->withErrors('Asset inaccessible.');
        }
        $mapHumanData = [];
        $mapPhysicalData = [];
        $mapTechnicalData = [];

        // Get mapping data
        $mapHumans = Map_Human::where('asset_id', $asset_id)->get();
        foreach($mapHumans as $mapHuman){
            $count = session()->get('human_asset_count', 1);
            session()->put('human_asset_count', $count);
            session()->put('human_asset_count', ++$count);
            $mapHumanArray = $mapHuman->toArray();
            if(!session('map_human')){
            session()->put('map_human.'.$mapHuman->mh_id, $mapHumanArray);
            }
            $mapHumanData[] = $mapHuman;
        }
        $mapPhysicals = Map_Physical::where('asset_id', $asset_id)->get();
        foreach($mapPhysicals as $mapPhysical){
            $count = session()->get('physical_asset_count', 1);
            session()->put('physical_asset_count', $count);
            session()->put('physical_asset_count', ++$count);
            $mapPhysicalArray = $mapPhysical->toArray();
            if(!session('map_physical')){
            session()->put('map_physical.'.$mapPhysical->mp_id, $mapPhysicalArray);
            }
            $mapPhysicalData[] = $mapPhysical;
        }
        $mapTechnicals = Map_Technical::where('asset_id', $asset_id)->get();
        foreach($mapTechnicals as $mapTechnical){
            $count = session()->get('technical_asset_count', 1);
            session()->put('technical_asset_count', $count);
            session()->put('technical_asset_count', ++$count);
            $mapTechnicalArray = $mapTechnical->toArray();

            session()->put('map_technical.'.$mapTechnical->mt_id, $mapTechnicalArray);

            $mapTechnicalData[] = $mapTechnical;
        }

        return view('update.uMap', compact( 'mapHumanData', 'mapPhysicalData', 'mapTechnicalData', 'asset'));


    }

    //Set Button
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function set_step1(Request $request){
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
            'user_id' => auth()->user()->user_id,
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
        return back();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function set_step2(Request $request){
        $validatedData = $request->validate([
            'trust' => 'required|string|in:1,2,3,4,5',
            'finance' => 'required|string|in:1,2,3,4,5',
            'productivity' => 'required|string|in:1,2,3,4,5',
            'safety' => 'required|string|in:1,2,3,4,5',
            'fines' => 'required|string|in:1,2,3,4,5',

        ]);
        if (count($validatedData) !== count(array_unique($validatedData)))
        {
            return back()->withErrors(['message' => 'Each priority value must be different from the others! Different Impact Area, different priority.']);
        }
        //ask to forget in case another same session already exist
        $request->session()->forget('priority');
        $request->session()->put('priority', [             
            'trust' => $validatedData['trust'],
            'finance' => $validatedData['finance'],
            'productivity' => $validatedData['productivity'],
            'safety' => $validatedData['safety'],
            'fines' => $validatedData['fines'],

        ]);
        return back()->withInput();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function set_step3($asset_id, Request $request){
        $asset = Asset::findOrFail($asset_id);
        if(Auth::user()->user_id != '1' && Auth::user()->department != $asset->a_department){
            return redirect('home')->withErrors('Asset inaccessible.');
        }
        // Get the input values from the request
  $h_location = $request->input("h_location");
  $h_description = $request->input("h_description");
  $mh_owner = $request->input("mh_owner");
  $p_location = $request->input("p_location");
  $p_description = $request->input("p_description");
  $mp_owner = $request->input("mp_owner");
  $t_location = $request->input("t_location");
  $t_description = $request->input("t_description");
  $mt_owner = $request->input("mt_owner");

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
  // Loop through the input values and create or update the database rows
  for ($i = 0; $i < count($h_location); $i++) {
    // Create a new instance of the Human model
    $human = new Map_Human();

    // Assign the input values to the model attributes
    $human->h_location = $h_location[$i];
    $human->h_description = $h_description[$i];
    $human->mh_owner = $mh_owner[$i];
    $human->asset_id = $asset->asset_id;
    // Save the model to the database
    $human->save();
  }

  // Repeat the same process for the other models
  for ($i = 0; $i < count($p_location); $i++) {
    $physical = new Map_Physical();
    $physical->p_location = $p_location[$i];
    $physical->p_description = $p_description[$i];
    $physical->mp_owner = $mp_owner[$i];
    $physical->asset_id = $asset->asset_id;
    $physical->save();
  }

  for ($i = 0; $i < count($t_location); $i++) {
    $technical = new Map_Technical();
    $technical->t_location = $t_location[$i];
    $technical->t_description = $t_description[$i];
    $technical->mt_owner = $mt_owner[$i];
    $technical->asset_id = $asset->asset_id;
    $technical->save();
  }

  // Redirect to the update route with a success message
  return redirect()->route("update", $asset->asset_id)->with("success", "Mapping Data saved successfully");
    }
//buttons for the add and delete mapping 

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
            $count = $request->session()->get('human_asset_count');
            if($count > 1){
                $count = $request->session()->get('human_asset_count', 1);
                $request->session()->put('human_asset_count', --$count); 
            }
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
            $count = $request->session()->get('physical_asset_count');
            if($count > 1){
                $count = $request->session()->get('physical_asset_count', 1);
                $request->session()->put('physical_asset_count', --$count); 
            }
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
            $count = $request->session()->get('technical_asset_count');
            if($count > 1){
                $count = $request->session()->get('technical_asset_count', 1);
                $request->session()->put('technical_asset_count', --$count); 
            }
            return back()->withInput();
        }
        }
//Continue to the set step-4 until 5

/**
     * Write code on Method
     *
     * @return response()
     */
    public function set_step4(Request $request){
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
        return back()->withInput();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function set_step5(Request $request){
        $validatedData = $request->validate([
            'rep_value' => 'required|string|in:high,medium,low',
            'rep_score' => 'required|string|in:1,2,3,4,5,6,7,8,9,10',
            'financial_value' => 'required|string|in:high,medium,low',
            'financial_score' => 'required|string|in:1,2,3,4,5,6,7,8,9,10',
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
            'financial_value' => $validatedData['financial_value'],
            'financial_score' => $validatedData['financial_score'],
            'productivity_value' => $validatedData['productivity_value'],
            'productivity_score' => $validatedData['productivity_score'],
            'safety_value' => $validatedData['safety_value'],
            'safety_score' => $validatedData['safety_score'],
            'fines_value' => $validatedData['fines_value'],
            'fines_score' => $validatedData['fines_score'],
            'rr_score' =>$validatedData['rr_score']
            
        ]);
        return back()->withInput();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update_save($asset_id,Request $request){
        // Retrieve all of the data from the session
        $asset = Asset::findorFail($asset_id);
        $priority = Priority::findOrFail($asset_id);
        $RI = Risk_Identification::findorFail($asset_id);
        $severity = Severity::where('AoC_id', $RI->AoC_id);

        $assetData = $request->session()->get('asset'); //assetdata
        $priorityData = $request->session()->get('priority'); //priority
        $RIData = $request->session()->get('RI'); //risk_identification
        $severityData = $request->session()->get('severity'); // severity

        // $matchAsset = [
        // 'asset_name' => $assetData['asset_name'],
        // 'asset_desc' => $assetData['asset_desc'],
        // 'owner' => $assetData['owner'],
        // 'a_department' => $assetData['a_department'],
        // 'SR_confidentiality' => $assetData['SR_confidentiality'],
        // 'SR_integrity' => $assetData['SR_integrity'],
        // 'SR_availability' => $assetData['SR_availability'],
        // 'most_important_SR' => $assetData['most_important_SR'],
        // 'rationale_for_select' => $assetData['rationale_for_select'],
        // ];
        $asset->update([ 
        'trust' => $priorityData['trust'],
        'finance' => $priorityData['finance'],
        'productivity' => $priorityData['productivity'],
        'safety' => $priorityData['safety'],
        'fines' => $priorityData['fines'],]);

        // $matchPriority = [
            // 'trust' => $priorityData['trust'],
            // 'finance' => $priorityData['finance'],
            // 'productivity' => $priorityData['productivity'],
            // 'safety' => $priorityData['safety'],
            // 'fines' => $priorityData['fines'],
        // ];
        $priority->update([
            'trust' => $priorityData['trust'],
            'finance' => $priorityData['finance'],
            'productivity' => $priorityData['productivity'],
            'safety' => $priorityData['safety'],
            'fines' => $priorityData['fines'],
        ]);

        // $matchRI = [
            // 'area_of_concern' => $RIData['area_of_concern'],
            // 'actor' => $RIData['actor'],
            // 'objective' => $RIData['objective'],
            // 'motive' => $RIData['motive'],
            // 'result' => $RIData['result'],
            // 'security_needs' => $RIData['security_needs'],
            // 'consequences' => $RIData['consequences'],
            // 'control' => $RIData['control'],
            // 'probability' => $RIData['probability'],
        // ];
        $RI->update([
            'area_of_concern' => $RIData['area_of_concern'],
            'actor' => $RIData['actor'],
            'objective' => $RIData['objective'],
            'motive' => $RIData['motive'],
            'result' => $RIData['result'],
            'security_needs' => $RIData['security_needs'],
            'consequences' => $RIData['consequences'],
            'control' => $RIData['control'],
            'probability' => $RIData['probability']
        ]);

        // $matchSeverity = [
            // 'rep_value' => $severityData['rep_value'],
            // 'rep_score' => $severityData['rep_score'],
            // 'financial_value' => $severityData['financial_value'],
            // 'financial_score' => $severityData['financial_score'],
            // 'productivity_value' => $severityData['productivity_value'],
            // 'productivity_score' => $severityData['productivity_score'],
            // 'safety_value' => $severityData['safety_value'],
            // 'safety_score' => $severityData['safety_score'],
            // 'fines_value' => $severityData['fines_value'],
            // 'fines_score' => $severityData['fines_score'],
            // 'rr_score' =>$severityData['rr_score']
        // ];
        $severity->update([
            'rep_value' => $severityData['rep_value'],
            'rep_score' => $severityData['rep_score'],
            'financial_value' => $severityData['financial_value'],
            'financial_score' => $severityData['financial_score'],
            'productivity_value' => $severityData['productivity_value'],
            'productivity_score' => $severityData['productivity_score'],
            'safety_value' => $severityData['safety_value'],
            'safety_score' => $severityData['safety_score'],
            'fines_value' => $severityData['fines_value'],
            'fines_score' => $severityData['fines_score'],
            'rr_score' =>$severityData['rr_score']
        ]);

        // Forget the session data
        session()->forget(['asset', 'priority', 'severity', 'map_human', 'map_physical', 'map_technical', 'RI']);

        // Redirect to the home route with success message
        return redirect()->route('home')->with('success', 'Asset updated successfully.');
    } 


}