<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory(){

        $data['allData']=FeeCategory::alL();
        return view('backend.setup.fee_category.view_fee_category',$data);
    }

    public function FeeCategoryAdd(){
        return view('backend.setup.fee_category.add_fee_category');
    }

    public function StoreFeeCategory(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Student Fee Category Inserted Successfully',
            'alert-type' =>'success',
        );
        return redirect()->route('fee.category.view')->with($notification);
    }


    public function FeeCategoryEdit($id){
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category',compact('editData'));

    }


    public function FeeCategoryUpdate(Request $request,$id){
        $data = FeeCategory::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id
        ]);


        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Student Fee Category Updated Successfully',
            'alert-type' =>'success',
        );
        return redirect()->route('fee.category.view')->with($notification);
    }


    public function FeeCategoryDelete($id){
        $user = FeeCategory::find($id);
        $user->delete();
        $notification = array(
            'message' =>'Student Fee Category deleted Successfully',
            'alert-type' =>'info',
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
}
