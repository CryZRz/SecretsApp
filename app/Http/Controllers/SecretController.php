<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secret;

class SecretController extends Controller
{
    public function saveSecret(Request $req){
        $validate = $this->validate($req, [
            "secret" => ["required"],
            "profileId" => ["required"]
        ]);

        $profileId = $req->input("profileId");
        $secretContent = $req->input("secret");

        $secretModel = new Secret();
        $secretModel->user_id = $profileId;
        $secretModel->secret = $secretContent;

        $secretModel->save();

        return redirect()->route("profile", ["id" => $profileId]);
    }
}
