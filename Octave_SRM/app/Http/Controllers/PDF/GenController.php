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
    $mapHumanData = Map_Human::where('asset_id', $asset_id)->get();
    $mapPhysicalData = Map_Physical::where('asset_id', $asset_id)->get();
    $mapTechnicalData = Map_Technical::where('asset_id', $asset_id)->get();

    // Get priority
    $priority = Priority::where('asset_id', $asset_id)->first();

    // Find the asset
    $asset = Asset::findOrFail($asset_id);

    // Pass all the data to the view
    return view('show.show', compact('RIs', 'severityData', 'mapHumanData', 'mapPhysicalData', 'mapTechnicalData', 'priority', 'asset'));
}
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function genPDF($asset_id)
    {
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
    $mapHumanData = Map_Human::where('asset_id', $asset_id)->get();
    $mapPhysicalData = Map_Physical::where('asset_id', $asset_id)->get();
    $mapTechnicalData = Map_Technical::where('asset_id', $asset_id)->get();

    // Get priority
    $priority = Priority::where('asset_id', $asset_id)->first();

    // Find the asset
    $asset = Asset::findOrFail($asset_id);
    $excludeNavbar = true;
    // Load the view and pass the data to generate the PDF
    $pdf = PDF::loadView('show.show', compact('RIs', 'severityData', 'mapHumanData', 'mapPhysicalData', 'mapTechnicalData', 'priority', 'asset', 'excludeNavbar'));

    // Download the PDF file
    return $pdf->download($asset->asset_name .'_asset_report.pdf');
    }  
}