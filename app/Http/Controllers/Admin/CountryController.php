<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\File;
use App\Folder;
use App\Services\CountryService;
use App\Services\ResponseService;
use Exception;
use App\Country;
use App\SGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(Request $request)
    {

        $countries = Country::orderBy('id', 'desc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.country.load', ['countries' => $countries])->render();
        }
        return view('admin.country.list-countries', compact('countries'));
    }

    public function getall()
    {
        $countries = Country::orderBy('name')->get();
        return response()->json(
            [
                'data' => $countries,
                'status' => 200
            ]
        );
    }

    public function create()
    {
        return view('admin.country.create-country', [
            'admins' => Admin::all(),
            'countries' => Country::getShortCountries() ,
            'step_groups' => SGroup::all() ,
        ]);
    }

    public function edit(Request $request)
    {
        return view('admin.country.edit-country', [
            'country' => Country::find($request->id),
            'admins' => Admin::all(),
            'countries' => Country::getShortCountries() ,
            'step_groups' => SGroup::all() ,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $country = new Country;
            $country->name = $request->name;
            $country->title = $request->title;
            $country->img = $request->img;
            $country->admin_id = $request->admin_id;
            $country->slug = $request->slug;
            $country->video = $request->video;
            $country->cover_img = $request->cover_img;
            $country->cover_img_mobile = $request->cover_img_mobile;
            $country->content = $request->body;
            $country->continent = $request->continent;
            $country->show_on_map = $request->show_on_map;
            $country->meta_description = $request->meta_description;
            $country->meta_keyword = $request->meta_keyword;
            $country->abstract = $request->abstract;
            $country->points_map = $request->points_map;
            $country->short_name = $request->short_name;
            $country->group_id = $request->sGroup;

            $country->save();
            return response()->json(
                [
                    'data' => "successfully",
                    'status' => 200
                ]
            );
        } catch (Exception $ex) {
            return response()->json(
                [
                    'data' => $ex,
                    'status' => 300
                ]
            );
        }


    }

    public function show(Request $request)
    {
        $country = Country::find($request->id);
        $user = $country->admin()->get();
        $imgId = File::where('img', $country->img)->get()->first();
        $country['creator'] = $user;
        $country['img_id'] = $imgId ? $imgId->id : "";
        return response()->json(
            [
                'data' => $country,
                'status' => 200
            ]
        );
    }

    public function update(Request $request)
    {
        $country = Country::find($request->id);
        $country->name = $request->name;
        $country->title = $request->title;
        $country->img = $request->img;
        $country->admin_id = $request->admin_id;
        $country->slug = $request->slug;
        $country->cover_img = $request->cover_img;
        $country->cover_img_mobile = $request->cover_img_mobile;
        $country->content = $request->body;
        $country->continent = $request->continent;
        $country->video = $request->video;
        $country->show_on_map = $request->show_on_map;
        $country->meta_description = $request->meta_description;
        $country->meta_keyword = $request->meta_keyword;
        $country->abstract = $request->abstract;
        $country->points_map = $request->points_map;
        $country->short_name = $request->short_name;
        $country->group_id = $request->sGroup;
        $country->save();
        return response()->json(
            [
                'data' => "successfullu",
                'status' => 200
            ]
        );
    }

    /**
     * @throws Exception
     */
    public function updateShowOnMap(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if(!isset($request->country_status) || !isset($request->country)){
               throw new Exception('country isn`t set ');
            }
            CountryService::updateCountryShowOnMap($request->country,$request->country_status);
            return ResponseService::jsonRes(true,'','Update Successfully!','',200);
        }catch (Exception $exception){
            return ResponseService::jsonRes(false,'',$exception->getMessage(),$exception->getLine(),301);
        }
    }

    public function delete(Request $request)
    {
        $country = Country::find($request->id);
        $country->delete();
        return response()->json(
            [
                'data' => "successfully",
                'status' => 200
            ]
        );
    }
}