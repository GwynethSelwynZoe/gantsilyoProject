<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Update the namespace to point to your Customer model
use Hash;
use Session;
use Illuminate\Support\Str; // Add this line for using Str class
use Mail; // Add this line for using Mail class

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }

    public function registerUser(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'un' => 'required',
            'pw' => 'required',
            'contactno' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email|unique:customers,email', // Assuming 'customers' table for Customer model
            'img' => 'required', // Adjust validation rules for image upload as needed
        ]);

        $customer = new Customer();
        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->un = $request->un;
        $customer->pw = Hash::make($request->pw);
        $customer->contactno = $request->contactno;
        $customer->address = $request->address;
        $customer->email = $request->email;

        // Handle file upload for the image (assuming storage/app/public/img directory)
        $imagePath = $request->file('img')->store('public/img');
        $customer->img = $imagePath;

        $res = $customer->save();
        if($res){
            return back()->with('success', 'You have registered successfully. Please check your email for confirmation.');
        }else{
            return back()->with('failed', 'Something went wrong, please check credentials');
        }
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'un' => 'required',
            'pw' => 'required'
        ]);
    
        $customer = Customer::where('un', $request->un)->first(); // Assuming 'un' is the username field in the database
        if($customer){
            if(Hash::check($request->pw, $customer->pw)){ // Assuming 'pw' is the hashed password field in the database
                $request->session()->put('loginId', $customer->id);
                return redirect()->route('homepage'); // Redirect to the homepage route
            } else {
                return back()->with('failed', 'Password does not match');
            }
        } else {
            return back()->with('failed', 'This username does not exist.');
        }
    }
    
    public function homepage()
    {
        // Check if the user is logged in
        if(session()->has('loginId')){
            return "Welcome to Home Page.";
        } else {
            return redirect()->route('login-user')->with('failed', 'Please login to access the homepage.');
        }
    }

}
