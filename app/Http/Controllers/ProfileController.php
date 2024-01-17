<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Province;
use App\Models\City;
use App\Models\Position;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index() 
    {  
        $profiles = Profile::latest()->paginate(5);
        return view('profiles.index', compact('profiles'));  
    }

    public function create()
    {  
        $provinces = Province::get();
        $cities = City::get();
        $jobPositions = Position::get();
        return view('profiles.create',compact('provinces','cities','jobPositions'));  
    }

    public function show(Request $request){
        if ($request->ProvinceId) {
            $cities = City::where('province_id', $request->ProvinceId)->get();
            if ($cities) {
                return response()->json(['status' => 'success', 'data' => $cities], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No cities found'], 404);
        }
        return response()->json(['status' => 'failed', 'message' => 'Please select province'], 500);
    }

    public function getCities(Request $request) {
        if ($request->ProvinceId) {
            $cities = City::where('province_id', $request->ProvinceId)->get();
            if ($cities) {
                return response()->json(['status' => 'success', 'data' => $cities], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No cities found'], 404);
        }
        return response()->json(['status' => 'failed', 'message' => 'Please select province'], 500);
    }

    public function store(Request $request)
    {  
        $this->validate($request, [  
            'first_name' => 'required',  
            'last_name' => 'required',  
            "email_address" => "required|email:ends_with:.com,.in",
            'phone_number' => 'required|numeric',
            'ktp_number' => 'required|numeric'
        ]);  
   
        $profile = Profile::create([  
            'first_name' => $request->get('first_name'),  
            'last_name' => $request->get('last_name'),  
            'birth_date' => $request->get('birth_date'),
            'email_address' => $request->get('email_address'),
            'phone_number' => $request->get('phone_number'), 
            'province_address'=> $request->get('province_address'),
            'city_address' => $request->get('city_address'),
            'street_address' => $request->get('street_address'),
            'zip_code' => $request->get('zip_code'), 
            'ktp_number' => $request->get('ktp_number'), 
            'current_position_bank_account' => $request->get('current_position'),
            'bank_account' => $request->get('bank_account') 
        ]);  

        return redirect()->route('profile.index')->with('success', 'Data profile has been created successfully.');  
    }

    public function edit(Profile $profile) 
    {  
        $provinces = Province::get();
        $cities = City::get();
        $jobPositions = Position::get();
        return view('profiles.edit',compact('profile','provinces','cities','jobPositions'));  
    }

    public function update(Request $request, $id){
        $this->validate($request, [  
            'first_name' => 'required',  
            'last_name' => 'required',  
            "email_address" => "required|email:ends_with:.com,.in",
            'phone_number' => 'required|numeric',
            'ktp_number' => 'required|numeric'
        ]);  
        
        $profile = Profile::find($id);
        $profile->update([  
            'first_name' => $request->get('first_name'),  
            'last_name' => $request->get('last_name'),  
            'birth_date' => $request->get('birth_date'),
            'email_address' => $request->get('email_address'),
            'phone_number' => $request->get('phone_number'), 
            'province_address'=> $request->get('province_address'),
            'city_address' => $request->get('city_address'),
            'street_address' => $request->get('street_address'),
            'zip_code' => $request->get('zip_code'), 
            'ktp_number' => $request->get('ktp_number'), 
            'current_position_bank_account' => $request->get('current_position'),
            'bank_account' => $request->get('bank_account') 
        ]);  

        return redirect()->route('profile.index')->with('success', 'Data profile has been updated successfully.');  
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
         
        return redirect()->route('profile.index')->with('success','Profile deleted successfully');
    }
}
