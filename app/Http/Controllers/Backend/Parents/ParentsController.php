<?php

namespace App\Http\Controllers\Backend\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ParentsController extends Controller
{
    public function ParentsView()
    {
        $data['allData'] = User::where('usertype', 'Parents')->get();
        return view('backend.parents.parents_reg.parents_view', $data);
    }

    public function ParentsAdd()
    {
        return view('backend.parents.parents_reg.parents_add');
    }

    public function ParentsStore(Request $request)
    {       $validateData = $request->validate([
                'email' => 'required|unique:users',
                 'name' => 'required',
              ]);
            
            $user = new User();
            $code = rand(0000, 9999);
            $user->password = bcrypt($code);
            $user->usertype = 'Parents';
            $user->code = $code;
            $user->role = 'Parents';
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->occupation = $request->occupation;
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
        $notification = array(
            'message' => 'Parents Registration Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('parents.registration.view')->with($notification);
    } // END Method
    public function ParentsEdit($id)
    {
        $data['editData'] = User::find($id);
        // dd($data['editData']->toArray() );
        return view('backend.parents.parents_reg.parents_edit', $data);
    }

    public function ParentsUpdate(Request $request, $id)
    {      
            $user = User::find($id);
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->occupation = $request->occupation;
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();
        $notification = array(
            'message' => 'Parents Registration Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('parents.registration.view')->with($notification);
    } // END Method
    public function ParentsDelete($id)
    {
        $user = User::find($id)->delete();
        $notification = array(
            'message' => 'Parents Data Deleted  Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }
}
