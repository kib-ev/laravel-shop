<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        $meta = Meta::create($data);
        return back();
    }

    public function show(Meta $meta)
    {
        //
    }

    public function edit(Meta $meta)
    {
        //
    }

    public function update(Request $request, Meta $meta)
    {
        $data = $request->except(['_token', '_method']);
        $meta->update($data);
        return back();
    }

    public function destroy(Meta $meta)
    {
        //
    }
}
