<?php

namespace App\Http\Controllers\Users;

use App\Document;
use App\Enum\FilePath;
use App\Http\Controllers\Controller;
use App\Services\FileService;
use App\Services\ResponseService;
use App\Utility\CodingUtility;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadDoument(Request $request)
    {
        try {
            if(!Auth::user()->isVerify()){
                return ResponseService::jsonRes(false, false, 'Email Not Verify', '', 403);
            }
            request()->validate([
                'file' => 'required|mimes:jpeg,png,pdf|max:2048',
            ]);
            if ($request->has('file') && $request->has('doc-id')) {
                $docId = $request->get('doc-id');
                if ($_FILES["file"]["name"]) {
                    $exp = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
                }else{
                    $exp = 'png';
                }
                $document = Document::where('id', $docId)->first();
                $name = Time().'-'.$document->name.'.'.$exp;
                $request->file('file')->move('storage/users/documents/'. Auth::user()->id,$name);
                $path = '/storage/users/documents/'. Auth::user()->id.'/'.$name;
                $file_name = $path ? pathinfo($path, PATHINFO_FILENAME) : '';

                if ($document->form->user->id == Auth::user()->id) {
                    $document->src = $path;
                    $document->status = 1;
                    $document->save();
                } else {
                    return ResponseService::jsonRes(false, 'reject', '403 : You Dont Have Access To Upload!', '', 200);
                }
                return ResponseService::jsonRes(true, $file_name, 'doc create successfully', '', 200);
            } else {
                return ResponseService::jsonRes(false, '', 'file or document id is empty!', '', 200);
            }

        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, '', $exception, '', 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
