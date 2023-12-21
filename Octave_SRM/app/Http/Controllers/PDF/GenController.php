<?php
  
namespace App\Http\Controllers\PDF;
  
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
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class GenController extends Controller{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show($asset_id)
    {
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
            if($RI->probability == 'high' && $severity->rr_score >= 30){
                $matrix =   '(Category 1) Mitigate';
            }
            else if($RI->probability == 'medium' && $severity->rr_score >= 30){
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
            else if($RI->probability == 'low' && $severity->rr_score >= 30){
                $matrix =   '(Category 3) Postpone/Accept';
            }
            else if($RI->probability == 'high' && $severity->rr_score <= 15){
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
            else if($RI->probability == 'medium' && $severity->rr_score <= 15){
                $matrix =   '(Category 3) Postpone/Accept';
            }
            else if($RI->probability == 'low' && $severity->rr_score <= 15){
                $matrix =   '(Category 4) Accept';
            }
            else if($RI->probability == 'low' && 29 >= $severity->rr_score && $severity->rr_score >= 16){
                $matrix =   '(Category 3) Postpone/Accept';
            }
            else if($RI->probability == 'medium' && 29 >= $severity->rr_score && $severity->rr_score >= 16){              
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
            else if($RI->probability == 'high' && 29 >= $severity->rr_score && $severity->rr_score >= 16){              
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
        }
    }

    // Get mapping data
    $mapHumans = Map_Human::where('asset_id', $asset_id)->get();
    foreach($mapHumans as $mapHuman){
        $mapHumanData[] = $mapHuman;
    }
    $mapPhysicals = Map_Physical::where('asset_id', $asset_id)->get();
    foreach($mapPhysicals as $mapPhysical){
        $mapPhysicalData[] = $mapPhysical;
    }
    $mapTechnicals = Map_Technical::where('asset_id', $asset_id)->get();
    foreach($mapTechnicals as $mapTechnical){
        $mapTechnicalData[] = $mapTechnical;
    }

    // Get priority
    $priority = Priority::where('asset_id', $asset_id)->first();

    // Pass all the data to the view
    return view('show.show', compact('matrix','RIs', 'severityData', 'mapHumanData', 'mapPhysicalData', 'mapTechnicalData', 'priority', 'asset'));
}
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function genPDF($asset_id)
    {

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
            if($RI->probability == 'high' && $severity->rr_score >= 30){
                $matrix =   '(Category 1) Mitigate';
            }
            else if($RI->probability == 'medium' && $severity->rr_score >= 30){
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
            else if($RI->probability == 'low' && $severity->rr_score >= 30){
                $matrix =   '(Category 3) Postpone/Accept';
            }
            else if($RI->probability == 'high' && $severity->rr_score <= 15){
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
            else if($RI->probability == 'medium' && $severity->rr_score <= 15){
                $matrix =   '(Category 3) Postpone/Accept';
            }
            else if($RI->probability == 'low' && $severity->rr_score <= 15){
                $matrix =   '(Category 4) Accept';
            }
            else if($RI->probability == 'low' && 29 >= $severity->rr_score && $severity->rr_score >= 16){
                $matrix =   '(Category 3) Postpone/Accept';
            }
            else if($RI->probability == 'medium' && 29 >= $severity->rr_score && $severity->rr_score >= 16){              
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
            else if($RI->probability == 'high' && 29 >= $severity->rr_score && $severity->rr_score >= 16){              
                $matrix =   '(Category 2) Mitigate/Postpone';
            }
        }
    }

    // Get mapping data
    $mapHumans = Map_Human::where('asset_id', $asset_id)->get();
    foreach($mapHumans as $mapHuman){
        $mapHumanData[] = $mapHuman;
    }
    $mapPhysicals = Map_Physical::where('asset_id', $asset_id)->get();
    foreach($mapPhysicals as $mapPhysical){
        $mapPhysicalData[] = $mapPhysical;
    }
    $mapTechnicals = Map_Technical::where('asset_id', $asset_id)->get();
    foreach($mapTechnicals as $mapTechnical){
        $mapTechnicalData[] = $mapTechnical;
    }

    // Get priority
    $priority = Priority::where('asset_id', $asset_id)->first();
    $excludeNavbar = true;
    // Load the view and pass the data to generate the PDF
    $pdf = PDF::loadView('show.show', compact('matrix','RIs', 'severityData', 'mapHumanData', 'mapPhysicalData', 'mapTechnicalData', 'priority', 'asset', 'excludeNavbar'));

    // Download the PDF file
    return $pdf->download($asset->asset_name .'_asset_report.pdf');
    return redirect()->route('home')->withSuccess('Successfully generated the pdf');
    }  
}