<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Utilities\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\UploadFileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminEditRequest;

class ProfileSettingsController extends Controller
{

    public function showSettings()
    {
        return view('Admin.Profile_Settings.account-general');
    }
}
