<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UsersListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $user = User::all();

            return Datatables::of($user)
                ->addColumn('is_approve', function ($user) {
                    return $user->is_approve ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>';
                })
                ->addColumn('action', function ($user) {
                    return view('shared.dtcontrols')
                        ->with('id', $user->id)
                        ->with('editUrl', route('users.edit', $user->id))
                        ->with('deleteUrl', route('users.destroy', $user->id))
                        ->render();
                })
                ->rawColumns(['is_approve', 'action'])
                ->make(true);
        }

        return view('admin.userlist');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return view('admin.deleteuser', ['user' => User::find($user->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::select('id', 'name', 'is_approve')
            ->where('id', $user->id)
            ->first();

        return view('admin.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $isapprove = ($request->isapprove == '1') ? '1' : '0';

        $user = User::find($request->user->id);
        $user->name = $request->name;
        $user->is_approve = $isapprove;
        $user->save();

        session()->flash('success', 'Update Successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'Deleted Successfully.');
        return redirect()->route('users.index');
    }
}
