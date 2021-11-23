<?php

namespace App\Http\Controllers;

use App\Http\Requests\Drug\DrugStoreRequest;
use App\Http\Requests\Drug\DruoUpdateRequest;
use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function index(){

        $drugs = Drug::get();
        return view('backend.drug.index', compact('drugs'));
    }

    public function show($id){

        $drug = Drug::findOrFail(decrypt($id));
        return view('backend.drug.show', compact('drug'));
    }

    public function create(){
        return view('backend.drug.create');
    }

    public function store(DrugStoreRequest $request){

        $drug         = new Drug();
        $drug->code   = $request->code;
        $drug->name   = strtoupper($request->name);
        $drug->price  = $request->price;
        $drug->save();

        return redirect()->back()->with('success', __('Drug information inserted!'));
    }

    public function edit($id){

        $drug = Drug::findOrFail(decrypt($id));
        return view('backend.drug.edit', compact('drug'));
    }

    public function update(DruoUpdateRequest $request, Drug $drug){

        $drug->code   = $request->code;
        $drug->name   = strtoupper($request->name);
        $drug->price  = $request->price;
        $drug->save();

        return redirect()->back()->with('success', __('Drug information updated!'));
    }
}
