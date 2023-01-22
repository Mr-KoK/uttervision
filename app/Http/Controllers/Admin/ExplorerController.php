<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Folder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ExplorerController extends Controller
{
    public function index()
    {
        return view('panel.explorer');
    }

    public function getlist(Request $request)
    {
        $folder_id = $request->exists('folder_id') ? $request->input('folder_id') : 0;
        if ($folder_id > 0) {
            return response()->json(
                [
                    'folder' => DB::table('folder_explorer')
                        ->select('folder_explorer.*', 'admins.email')
                        ->join('admins', 'admins.id', '=', 'folder_explorer.admin_id')
                        ->where('parent_id', $request->folder_id)
                        ->get(),
                    'file' =>  DB::table('file_explorer')
                        ->select('file_explorer.*', 'admins.email')
                        ->join('admins', 'admins.id', '=', 'file_explorer.admin_id')
                        ->where('folder_id', $request->folder_id)
                        ->get(),
                    'status' => 200
                ]
            );
        } else {
            $folders = DB::table('folder_explorer')
                ->select('folder_explorer.*', 'admins.email')
                ->join('admins', 'admins.id', '=', 'folder_explorer.admin_id')
                ->whereNull('parent_id')
                ->get();
            $files = DB::table('file_explorer')
                ->select('file_explorer.*', 'admins.email')
                ->join('admins', 'admins.id', '=', 'file_explorer.admin_id')
                ->whereNull('folder_id')
                ->get();

            return response()->json(
                [
                    'folder' => $folders,
                    'file' => $files,
                    'status' => 200
                ]
            );
        }
    }
    public function storefolder(Request $request)
    {
        $parent_id = $request->exists('parent_id') ? $request->parent_id : null;
        $name = $request->name;
        if ($this->isFolderExist($parent_id, $name)) {
            return 'hi';
        } else {
            $folder = new Folder;
            $folder->name = $name;
            $folder->admin_id = Auth::guard('admin')->user()->id;
            $folder->parent_id = $parent_id;
            $folder->save();
            return response()->json(
                [
                    'data' =>  'successfully',
                    'folder' => $folder,
                    'status' => 200
                ]
            );
        }
    }
    public function storefile(Request $request)
    {
        $folder_id = $request->exists('folder_id') ? $request->folder_id : null;
        $files = $request->file('files');
        $show = [];
        foreach ($files as $file) {
            $filee = new File;
            $file_name = trim($file->getClientOriginalName() , ' ');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = str_replace(' ', '_', $file_name);
            $newname = $file_name . time() . "." . $file_ext;
            $file->move("storage/images/", $newname);
            $filee->img = "/storage/images/" . $newname;
            $filee->folder_id = $folder_id;
            $filee->admin_id = Auth::guard('admin')->user()->id;
            array_push($show, $filee);
            $filee->save();
            // $filee = new File;
            // $url = $file->store('public/images');
            // $url = str_replace("public", "storage", $url);
            // $filee->img = $url;
            // $filee->folder_id = $folder_id;
            // $filee->admin_id = Auth::guard('admin')->user()->id;
            // array_push($show, $filee);
            // $filee->save();
        }
        return response()->json(
            [
                'data' =>  'successfully',
                "file" => $show,
                'status' => 200
            ]
        );
    }
    public function removeFile(Request $request)
    {
        $file = File::find($request->id);
        Storage::delete(str_replace('storage', 'public', $file->img));
        $file->delete();
        return response()->json(
            [
                'data' =>  'successfully',
                'status' => 200
            ]
        );
    }
    public function removeFolder(Request $request)
    {
        $folder = Folder::find($request->id);
        $files = File::where('folder_id', $folder->id)->get();
        foreach ($files as $file) {
            Storage::delete(str_replace('storage', 'public', $file->img));
        }
        $folder->delete();
        return response()->json(
            [
                'data' =>  'successfully',
                'status' => 200
            ]
        );
    }
    public function isFolderExist($parent_id = null, $title)
    {
        return Folder::where('parent_id', $parent_id)->where('name', $title)->exists();
    }
}