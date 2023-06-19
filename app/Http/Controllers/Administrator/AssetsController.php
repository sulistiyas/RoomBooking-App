<?php

namespace App\Http\Controllers\Administrator;

use Exception;
use App\Models\Assets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // use Alert;
    public function index()
    {

        // Read data
        // toast('Your Post as been submited!','success');
        $id = Auth::user()->id;
        $assets = DB::table('assets')->where('deleted_at', '=', NULL)->get();
        return view('admin.content.assets.asset-master', ['assets' => $assets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.assets.assets-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'asset_name'    => 'required'
            ]);

            Assets::create([
                'asset_name'    => $request->asset_name,
                'status'        => "Normal"
            ]);

            return redirect()->route('asset-view')->with('success', 'Asset Created Successfully!');
        } catch (\Exception $e) {
            // echo $e;
            return redirect()->route('asset-form')->with('fail', 'Failed to Create Asset!');
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
        $assets = Assets::findOrFail($id);

        return view('admin.content.assets.asset-edit', ['assets' => $assets]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $this->validate($request, [
                'asset_name'    => 'required',
                'status'        => 'required'
            ]);

            $assets = Assets::findOrFail($id);

            $assets->update([
                'asset_name'    => $request->asset_name,
                'status'        => $request->status
            ]);



            return redirect()->route('asset-view')->with(['success' => 'Data Successfully Changed']);
        } catch (Exception $e) {
            // echo $e;
            return redirect()->route('asset-view')->with(['fail' => 'Failed to Update Data']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $assets = Assets::findOrFail($id);
            $assets->delete();

            return redirect()->route('asset-view')->with(['success' => 'Delete Data Success']);
        } catch (\Exception $e) {
            // echo $e;
            return redirect()->route('asset-view')->with(['fail' => 'Failed to Delete Data']);
        }
    }
}
