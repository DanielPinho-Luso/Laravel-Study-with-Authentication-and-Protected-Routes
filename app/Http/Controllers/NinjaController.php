<?php

namespace App\Http\Controllers;

use App\Http\Requests\NinjaPostRequest;
use App\Models\Dojo;
use App\Models\Ninja;
use Illuminate\Http\Request;

class NinjaController extends Controller
{
    public function index()
    {
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);
        return view('ninjas.index', ["ninjas" => $ninjas]);
    }

    public function show(Ninja $ninja)
    {
        $ninja->load('dojo');
        return view('ninjas.show', ["ninja" => $ninja]);
    }

    public function create()
    {
        $dojos = Dojo::all();
        return view('ninjas.create', ["dojos" => $dojos]);
    }

    public function store(NinjaPostRequest $request)
    {
        $validated = $request->validated();
        Ninja::create($validated);
        return redirect()->route('ninjas.index')->with('success', 'Ninja Created!');
    }

    public function destroy(Ninja $ninja)
    {
        $ninja->delete();
        return redirect()->route('ninjas.index')->with('success', 'Ninja Deleted!');
    }
}
