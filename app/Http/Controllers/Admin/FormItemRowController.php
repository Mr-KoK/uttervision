<?php

namespace App\Http\Controllers\Admin;

use App\FormItemRow;
use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;

class FormItemRowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        //
    }

    public function updateRowStatus(Request $request){
        try {
            if(!$request->row_id ){
               return ResponseService::jsonRes(false,'','row id or status is null','',200);
            }
            $row = FormItemRow::find($request->row_id);
            $row->status = $request->status;
            $row->save();
            return ResponseService::jsonRes(true,$row,'status Updated Successfully!','',200);
        }catch (Exception $exception){
            return ResponseService::jsonRes(false,$row,$exception,'',300);
        }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormItemRow  $formItemRow
     * @return \Illuminate\Http\Response
     */
    public function show(FormItemRow $formItemRow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormItemRow  $formItemRow
     * @return \Illuminate\Http\Response
     */
    public function edit(FormItemRow $formItemRow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormItemRow  $formItemRow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormItemRow $formItemRow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormItemRow  $formItemRow
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormItemRow $formItemRow)
    {
        //
    }
}
