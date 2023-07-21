<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function divisionView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.view_division',compact('divisions'));
    }//end method

    public function divisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',                      
        ]);       

        ShipDivision::insert([                      
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method

     //division edit view page
     public function divisionEdit($id){
        $divisionEdit = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('divisionEdit'));
    }//end method

    //Division update 
    public function updateDivision(Request $request, $id){
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,           
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-division')->with($notification);
    }//end method

    //Division delete
    public function divisionDelete($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }//end method

    // start shipping district.........................................
    public function districtView(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();
        return view('backend.ship.district.view_district',compact('division','district'));
    }//end method

    //district store
    public function districtStore(Request $request){
        $request->validate([
            'division_id' => 'required',                      
            'district_name' => 'required',                      
        ]);       

        ShipDistrict::insert([                      
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method

    //District edit view page
    public function districtEdit($id){        
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('district','division'));
    }//end method

    //district update 
    public function updateDistrict(Request $request, $id){
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,            
        ]);
        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }//end method

    //district delete
    public function districtDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }//end method

    // end shipping district..................................

    // start shipping state..................................
    public function stateView(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::with('division','district')->orderBy('id','DESC')->get();
        return view('backend.ship.state.view_state',compact('division','district','state'));
    }

    //js function for getting District
    public function getDistrict($division_id){
        $getdistrict = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($getdistrict);
    }

    //js function for getting state
    public function getState($district_id){
        $getstate = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($getstate);
    }

    //state store
    public function stateStore(Request $request){
        $request->validate([
            'division_id' => 'required',                      
            'district_id' => 'required',                      
            'state_name' => 'required',                      
        ]);       

        ShipState::insert([                      
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method

    //edit state
    public function stateEdit($id){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.ship.state.edit_state',compact('division','district','state'));
    }//end method

    //update state
    public function updateState(Request $request, $id){
        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,            
            'state_name' => $request->state_name,            
        ]);
        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-state')->with($notification);
    }//end method

    //district delete
    public function stateDelete($id){
        ShipState::findOrFail($id)->delete();
        $notification = array(
            'message' => 'State Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }//end method

    // end shipping state..................................


}
