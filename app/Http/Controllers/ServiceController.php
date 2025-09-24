<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\TypeOfService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = TypeOfService::all();
        return view("content.service.index", compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("content.service.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $services = TypeOfService::create($request->all());
        return redirect()->route("service.index", $services->id)->with("success", "Tambah Berhasil!!");
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
        $service = TypeOfService::findOrFail($id);
        return view("content.service.edit", compact("service"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = TypeOfService::findOrFail($id);
        $service->update($request->all());
        $service->save();
        return redirect()->route("service.index")->with("success", "edit berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = TypeOfService::findOrFail($id);
        $service->delete();
        return redirect()->route("service.index")->with("success", "delete berhasil");
    }
}
