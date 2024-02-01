<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoom;


class ClassRoomController extends Controller
{
    public function ViewClassRoom()
    {
        $data['allData'] = ClassRoom::all();
        return view('backend.setup.class_room.view_class_room', $data);
    }
    public function ClassRoomAdd()

    {
        return view('backend.setup.class_room.add_class_room');
    }
    public function StoreClassRoom(Request $request)
    {
        $validateData = $request->validate([
            'building_name' => 'required',
            'floor_name' => 'required',
            'room_no' => 'required|unique:class_rooms,room_no',
            'capacity' => 'required',
            'type' => 'required',
        ]);
        $data = new ClassRoom();
        $data->building_name = $request->building_name;
        $data->floor_name = $request->floor_name;
        $data->room_no = $request->room_no;
        $data->capacity = $request->capacity;
        $data->type = $request->type;
        $data->save();
        $notification = array(
            'message' => 'Class Room Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('class.room.view')->with($notification);
    }
    public function ClassRoomEdit($id)
    {
        $editData = ClassRoom::find($id);
        return view('backend.setup.class_room.edit_class_room', compact('editData'));
    }
    public function ClassRoomUpdate(Request $request, $id)
    {
        $data = ClassRoom::find($id);
        $validateData = $request->validate([
            'building_name' => 'required',
            'floor_name' => 'required',
            'room_no' => 'required|unique:class_rooms,room_no,'.$data->id,
            'capacity' => 'required',
            'type' => 'required',
        ]);
        $data->building_name = $request->building_name;
        $data->floor_name = $request->floor_name;
        $data->room_no = $request->room_no;
        $data->capacity = $request->capacity;
        $data->type = $request->type;
        $data->save();
        $notification = array(
            'message' => 'Class Room Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('class.room.view')->with($notification);
    }
    public function ClassRoomDelete($id)
    {
        $user = ClassRoom::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Class Room Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('class.room.view')->with($notification);
    }
}
