<?php


namespace App\Http\Controllers;


use App\Models\Level;
use App\Models\UserModel;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class UserController extends Controller{


    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar user',
            'list' => ['Home', 'user'],
        ];


        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];


        $activeMenu = 'user';
        $level = Level::all();
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'level' => $level]);
    }


    public function list(Request $request){
        $user = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');


        if ($request->level_id) {
            $user->where('level_id', $request->level_id);
        }
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                $btn = '<button onclick="showDetail(\'' . url('/user/' . $user->user_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="editUser(\'' . url('/user/' . $user->user_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="deleteUser(\'' . url('/user/' . $user->user_id) . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];


        $page = (object)[
            'title' => 'Tambah User Baru'
        ];
        $level = Level::all();
        $activeMenu = 'user';
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }


    public function store(Request $request){
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
        ]);


        usermodel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id
        ]);


        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }


    public function show(string $id){
        $user = usermodel::with('level')->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail user',
            'list' => ['Home', 'User', 'Detail']
        ];


        $page = (object)[
            'title' => 'Detail user'
        ];
        $activeMenu = 'user';
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }


    public function edit(string $id){
        $user = usermodel::find($id);
        $level = Level::all();


        $breadcrumb = (object)[
            'title' => 'Edit user',
            'list' => ['Home', 'User', 'Edit']
        ];


        $page = (object)[
            'title' => 'Edit User'
        ];
        $activeMenu = 'user';
        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu, 'user' => $user]);
    }


    public function update(Request $request, string $id){
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);


        $user = UserModel::find($id);


        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }


    public function destroy($id){
        try {
            $user = UserModel::find($id);
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }
   
            $user->delete();
   
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data user: ' . $e->getMessage()
            ], 500);
        }
    }


    public function create_ajax(){
        $level = Level::select('level_id', 'level_nama')->get();
        return view('user.create_ajax')->with('level', $level);
    }


    public function store_ajax(Request $request){
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100',
                'password' => 'required|min:5'
            ];
   
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
   
            try {
                $user = UserModel::create([
                    'level_id' => $request->level_id,
                    'username' => $request->username,
                    'nama' => $request->nama,
                    'password' => Hash::make($request->password)
                ]);
   
                $user->load('level');
   
                return response()->json([
                    'status' => true,
                    'message' => 'Data user berhasil disimpan',
                    'data' => [
                        'DT_RowIndex' => UserModel::count(),
                        'username' => $user->username,
                        'nama' => $user->nama,
                        'level' => [
                            'level_nama' => $user->level->level_nama
                        ],
                        'detail_url' => url("/user/{$user->user_id}/show_ajax"),
                        'edit_url' => url("/user/{$user->user_id}/edit_ajax"),
                        'delete_url' => url("/user/{$user->user_id}")
                    ]
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal menyimpan data user: ' . $e->getMessage()
                ], 500);
            }
        }
   
        return redirect('/');
    }
   


    public function edit_ajax($id){
        try {
            $user = UserModel::find($id);
            $level = Level::all();
   
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }
   
            return response()->json([
                'status' => true,
                'data' => $user,
                'level' => $level
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data user: ' . $e->getMessage()
            ], 500);
        }
    }


    public function update_ajax(Request $request, $id){
        try {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama' => 'required|string|max:100',
                'password' => 'nullable|min:5'
            ];
   
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }
   
            $user = UserModel::find($id);
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }
   
            $updateData = [
                'level_id' => $request->level_id,
                'username' => $request->username,
                'nama' => $request->nama
            ];
   
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }
   
            $user->update($updateData);
   
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengupdate data user: ' . $e->getMessage()
            ], 500);
        }
    }


    public function show_ajax($id){
        try {
            $user = UserModel::with('level')->find($id);
           
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }
   
            return response()->json([
                'status' => true,
                'data' => [
                    'id' => $user->user_id,
                    'username' => $user->username,
                    'nama' => $user->nama,
                    'level' => $user->level->level_nama
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data user: ' . $e->getMessage()
            ], 500);
        }
    }
}



