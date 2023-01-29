<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function getUserProfile($id){
        $user = User::find($id);
        $errorUser = false;

        if($user == null){
            $errorUser = true;
        }

        return view("profile", ["user" => $user, "errorUser" => $errorUser]);
    }

    public function updateInfoUser(Request $req){
        $profileId = $req->input("profileId");

        if ($profileId != Auth::user()->id){
            return redirect()->route("profile", ["id" => $profileId])->with("message", "esta cuenta no te pertenece");
        }

        $validate = $this->validate($req, [
            "profileId" => ["required", "int"],
            "image" => ["mimes:jpg,png,jpeg,gif"],
            "name" => ["required", "string", "max:100"],
            "lastName" => ["required", "string", "max:100"],
            "nick" => ["required", "string", "max:20"],
            "email" => ["required", "string", "email", 'max:255', 'unique:users']
        ]);


        $nameUpdate = $req->input("name");
        $lastNameUpdate = $req->input("lastName");
        $nickUpdate = $req->input("nick");
        $emailUpdate = $req->input("email");
        $imageUpdate = $req->file("image");

        $userUpdate = Auth::user();
        $userUpdate->name = $nameUpdate;
        $userUpdate->last_name = $lastNameUpdate;
        $userUpdate->nick = $nickUpdate;
        $userUpdate->email = $emailUpdate;

        if ($imageUpdate != null){
            if($userUpdate->image != "default.jpg"){
                Storage::disk("profiles")->delete($userUpdate->image);
            }
            $imageUpdateName = time().$imageUpdate->getClientOriginalName();
            Storage::disk("profiles")->put($imageUpdateName, File::get($imageUpdate));
            $userUpdate->image = $imageUpdateName;
        }

        $userUpdate->update();

        return redirect()->route("profile", ["id" => $profileId])->with("message", "datos actualizados correctamente");
    }

}
