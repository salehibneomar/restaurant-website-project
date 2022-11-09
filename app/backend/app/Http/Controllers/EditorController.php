<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $editors = Editor::query();
        if($request->has('q') && $request->filled('q')){
            $q = $request->q;
            $editors = $editors->where('phone',  'LIKE', '%'.$q.'%')
                                ->orWhere('name', 'LIKE',  '%'.$q.'%');
        }
        $editors = $editors->orderBy('status', 'desc')
                            ->orderBy('id', 'desc')
                            ->paginate(5)
                            ->withQueryString();

        return view('backend.editor.read', compact('editors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.editor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|max:15|unique:users,phone',
            'password' => 'required|min:8'
        ]);

        $editor = new User();
        $editor->name     = $request->name;
        $editor->phone    = $request->phone;
        $editor->password = Hash::make($request->password);
        $editor->status   = 1;
        $editor->role     = 'editor';

        $editor->save();

        return redirect()
        ->route('editor.read')
        ->with(['type'=>'success', 'msg'=>'Created!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editor = Editor::findOrFail($id);
        return view('backend.editor.edit', compact('editor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editor = Editor::findOrFail($id);

        $request->validate([
            'status' => 'required|integer|between:0,1',
        ]);

        $editor->status = $request->status;
        $editor->save();

        if($editor->wasChanged()){
            return redirect()
            ->route('editor.read')
            ->with(['type'=>'success', 'msg'=>'Updated!']);
        }

        return redirect()
        ->route('editor.read')
        ->with(['type'=>'info', 'msg'=>'No Change!']);
    }

}
