<?php
  
namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
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

class HomeController extends Controller{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function home(Request $request)
    {
        if(!Auth::check()){//if not logged in yet, the flush the session, in case some of the steps session stays
                            // then redirect to the login page, or the sign in page
            Session::flush();
            return redirect('login')->withErrors(['errorHome' => 'You have no access']);

        }

        $user = Auth::user();
        $request->session()->forget([
        //reset the database session
        'asset','priority','severity','map_human','map_physical','map_technical','RI',
        //reset the container mapping count session
        'technical_asset_count','physical_asset_count','human_asset_count'
        ]);
        //if the user is an admin, show all of the critical asset
        if($user->user_id =='1'){    
            $assets = Asset::paginate(10);
        }//if not an admin, then only show the asset of their respective department
        else{
            $assets = Asset::where('a_department', $user->department)->paginate(10);
        }
        return view('home', ['assets' => $assets, 'user' => $user]);;
    }
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function search(Request $request)
    {//the search button
        $searchTerm = $request->input('search');
        if(Auth::user()->user_id == 1){
        $assets = Asset::where('asset_name', 'LIKE', "%{$searchTerm}%")//find asset name or department or when is it created or even the id
                            ->orWhere('a_department', 'LIKE', "%{$searchTerm}%")//which has the same character as the inputted word
                            ->orWhere('created_at', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('asset_id','LIKE',"%{$searchTerm}%")
                            ->paginate(10);
        }
        else{
            $asset = Asset::where('a_department',  Auth::user()->department);
            $assets = $asset->where('asset_name', 'LIKE', "%{$searchTerm}%")
                                ->orWhere('a_department', 'LIKE', "%{$searchTerm}%")
                                ->orWhere('created_at', 'LIKE', "%{$searchTerm}%")
                                ->orWhere('asset_id','LIKE',"%{$searchTerm}%")
                                ->paginate(10);
            }

        return view('home', compact('assets'));//then send that data to the home page, which will be shown there
    }
}