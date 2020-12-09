<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function search($filter = null)
    {
        $results = $this
                        ->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->latest()
                        ->paginate();
                        
        return $results;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Permissions not linked with this profile
     *
     * @return void
     */
    public function permissionsAvailable()
    {
        //select * from permissions where id not in (select permission_id where profile_id=1)
        //Onde profile_id = id to perfil atual ($this)
        // $permissions = Permission::whereNotIn('id', function($query){
        //     $query->select('permission_profile.permission_id');
        //     $query->from('permissions_profile');
        //     $query->whereRaw('permission_profile.profile_id = '.$this->id);
        // })->toSql(); //toSql Gera o sql para debugar
        // dd($permissions);

        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw('permission_profile.profile_id = '.$this->id);
        })->paginate();

        return $permissions;
    }
}
