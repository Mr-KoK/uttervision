<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StepGroupDocumentServices;
use App\SGroup;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'step_groups' => SGroup::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $sGroup = new SGroup();
            $sGroup->name = $request->name;
            $sGroup->save();
            StepGroupDocumentServices::createDefaultSGroupDocuments($sGroup->id);
            return response()->json(
                [
                    'group' => $sGroup,
                ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                ], 300);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SGroup $sGroup
     * @return JsonResponse
     */
    public function delete(Request $request, $id)
    {
        try {
            $gStep = SGroup::find($id);
            return response()->json([
                'id' => $id,
                'success' => $gStep->delete()
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                ], 300);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SGroup $sGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SGroup $sGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SGroup $sGroup
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {
            SGroup::where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
            if (isset($request->documents)) {
                StepGroupDocumentServices::updateSGroupDocuments($request->id, $request->documents);
            }
            return response()->json([
                'gname' => $request->name,
                'success' => true,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                ], 300);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SGroup $sGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SGroup $sGroup)
    {
        //
    }
}
