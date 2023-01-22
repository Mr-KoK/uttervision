<?php

namespace App\Http\Controllers\Users;

use App\Country;
use App\Document;
use App\Enum\FormStatus;
use App\Family;
use App\Form;
use App\Http\Controllers\Controller;
use App\Question;
use App\Services\ResponseService;
use App\Traits\FilesHelper;
use App\Traits\UserAccess;
use App\Traits\UserHandler;
use App\User;
use App\Payment;
use App\Utility\CodingUtility;
use App\Utility\HtmlHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    use UserAccess, FilesHelper, UserHandler;

    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::user();
            $forms = [];
            $countries_id = [];
            foreach ($user->forms as $key => $form) {
                if ($form->status == FormStatus::inProcess) {
                    $forms[$key] = $form;
                    $countries_id[$key] = $form->country->id;
                }
            }
            return view('member.dashboard', [
                'user' => $user,
                'forms' => $forms,
                'asia_countries' => Country::where('show_on_map', 1)->where('continent', '=', 'asia')->whereNotIn('id', $countries_id)->get(),
                'australasia_countries' => Country::where('show_on_map', 1)->where('continent', '=', 'australasia')->whereNotIn('id', $countries_id)->get(),
                'africa_countries' => Country::where('show_on_map', 1)->where('continent', '=', 'africa')->whereNotIn('id', $countries_id)->get(),
                'north_america_countries' => Country::where('show_on_map', 1)->where('continent', '=', 'north america')->whereNotIn('id', $countries_id)->get(),
                'south_america_countries' => Country::where('show_on_map', 1)->where('continent', '=', 'south america')->whereNotIn('id', $countries_id)->get(),
                'europe_countries' => Country::where('show_on_map', 1)->where('continent', '=', 'europe')->whereNotIn('id', $countries_id)->get(),
            ]);
        } else {
            return view('member.auth.login');
        }
    }

    public function applicationProfile(Request $request, Form $form)
    {
        if ($form->user->id == Auth::user()->id) {
            if (!$this->user->isVerify()) {
                $offer_premium = '0';
            } elseif (Carbon::now() <= Carbon::parse($this->user->date_to_active)->addDays(6)) {
                $offer_premium = Carbon::parse($this->user->date_to_active)->addDays(6)->toDateTimeString();
            } else {
                $offer_premium = '1';
            }
            return view('member.application', [
                'user' => $this->user,
                'form' => $form,
                'offer' => $offer_premium
            ]);
        } else {
            return response()->view('404', [], 404);
        }
    }

    public function memberProfile(Request $request)
    {
        $countries = Country::getShortCountries();
        if ($request->ajax()) {
            return view('member.profile.load-families', [
                'user' => $this->user,
                'countries' => $countries
            ])->render();
        }
        return view('member.profile.index', [
            'user' => $this->user,
            'countries' => $countries
        ]);
    }

    public function memberInbox()
    {
        try {
            return view('member.in-box', [
                'user' => $this->user,
            ]);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, false, $exception, '', 403);
        }

    }

    public function payment(Request $request){
        return view('member.payment.index',[
            'user'=>$this->user
        ]);
    }

    public function editAvatar(Request $request)
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            if ($request->has('file')) {
                $user = Auth::user();
                $name = Time() . '-' . $user->id . '.' . $this->getExtension();
                $request->file('file')->move('storage/users/avatars/' . CodingUtility::encrypt($user->id, '3'), $name);
                $path = '/storage/users/avatars/' . CodingUtility::encrypt($user->id, '3') . '/' . $name;
                $this->clearUserAvatar();
                $this->setUserAvatar($path);
                return ResponseService::jsonRes(true, $path, 'avatar update successfully', '', 200);
            } else {
                return ResponseService::jsonRes(false, '', 'file or document id is empty!', '', 200);
            }
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, '', $exception->getMessage(), $exception->getLine(), 200);
        }
    }

    public function removeAvatar()
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            $this->clearUserAvatar();
            return ResponseService::jsonRes(true, true, 'avatar update successfully', '', 200);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, false, $exception->getMessage(), $exception->getLine(), 200);
        }
    }

    public function addFamily(Request $request)
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'family' => 'required',
                'relation' => 'required',
            ]);
            if ($validator->fails()) {
                return ResponseService::jsonRes(false, '', $validator->errors(), '', 422);
            }
            $family = Family::create([
                'name' => $request->name,
                'family' => $request->family,
                'user_id' => Auth::user()->id,
                'relation' => $request->relation,
                'pass_id' => $request->pass_id,
                'same_pass' => $request->same_pass_id,
                'description' => $request->description,
                'birthday' => $request->birthday,
            ]);

            if ($request->has('file')) {
                $name = Time() . '-' . CodingUtility::encrypt($family->id, '3') . '.' . $this->getExtension();
                $request->file('file')->move('storage/users/avatars/' . CodingUtility::encrypt($family->id, '3'), $name);
                $path = '/storage/users/avatars/' . CodingUtility::encrypt($family->id, '3') . '/' . $name;
                $family->img = $path;
                $family->save();
            }
            return ResponseService::jsonRes(true, $family, 'create successfully', '', 200);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, '', $exception->getMessage(), $exception->getLine(), 200);
        }

    }

    public function editeFamily(Request $request)
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'family' => 'required',
                'relation' => 'required',
            ]);
            if ($validator->fails()) {
                return ResponseService::jsonRes(false, '', $validator->errors(), '', 422);
            }
            $family = Family::where('id', $request->family_id)->first();
            $family->update([
                'name' => $request->name,
                'family' => $request->family,
                'relation' => $request->relation,
                'pass_id' => $request->pass_id,
                'same_pass' => intval($request->same_pass),
                'birthday' => $request->birthday,
                'description' => $request->description,
            ]);
            if ($request->has('file')) {
                if ($family->img) {
                    unlink(substr($family->img, 1));
                }
                $name = Time() . '-' . CodingUtility::encrypt($family->id, '3') . '.' . $this->getExtension();
                $request->file('file')->move('storage/users/avatars/' . CodingUtility::encrypt($family->id, '3'), $name);
                $path = '/storage/users/avatars/' . CodingUtility::encrypt($family->id, '3') . '/' . $name;
                $family->img = $path;
                $family->save();
            }
            return ResponseService::jsonRes(true, $family, 'Edited successfully', '', 200);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, '', $exception->getMessage(), $exception->getLine(), 200);
        }
    }

    public function deleteFamily(Request $request)
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            $this->deleteFamilyHandler($request->family_id);
            return ResponseService::jsonRes(true, true, 'Family Delete Successfully', '', 200);

        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, '', $exception, '', 200);
        }
    }

    public function checkPrivacy()
    {
        try {
            $this->checkUserPrivacy();
            return ResponseService::jsonRes(true, true, 'check privacy successfully!', '', 200);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, false, $exception->getMessage(), $exception->getLine(), 200);
        }
    }

    public function saveMainProfile(Request $request)
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            $this->updateUserInformation($request->name, $request->family, $request->country, $request->pass_id, $request->birthday, $request->bio, $request->phone_no);
            return ResponseService::jsonRes(true, true, 'Profile Update Successfully', '', 200);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, false, $exception->getMessage(), $exception->getLine(), 200);
        }
    }

    public function updateName(Request $request)
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return ResponseService::jsonRes(false, '', $validator->errors(), '', 422);
            }
            Auth::user()->name= $request->name;
            Auth::user()->save();
            return ResponseService::jsonRes(true, true, 'Name Update Successfully', '', 200);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, false, $exception->getMessage(), $exception->getLine(), 200);
        }
    }

    public function updatePhone(Request $request)
    {
        try {
            if (!Auth::user()->isVerify()) {
                return $this->emailVerify403();
            }
            $validator = Validator::make($request->all(), [
                'phone' => 'required',
            ]);
            if ($validator->fails()) {
                return ResponseService::jsonRes(false, '', $validator->errors(), '', 422);
            }
            Auth::user()->phone= $request->phone;
            Auth::user()->save();
            return ResponseService::jsonRes(true, true, 'Phone Update Successfully', '', 200);
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, false, $exception->getMessage(), $exception->getLine(), 200);
        }
    }


    public function showRegister()
    {
        return view('member.auth.register');
    }

    public function getInvoice(Request $request)
    {
        $invoices = Payment::where('user_id', $request->id)->get();
        return response()->json(
            [
                'data' => $invoices,
                'status' => 200
            ]
        );
    }

    public function resetpass(Request $request)
    {
        Mail::to($request->email)->send(new ResetPassword($request->id));
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }

    public function changePassEmail(Request $request)
    {
        $user = User::find($request->id);
        $isEqual = Hash::check($request->password, $user->password);
        if ($isEqual) {
            $user->reset_pass = $request->reset_pass;
            $user->password = Hash::make($request->newpassword);
            $user->save();
            Auth::loginUsingId($user->id);
            return response()->json(
                [
                    'data' => 'successful',
                    'status' => 200
                ]
            );
        } else {
            return response()->json(array(
                'status' => 401,
            ), 401);
        }
    }

    public function count()
    {
        $user_id = auth()->user()->id;
        $query = User::where('id', $user_id)->first()->user()->get();
        $student_count = $query->where('type', "2")->count();
        $visitor_count = $query->where('type', "4")->count();
        $investor_count = $query->where('type', "3")->count();
        $skill_worker = $query->where('type', "5")->count();
        return response()->json([
            'status' => 200,
            'message' => 'successfully',
            'student' => $student_count,
            'visitor' => $visitor_count,
            'investor' => $investor_count,
            'ex/sx' => $skill_worker,
        ], 200);
    }

    public function verifyUser(Request $request, $id)
    {
        try {
            $code = $request->ticket;
            $id = CodingUtility::decode($id);
            $user = User::find($id);
            if ($code == $user->verify_code) {
                $user->userActivate();
                Auth::loginUsingId($user->id);
                return redirect(route('member.dashboard','utm=camp_first_login'));
            } else {
                dd('Sry Link Has Expired!');
            }

        } catch (Exception $exception) {
            dd($exception);
        }
    }
}