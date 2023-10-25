<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OTPMail;
use App\Models\Admin;
use App\Mail\CustomEmail;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Http\Requests\Admin\AdminVerifyOtpRequest;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\ForgotPasswordRequest;
use App\Utilities\Constant;

class AdminAuthController extends Controller
{
    function getLogin()
    {
        if (auth()->guard('admin')->check()) {

            if (auth()->guard('admin')->user()->type == Constant::ROLE['Admin']) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('employee.dashboard');
            }
            return redirect()->route('dashboard');
        }

        return view('Admin.Auth.page-auth-signin');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        if (
            auth()
            ->guard('admin')
            ->attempt(['email' => $request->email, 'password' => $request->password])
        ) {
            if (auth()->guard('admin')->user()->type == Constant::ROLE['Admin']) {
                return redirect()
                    ->route('dashboard')
                    ->with('success', 'Login successfully!');
                return redirect()->route('dashboard');
            } else {
                return redirect()
                    ->route('employee.dashboard')
                    ->with('success', 'Login successfully!');
            }
        } else {
            return back()->with('error', 'Invalid credentials ');
        }
    }

    public function adminLogout()
    {
        auth()
            ->guard('admin')
            ->logout();

        return redirect(route('getLogin'));
    }

    public function showForgetPasswordForm()
    {
        if (
            auth()
            ->guard('admin')
            ->check()
        ) {
            return redirect()->route('dashboard');
        }

        return view('Admin.Auth.page-auth-recover-pass');
    }

    public function submitForgetPasswordForm(ForgotPasswordRequest $request)
    {
        // $otp = '0000';
        $otp = rand(1111, 9999);
        $checkEmail = Admin::where('email', $request->email)->first();

        // Email send here

        if (!$checkEmail) {
            return redirect()
                ->route('forget.password.get')
                ->with('error', 'In-valid Email address!');
        }

        $subject = 'Reset Password OTP';

        // SendEmailJob::dispatch($checkEmail->email, $subject, $otp, 'emails.otp');

        $checkEmail->update(['otp' => $otp]);

        if ($request->resend) {
            return redirect()
                ->route('reset.otp.get', ['email' => $request->email])
                ->with('success', 'OTP Resend successfully');
        } else {
            return redirect()->route('reset.otp.get', ['email' => $request->email]);
        }
    }

    public function showOtpForm(Request $request)
    {
        if (
            auth()
            ->guard('admin')
            ->check()
        ) {
            return redirect()->route('dashboard');
        }
        $email = $request->email;

        return view('Admin.Auth.page-auth-otp-verify', compact('email'));
    }

    public function otpVerify(AdminVerifyOtpRequest $request)
    {
        if (
            auth()
            ->guard('admin')
            ->check()
        ) {
            return redirect()->route('dashboard');
        }
        $otpVerify = Admin::where('email', $request->email)
            ->where('otp', $request->otp)
            ->exists();

        if ($otpVerify) {
            return redirect()->route('reset.password.get', ['email' => $request->email, 'otp' => $request->otp]);
        } else {
            return redirect()
                ->route('reset.otp.get', ['email' => $request->email])
                ->with('error', 'Otp is wrong!');
        }
    }

    public function showResetPasswordForm(Request $request)
    {
        if (
            auth()
            ->guard('admin')
            ->check()
        ) {
            return redirect()->route('dashboard');
        }
        $email = $request->email;
        $otp = $request->otp;

        return view('Admin.Auth.page-auth-reset-password', compact('email', 'otp'));
    }

    public function submitResetPasswordForm(ResetPasswordRequest $request)
    {
        $otpVerify = Admin::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if ($otpVerify) {
            $otpVerify->update(['password' => Hash::make($request->password), 'otp' => '']);
            $message = ['success' => 'Password changed'];
        } else {
            $message = ['error' => 'Invalid Otp'];
        }
        auth()
            ->guard('admin')
            ->logout();

        return redirect()
            ->route('getLogin')
            ->with($message);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            DB::beginTransaction();

            $updated = false;
            $message = null;
            $type = null;

            if (Hash::check($request->current_password, auth()->guard('admin')->user()->password)) {
                if ($request->current_password != $request->password) {
                    Admin::where('id', auth()->guard('admin')->user()->id)->update([
                        'password' => bcrypt($request->password),
                    ]);
                    $updated = true;
                    $message = 'Password updated successfully';
                    $type = 'success';
                } else {
                    $message = 'New password can not be same as current password';
                    $type = 'error';
                }
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Current Password does not match');
            }

            if ($updated) {
                DB::commit();
            }
            return redirect()
                ->back()
                ->with($type, $message);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Failed to update data.');
        }
    }
}
