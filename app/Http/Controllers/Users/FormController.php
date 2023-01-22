<?php

namespace App\Http\Controllers\Users;

use App\Country;
use App\Form;
use App\Http\Controllers\Controller;
use App\Services\FormServices;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function saveForm(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $resForm = $request->form;
            $result = FormServices::createForm($resForm);
            if (!$result['exist']) {
                return ResponseService::jsonRes(true, $result, 'success', '', 200);
            } else {
                return ResponseService::jsonRes(false, $result, 'some of forms is exist', '', 200);
            }

        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, $request->form, $exception->getMessage(), $exception->getLine(), 500);
        }
    }

    public function list(Request $request)
    {
        $forms = Form::orderBy('id', 'desc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.user.visa-applicant-item', ['forms' => $forms])->render();
        }
        return view('admin.user.visa-applicant', compact('forms'));
    }

    public function updateRows(Request $request){
        try {
            if(!Auth::user()->isVerify()){
                return ResponseService::jsonRes(false, false, 'Email Not Verify', '', 403);
            }
            if(isset($request->rows)){
                FormServices::updateRows($request->rows);
            }
            return ResponseService::jsonRes(true,true,'Update Successfully!','',200);
        }catch (Exception $exception){
            return ResponseService::jsonRes(false,false,$exception,'',201);
        }

    }
}
