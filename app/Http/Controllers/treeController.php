<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class treeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function buildTreeData($user, &$treeData)
    {
        $children = $user->children;

        foreach ($children as $child) {
            $treeData[] = [
                'id' => $child->id,
                'parent' => $user->id,
                'text' => $child->name.' '.$child->last_name,
                // دیگر اطلاعاتی که می‌خواهید نمایش دهید
            ];
            $this->buildTreeData($child, $treeData);
        }
    }
    public function index()
    {
        $rootUsers = User::where('id', Auth::id())->get();
        $treeData = [];
        foreach ($rootUsers as $rootUser){
            $treeData[] = [
              'id' => $rootUser->id,
              'parent' => '#',
              'text' => $rootUser->name,
            ];
            $this->buildTreeData($rootUser,$treeData);
        }
        return view('tree',compact('treeData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
}
