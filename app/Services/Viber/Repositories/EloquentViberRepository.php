<?php

namespace App\Services\Viber\Repositories;

use App\Models\ViberUser;

class EloquentViberRepository
{
    public function delUser($data)
    {
        $token = $data->user_id;
        \Log::info($token . ' Будет удалена');
        ViberUser::where('token', $token)->delete();
    }

    public function addViberUser($user)
    {
        $viberUser = new ViberUser();

        $data = [
            'name' => $user->user['name'],
            'token' => $user->user['id']
        ];
        $viberUser->create($data);

    }

    public function getSendTokens()
    {
        $colums = ['token'];
        $users = ViberUser::select($colums)->get();

        $tokens = [];
        foreach ($users as $user) {
            $tokens[] = $user['token'];
        }
        return $tokens;
    }
}
