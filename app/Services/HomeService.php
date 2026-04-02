<?php

namespace App\Services;
use App\Repositories\HomeRepositoryInterface;

class HomeService
{
    protected $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function getHomeData($request)
    {
        $profilelist = $this->homeRepository->getProfiles($request);
        $cityList = $this->homeRepository->getCityList();

        return compact('profilelist', 'cityList');
    }

    public function getProfileDetails($id)
    {
        return $this->homeRepository->findProfileById($id);
    }

    public function getUserProfiles($request, $username)
    {
        $user = $this->homeRepository->findUserByUsername($username);

        $profilelist = $this->homeRepository->getProfilesByUserWithFilters($request, $user->id);
        $cityList = $this->homeRepository->getCityListByUsername($username);

        return compact('profilelist', 'cityList');
    }
}