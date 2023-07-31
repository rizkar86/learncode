<?php
namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    public function __contractor()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        $tracks = $user->tracks;
        return view('profile', compact('user', 'tracks'));
    }
   // function to update user profile by route
  /*   public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id )->first();
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2',  Rule::unique('users')->ignore(Auth::user()->id),],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(Auth::user()->id),],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);

        $user->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ]);

        if($file = $request->file('photo')){
            $extension = $file->getClientOriginalExtension();
            $fileName = $user->username.'_'.time().'.'. $extension;  
            if($file->move(public_path('img/users/'), $fileName))
            {              
                if($user->photo){
                    if(file_exists(public_path('img/users/'.$user->photo->filename)))
                        unlink(public_path('img/users/'.$user->photo->filename));
                    $user->photo->filename = $fileName;
                    $user->photo->save();
                }
                else
                {
                    Photo::create([
                        'filename' => $fileName,
                        'photoable_id' => $user->id,
                        'photoable_type' => 'App\Models\Course',
                    ]);
                }         
            }
        }
        return back()->with('success', 'Profile succesfully updated'); 
    } */
       // function to update user profile by ajax
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id )->first();
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2',  Rule::unique('users')->ignore(Auth::user()->id),],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(Auth::user()->id),],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);
        $user->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ]);
        if($file = $request->file('photo'))
        {
            $extension = $file->getClientOriginalExtension();
            $fileName = $user->username.'_'.time().'.'. $extension;  
            if($file->move(public_path('img/users/'), $fileName))
            {              
                if($user->photo){
                    if(file_exists(public_path('img/users/'.$user->photo->filename)))
                        unlink(public_path('img/users/'.$user->photo->filename));
                    $user->photo->filename = $fileName;
                    $user->photo->save();
                }
                else
                {
                    Photo::create([
                        'filename' => $fileName,
                        'photoable_id' => $user->id,
                        'photoable_type' => 'App\Models\Course',
                    ]);
                }         
            }
        }
        return response()->json(['success' => 'Profile succesfully updated']); 
    }
}
