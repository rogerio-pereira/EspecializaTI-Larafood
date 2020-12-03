<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileStoreUpdateRequest;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate();
    
        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreUpdateRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('admin.profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = $this->repository->find($id);
        
        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = $this->repository->find($id);
        
        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileStoreUpdateRequest $request, $id)
    {
        $profile = $this->repository->find($id);
        
        if(!$profile)
            return redirect()->back();
            
        $profile->update($request->all());

        return redirect()->route('admin.profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = $this->repository->find($id);
        
        if(!$profile)
            return redirect()->back();
            
        $profile->delete();

        return redirect()->route('admin.profiles.index');
    }
}
