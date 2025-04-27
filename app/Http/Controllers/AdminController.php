<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    public function index(){
        $adminName = auth()->user()->name; 
    
        return view('index', ['adminName' => $adminName]);
        
    }
    public function AdminProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        //dd($adminData);
        return view('backend.admin.profile',compact('adminData'));

    } // End Mehtod 



    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $user = Auth::user();
    
        // Update basic fields
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
    
        // Handle profile photo upload using Intervention Image
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
    
            // Delete old image if exists
            if ($user->photo && File::exists(public_path('uploads/admin/' . $user->photo))) {
                File::delete(public_path('uploads/admin/' . $user->photo));
            }
    
            // Resize and save the image using Intervention
            $manager = new ImageManager(new GdDriver());
            $image = $manager->read($file->getPathname());
            $image->resize(300, 300)->save(public_path('uploads/admin/' . $filename));
    
            $user->photo = $filename;
        }
    
        $user->save();

        $notification = [
            'message' => 'Profile updated successfully!!',
            'alert-type' => 'success'
        ];
    
        return redirect()->back()->with($notification);
    
        
    }
    
}
