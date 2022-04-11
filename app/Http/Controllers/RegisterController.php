<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

use function Psy\debug;

class RegisterController extends Controller
{
    /**
     * Display register page
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("auth.register");
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        
        $user = new User();
        // ddd(request()->all());
        if ($request->validated()) {
            if ($request->has("img_src")) {
                $image = $request->file("img_src");
                $reImage = time() . "." . $image->getClientOriginalExtension();
                $dest = public_path("\imgs");
                $image->move($dest, $reImage);
                //Save Data
                $user->img_src = $reImage;
                $user->email = $request->email;
                $user->full_name = $request->full_name;
                $user->password = $request->password;
                $user->username = $request->username;
                $user->save();
            }
            // $user = User::create($request->validated());
        }
        auth()->login($user);

        return redirect("/")
            ->with('success', "Account successfully registered.");
    }
}
