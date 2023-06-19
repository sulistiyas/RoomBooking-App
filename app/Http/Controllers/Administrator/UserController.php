<?php

namespace App\Http\Controllers\Administrator;

use App\Models\User;
use App\Models\DetilUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;

use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Read Users & DetailUser Data
        $users = DB::table('users')
            ->select('*', 'users.id as user_id')
            ->leftJoin('detail_user', 'users.id', '=', 'detail_user.id_user')
            ->where('users.deleted_at', '=', NULL)
            ->where('detail_user.deleted_at', '=', NULL)
            ->get();

        return view('admin.content.users.user-master', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.users.user-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            $this->validate($request, [
                'name'              =>  'required',
                'company'           =>  'required',
                'phoneNumber'       =>  'required',
                'division'          =>  'required',
                'level'             =>  'required',
                'email'             =>  'required',
                'password'          =>  'required'
            ]);

            User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'level'             => $request->level,
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ]);

            $user = DB::table('users')->select('id')->orderBy('id', 'asc')->get();
            foreach ($user as $users_id) {
                $ids = $users_id->id;
            }
            DetilUser::create([
                'id_user'       => $ids,
                'division'      => $request->division,
                'company'       => $request->company,
                'phone_number'  => $request->phoneNumber,
                'status'        => 'Active',
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
            ]);

            return redirect()->route('user-view')->with('success', 'Data Created Successfully!');
        } catch (Exception $e) {
            // echo $e;
            return redirect()->route('user-form')->with('fail', 'Failed to Create New User!!');
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
        // $users = DB::table('users')
        //     ->leftJoin('detail_user', 'users.id', '=', 'detail_user.id_user')
        //     ->where('users.id', '=', $id)
        //     ->get();

        $users = User::findOrFail($id);
        $detilUsers = DetilUser::where('id_user', '=', $id)->first();
        return view('admin.content.users.user-edit', compact('users', 'detilUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $users = User::findOrFail($id);
            $detilUsers = DetilUser::where('id_user', '=', $id)->first();

            $this->validate($request, [
                'name'              =>  'required',
                'company'           =>  'required',
                'phoneNumber'       =>  'required',
                'division'          =>  'required',
                'level'             =>  'required',
                'email'             =>  'required',

            ]);

            if (!empty($request->input('password'))) {

                $users->update([
                    'name'              => $request->name,
                    'email'             => $request->email,
                    'password'          => Hash::make($request->password),
                    'level'             => $request->level,
                    'remember_token'    => NULL,
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s')
                ]);

                $detilUsers->update([
                    'division'      => $request->division,
                    'company'       => $request->company,
                    'phone_number'  => $request->phoneNumber,
                    'status'        => 'Active',
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s')
                ]);
            } else {
                $users->update([
                    'name'              => $request->name,
                    'email'             => $request->email,
                    'level'             => $request->level,
                    'remember_token'    => NULL,
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s')
                ]);

                $detilUsers->update([
                    'division'      => $request->division,
                    'company'       => $request->company,
                    'phone_number'  => $request->phoneNumber,
                    'status'        => 'Active',
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s')
                ]);
            }




            return redirect()->route('user-view')->with(['success' => 'Data Successfully Changed']);
        } catch (Exception $e) {
            // echo $e;
            return redirect()->route('user-view')->with(['fail' => 'Failed to Change Data']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $users = User::findOrFail($id);
            $detilUsers = DetilUser::where('id_user', '=', $id)->first();
            $users->delete();
            $detilUsers->delete();

            return redirect()->route('user-view')->with(['success' => 'Delete Data Success!']);
        } catch (\Throwable $e) {
            // echo $e;
            return redirect()->route('user-view')->with(['fail' => 'Failed to Delete Data']);
        }
    }
}
