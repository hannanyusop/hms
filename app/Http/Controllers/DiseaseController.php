<?php

namespace App\Http\Controllers;

use App\Http\Requests\Disease\DiseaseStoreRequest;
use App\Http\Requests\Disease\DiseaseUpdateRequest;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index(){

        $diseases = Disease::get();
        return view('backend.disease.index', compact('diseases'));
    }

    public function show($id){

        $disease = Disease::findOrFail(decrypt($id));
        return view('backend.disease.show', compact('disease'));
    }

    public function create(){
        return view('backend.disease.create');
    }

    public function store(DiseaseStoreRequest $request){

        $disease         = new Disease();
        $disease->code   = $request->code;
        $disease->name   = strtoupper($request->name);
        $disease->remark = $request->remark;
        $disease->save();

        return redirect()->back()->with('success', __('Disease information inserted!'));
    }

    public function edit($id){

        $disease = Disease::findOrFail(decrypt($id));
        return view('backend.disease.edit', compact('disease'));
    }

    public function update(DiseaseUpdateRequest $request, Disease $disease){

        $disease->code   = $request->code;
        $disease->name   = strtoupper($request->name);
        $disease->remark = $request->remark;
        $disease->save();
        return redirect()->back()->with('success', __('Disease information updated!'));
    }
}
