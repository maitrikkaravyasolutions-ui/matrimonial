<?php

namespace App\Repositories;

interface HomeRepositoryInterface
{
    public function getProfiles($request);
    public function getCityList();
    public function findProfileById($id);
    public function findUserByUsername($username);
    public function getProfilesByUser($userId);
    public function getProfilesByUserWithFilters($request, $userId);
}