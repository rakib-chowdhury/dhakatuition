<?php

namespace App\Http\Controllers;

use App\Activation;
use App\Mail\activationMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{
    public function sendActivationMail($userId,$user)
    {
        $token = $this->createActivationRow($userId);
        if ($token != null)
        {
            $mail = Mail::to($user['email'])->send(new activationMail($token,$user['first_name']));
            return true;
        }
        return false;
    }

    public function activateUser($token)
    {
        $activationTable = $this->checkUserToken($token);
        $deleteUserToken = $this->dropActivationRow($activationTable->id);
        $confirmUser = $this->updateUserTableConfirm($activationTable->user_id);
        if ($confirmUser == true)
            return redirect('/login')->with('success','successfully confirmed your account');
        return redirect('/login')->with('warning','failed to confirmed your account');
    }

    private function createActivationRow($userId)
    {
        $createActivation = Activation::create(['user_id'=> $userId, 'user_token'=> $this->getToken()]);
        if ($createActivation == true)
            return $createActivation->user_token;
        return null;
    }
    private function checkUserToken($token)
    {
        $confirm = Activation::where('user_token',$token)->first();
        return $confirm;
    }

    private function dropActivationRow($userId)
    {
        return Activation::where('id',$userId)->delete();
    }

    private function getToken()
    {
        return hash_hmac('sha256',str_random(40),config('app.key'));
    }

    private function updateUserTableConfirm($userId)
    {
        return User::where('id',$userId)->update(['confirm' => true]);
    }
}