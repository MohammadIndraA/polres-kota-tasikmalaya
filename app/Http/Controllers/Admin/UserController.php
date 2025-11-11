<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        // return view('admin.user-profil.index');
    }

    public function create()
    {
        return view('admin.user.form');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->userService->createUser($data);

        return redirect()->route('admin.user.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $user = $this->userService->findUser($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = $this->userService->findUser($id);
        return view('admin.user.form', compact('user'));
    }

    public function update(UserRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->userService->updateuser($id, $data);

        return redirect()->route('admin.user.index')->with('success', 'Data berhasil diperbarui!');
    }

    // public function destroy(string $id)
    // {
    //     $this->userService->deleteuser($id);
    //     return ResponseJson::success(null, 'berhasil dihapus');
    // }

}
