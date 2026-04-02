<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\HomeService;

class HomeController extends Controller
{
    public function __construct(protected HomeService $homeService){}

    public function home()
    {
        return view('home');
    }

    public function index(Request $request)
    {
        $data = $this->homeService->getHomeData($request);

        return view('welcome', $data);
    }

    public function profile($id)
    {
        $profile = $this->homeService->getProfileDetails($id);
        return view('user.profile', compact('profile'));
    }

    public function userlist(Request $request, $username)
    {
        $data = $this->homeService->getUserProfiles($request, $username);
        return view('user.profile_list', $data);
    }
}