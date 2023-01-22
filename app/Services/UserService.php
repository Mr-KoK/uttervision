<?php

namespace App\Services;

use App\Enum\UserType;
use App\User;
use Illuminate\Http\Request;
use Exception;

class UserService extends Service
{
    public static function createNewUser($email, $password, $userTye = UserType::DirectlyRegister,$img ='/assets/images/admin/icons/avatar-placeholder.png')
    {
        try {
            return User::create([
                'name' => explode('@', $email)[0],
                'email' => $email,
                'img' => $img,
                'password' => bcrypt($password),
                'reset_pass' => 1,
                'verify_code' => null,
                'type' => $userTye,
            ]);
        } catch (Exception $exception) {
            throw new Exception($exception);
        }

    }
}