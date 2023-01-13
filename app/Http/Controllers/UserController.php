<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
    }

    public function updateImage(Request $request)
    {
        $validated = $request->validate([
            "file" => "required|mimes:jpeg,jpg,png",
        ]);

        $updateUser = User::find(auth()->user()->id);

        $imageFile = $validated['file'];

        if ($updateUser->image_path != NULL) {
            Storage::delete('public/images/' . $updateUser->image_path);
        }

        $imageName = 'profile' . time() . '.' . $imageFile->getClientOriginalExtension();
        $updateUser->image_path = $imageName;

        Storage::putFileAs('public/images', $imageFile, $imageName);

        $updateUser->save();

        return redirect()->back()->with('success', 'Update picture profile success');
    }
    public function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:5",
            "gender" => "required",
            "date_of_birth" => "required|before:today",
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('info', '1');
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $validated = $request->all();

        $updateUser = User::find(auth()->user()->id);
        $updateUser->name = $validated['name'];
        $updateUser->gender = $validated['gender'];
        $updateUser->date_of_birth = $validated['date_of_birth'];
        $updateUser->save();

        return redirect()->back()->with('success', 'Update profile success');
    }
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required|alpha_num',
            'newPassword' => 'required|alpha_num|min:8|required_with:confirmNewPassword',
            'confirmNewPassword' => 'required|alpha_num|min:8|same:newPassword'
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('password', '1');
            return redirect()->back()->withErrors($validator);
        }

        $validated = $request->all();

        $updateUser = User::find(auth()->user()->id);

        if (Hash::check($validated['currentPassword'], $updateUser->password)) {
            return redirect()->back()->withErrors(['passwordFailMatch' => '1']);
        }

        $updateUser->password = Hash::make($validated['newPassword']);
        $updateUser->save();

        return redirect()->back()->with('success', 'Update password success');
    }
}
