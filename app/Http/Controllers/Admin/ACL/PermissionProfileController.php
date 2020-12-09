<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionProfileController extends Controller
{
    private $profile;
    private $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($profileId)
    {
        $profile = $this->profile->find($profileId);
        
        if(!$profile)
            return redirect()->back();

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function permissionsAvailableProfile($profileId)
    {
        $profile = $this->profile->find($profileId);
        
        if(!$profile)
            return redirect()->back();
        
        $permissions = $profile->permissionsAvailable();

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));
    }

    public function attachPermissionsProfile(Request $request, $profileId)
    {
        $profile = $this->profile->find($profileId);
        
        if(!$profile)
            return redirect()->back();

        //Verifica se $request->permissions não existe e se a quantidade de items é igual a 0
        if(!$request->permissions || count($request->permissions) == 0)
            return redirect()->back()->with('warning', 'Precisa escolher pelo menos uma permissão');
            
        $profile->permissions()->attach($request->permissions);

        return redirect()->route('admin.profile.permissions', $profile->id);
    }
}
