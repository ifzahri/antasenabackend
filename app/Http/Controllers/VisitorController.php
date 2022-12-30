<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;


class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::latest()->paginate(10)->onEachSide(1);

        return view('visitors.index', compact('visitors'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('visitors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'identity'  => 'required|max:16',
            'email'  => 'required',
            'phone_nr'  => 'required|max:16',
            'city'  => 'required',
            'visits'  => 'required',
            'date'  => 'required',
        ]);

        Visitor::create($request->all());
        return redirect()->route('visitors.index')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function show(Visitor $visitor)
    {
        return view('visitors.show',compact('visitor'));
    }

    public function edit(Visitor $visitor)
    {
        return view('visitors.edit',compact('visitor'));
    }

    public function update(Request $request, Visitor $visitor)
    {
        $this->validate($request, [
            'name'  => 'required',
            'identity'  => 'required|max:16',
            'email'  => 'required',
            'phone_nr'  => 'required|max:16',
            'city'  => 'required',
            'visits'  => 'required',
            'date'  => 'required',
        ]);

        $visitor->update($request->all());
        return redirect()->route('visitors.index')->with(['success' => 'Data berhasil dirubah!']);
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success','Visitor deleted successfully');
    }
}
