<?php
  
namespace App\Http\Controllers\CRUD;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Asset;
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
        // $validatedData = $request->validate([
        //     'asset_name' => 'required',
        //     'asset_desc' => 'required',
        //     'rationale_for_select' => 'required',
        //     'SR_confidentiality' => 'required',
        //     'SR_integrity' => 'required',
        //     'SR_availability' => 'required',
        //     'most_important_SR' => 'required'
        // ]);
        // $asset = new Asset($validatedData);

        // // Assign the authenticated user's ID to the user_id foreign key
        // $asset->user_id = auth()->id();
    
        // // Save the new asset
        // $asset->save();
    
        // // Redirect or return response
        // return redirect()->route('add.step2')->with('success', 'Asset created successfully.');
        // Validate the request data
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

        // Store the validated data in the session
        $request->session()->put('asset', [
            'user_id' => auth()->id(), // Get the authenticated user's ID
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

    // Check if the session data exists
    if ($assetData) {
        // Create a new Asset instance and fill it with the session data
        $asset = new Asset($assetData);
        // Save the new asset to the database
        $asset->save();
        // Clear the session data for 'asset'
        $request->session()->forget('asset');
        // Redirect or return response
        return redirect()->route('assets.index')->with('success', 'Asset created successfully from session data.');
    } else {
        // Handle the case where there is no session data
        return redirect()->route('step1')->with('error', 'No asset data found in session.');
    }
    }

    
}