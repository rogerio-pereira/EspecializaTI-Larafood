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

    public function permissionsAvailableProfile(Request $request, $profileId)
    {
        $profile = $this->profile->find($profileId);
        
        if(!$profile)
            return redirect()->back();

        $filters = $request->except('_token');
        
        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
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

    public function detachPermissionProfile($profileId, $permissionId)
    {
        $profile = $this->profile->find($profileId);
        $permission = $this->permission->find($permissionId);
        
        if(!$profile || !$permission)
            return redirect()->back();

        $profile->permissions()->detach($permission);

        return redirect()->route('admin.profile.permissions', $profile->id);
    }
}
