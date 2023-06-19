<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomAsset;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = DB::table('rooms')->where('deleted_at', '=', NULL)->get();

        return view('admin.content.rooms.room-master', ['room' => $room]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.rooms.room-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'room_name'         => 'required',
                'capacity'          => 'required',
                'photo_path_1'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'photo_path_2'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'photo_path_3'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'photo_path_4'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);



            // Image 1
            $image_1                = $request->file('photo_path_1');
            $filename_1             = time() . '_1.' . $image_1->getClientOriginalExtension();
            $image_1->move(public_path('images/room_pict'), $filename_1);
            // Image 2
            $image_2                = $request->file('photo_path_2');
            $filename_2             = time() . '_2.' . $image_2->getClientOriginalExtension();
            $image_2->move(public_path('images/room_pict'), $filename_2);
            // Image 3
            $image_3                = $request->file('photo_path_3');
            $filename_3             = time() . '_3.' . $image_3->getClientOriginalExtension();
            $image_3->move(public_path('images/room_pict'), $filename_3);
            // Image 4
            $image_4                = $request->file('photo_path_4');
            $filename_4             = time() . '_4.' . $image_4->getClientOriginalExtension();
            $image_4->move(public_path('images/room_pict'), $filename_4);

            // $insert = $request->all();

            // Room::create($insert);

            Room::create([
                'room_name'         => $request->room_name,
                'capacity'          => $request->capacity,
                'photo_path_1'      => $filename_1,
                'photo_path_2'      => $filename_2,
                'photo_path_3'      => $filename_3,
                'photo_path_4'      => $filename_4
            ]);
            return redirect()->route('room-view')->with('success', 'Room Created Successfully!');
            // Alert::error('Failed', 'Failed to Insert new Data');
        } catch (\Throwable $th) {
            // echo $th;
            return redirect()->route('room-form')->with('fail', 'Failed to create Room');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::findOrFail($id);
        return view('admin.content.rooms.room-edit', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // Room Asset Function
    public function asset_view()
    {
        // Fetch in List group by Room ID
        $room_asset = DB::table('room_assets')
            ->select('*', 'room_assets.id as ids')
            ->join('rooms', 'room_assets.room_id', '=', 'rooms.id')
            ->join('assets', 'room_assets.assets_id', '=', 'assets.id')
            ->where('room_assets.deleted_at', '=', NULL)
            ->groupBy('room_assets.room_id')
            ->get();


        // Fetch for Modal View Filtered per Room ID

        // $fetch_modal = DB::table('room_assets')
        //     ->join('rooms', 'room_assets.room_id', '=', 'rooms.id')
        //     ->join('assets', 'room_assets.assets_id', '=', 'assets.id')
        //     ->where('room_assets.deleted_at', '=', NULL)
        //     ->get();

        return view('admin.content.room_assets.room-assets', ['room_asset' => $room_asset]);
    }

    public function create_room_asset()
    {
        $room_data  = DB::table('rooms')->where('deleted_at', '=', NULL)->get();
        $asset_data = DB::table('assets')->where('deleted_at', '=', NULL)->get();


        return view('admin.content.room_assets.room-assets-form', compact('room_data', 'asset_data'));
    }

    public function store_room_asset(Request $request)
    {
        try {
            $this->validate($request, [
                'id_room'      => 'required',
                'id_asset'     => 'required',
                'asset_qty'    => 'required'
            ]);

            RoomAsset::create([
                'room_id'       => $request->id_room,
                'assets_id'     => $request->id_asset,
                'assets_qty'    => $request->asset_qty
            ]);

            return redirect()->route('room-asset-create')->with('success', 'Data Created Successfully!');
        } catch (\Throwable $th) {
            echo $th;
            // return redirect()->route('room-asset-create')->with('fail', 'Failed to Create Data!');
        }
    }

    public function edit_room_asset(string $id)
    {
        $room_asset = RoomAsset::findOrFail($id);
        $fetch_data = DB::table('room_assets')
            ->select('*', 'room_assets.id as ids')
            ->join('rooms', 'room_assets.room_id', '=', 'rooms.id')
            ->join('assets', 'room_assets.assets_id', '=', 'assets.id')
            ->where('room_assets.deleted_at', '=', NULL)
            ->where('room_assets.id', '=', $id)
            ->get()->first();

        return view('admin.content.room_assets.room-assets-edit', compact('room_asset', 'fetch_data'));
    }

    public function update_room_asset(Request $request, string $id)
    {
        try {
            $this->validate($request, [
                'assets_qty'    => 'required'
            ]);

            $assets = RoomAsset::findOrFail($id);

            $assets->update([
                'assets_qty'    => $request->assets_qty
            ]);



            return redirect()->route('room-asset')->with(['success' => 'Data Successfully Changed']);
        } catch (\Exception $e) {
            echo $e;
            // return redirect()->route('room-asset')->with(['fail' => 'Failed to Update Data']);
        }
    }

    public function destroy_room_asset(string $id)
    {
        try {
            $room_asset = RoomAsset::findOrFail($id);
            $room_asset->delete();

            return redirect()->route('room-asset')->with(['success' => 'Delete Data Success']);
        } catch (\Exception $e) {
            echo $e;
            // return redirect()->route('room-asset')->with(['fail' => 'Failed to Delete Data']);
        }
    }
}
