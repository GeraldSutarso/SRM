<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); //check the remember box
        if (Auth::attempt($credentials,$remember)) {
            return redirect("home")->withSuccess('You have Successfully loggedin');

        }
  
        return back()->withErrors(['errorLogin' => 'Oops! You have entered invalid credentials']);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'department' =>'required'
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        $remember = $request->filled('remember'); //check the remember box
        return redirect("home")->withSuccess('Great! You have Successfully signed in');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function home(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $request->session()->forget([
                //reset the database session
                'asset','priority','severity','map_human','map_physical','map_technical','RI',
                //reset the container mapping count session
                'technical_asset_count','physical_asset_count','human_asset_count'
                ]);
            return view('home')->with('user',$user);
        }
    // Check if the current URL is one of the step pages
    // $currentUrl = request()->path();
    // $steps = ['/add/step-1', '/add/step-2', '/add/step-3', '/add/step-4', '/add/step-5'];
    // if (in_array($currentUrl, $steps)) {
    //     // Set a session variable to trigger the alert
    //     session(['show_alert' => true]);
    // }
        Session::flush();
        return redirect('login')->withErrors(['errorHome' => 'You have no access']);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      $user = User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'department' => $data['department']

      ]);
      //Log in the user
      Auth::login($user);
      return $user;
    
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}