<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user){
        //the method attact is used wen you have de relationship to many
        $user->followers()->attach(auth()->user()->id);
        return back();

    }

    public function destroy(User $user){
        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
