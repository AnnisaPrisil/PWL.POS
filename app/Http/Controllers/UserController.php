<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Level;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use Symfony\Contracts\Service\Attribute\Required;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller{
    public function index(){
       
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];
   
        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];
   
        $activemenu = 'user';    
        $level = Level::all();
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activemenu' => $activemenu, 'level' => $level ]);
   




        //$user = UserModel::all();
        //return view('user',['data'=>$user]);


        /*$data = [
            'username' => 'customer-1',
            'Level_id' => 4,
            'nama' => 'pelanggan',
            'password' => Hash::make('12345'),
        ];*/


        /*UserModel::insert($data);
        $user = UserModel::all();
        return view('user', ['data' => $user]);*/


        /*$data =[
            'nama'=> 'Pelanggan Pertama',
        ];
        UserModel::where('username','customer-1')->update($data);
        $user = UserModel::all();
        return view('user',['data'=>$user]);*/


        /*$data=[
            'level_id'=>2,
            'username'=>'manager_tiga',
            'nama'=>'manager 3',
            'password'=> Hash::make('12345')
        ];
        UserModel::create($data);
        $user = UserModel::all();
        return view('user',['data'=>$user]);*/


        //$user = UserModel::find(1);
        //return view('user',['data'=>$user]);


        //$user =UserModel::where('level_id',1)->first();
        //return view('user', ['data'=>$user]);


        //$user =UserModel::firstwhere('level_id',1);
        //return view('user', ['data'=>$user]);


        /*$user =UserModel::findOr(20,['username','nama'],function(){
            abort(404);
        });
        return view('user',['data'=>$user]);*/


        //$user= UserModel::findOrFail(1);
        //return view ('user',['data'=>$user]);


        //$user =UserModel::where('level_id', 2)->count();
        //dd($user);
        //return view ('user',['data'=>$userCount]);


        //$userCount = UserModel::where('level_id', 2)->count();
        //return view('user', ['data' => $userCount]);


        /*$user = UserModel::firstOrCreate(
            [
                'username'=>'manager',
                'nama'=>'manager'
            ]
        );
        return view('user',['data'=>$user]);*/


        /*$user = UserModel::firstOrCreate(
            [
                'username'=>'manager22',
                'nama'=>'manager Dua Dua',
                'password'=> Hash::make('12345'),
                'level_id'=> 2
            ],
        );
        return view ('user',['data'=>$user]);*/


        /*$user = UserModel::firstOrNew(
            [
                'username'=>'manager',
                'nama'=>'manager'
            ]
        );
        return view('user',['data'=>$user]);*/


            /*$user = UserModel::firstOrNew(
            [
                'username'=>'manager33',
                'nama'=>'manager Tiga Tiga',
                'password'=> Hash::make('12345'),
                'level_id'=> 2
            ],
        );
        $user-> save();
        return view ('user',['data'=>$user]);*/


        /*$user = UserModel::create([
            'username'=>'manager55',
            'nama'=>'manager55',
            'password'=> Hash::make('12345'),
            'level_id'=> 2,
        ]);


        $user->username='manager55';


        $user->isDirty();
        $user->isDirty('username');
        $user->isDirty('nama');
        $user->isDirty(['nama','username']);
       
        $user->isClean();
        $user->isClean('username');
        $user->isClean('nama');
        $user->isClean(['nama','username']);


        $user->save();


        $user->isDirty();
        $user->isClean();
        dd($user->isDirty());*/


        /*$user =UserModel::create([
            'username'=>'manager11',
            'nama'=>'manager 11',
            'password'=> Hash::make('12345'),
            'level_id'=>2,
        ]);
        $user->username ='manager12';
        $user->save();


        $user->wasChanged();
        $user->wasChanged('username');
        $user->wasChanged(['username','level_id']);
        $user->wasChanged('nama');
        $user->wasChanged(['nama','username']);*/




        /*$user =UserModel::create([
            'username'=>'manager11',
            'nama'=>'manager 11',
            'password'=> Hash::make('12345'),
            'level_id'=>2,
        ]);
        $user->username ='manager12';
        $user->save();


        $user->wasChanged();
        $user->wasChanged('username');
        $user->wasChanged(['username','level_id']);
        $user->wasChanged('nama');
        dd($user->wasChanged(['nama','username']));*/


        /*$user = UserModel::all();
        return view('user',['data'=>$user]);


        //$user = UserModel::with('level')->get();
        //dd($user);


        $user=UserModel::with('level')->get();
        log::info('User data:',$user->toArray());
        return view('user',['data'=>$user]);*/
    }


    /*public function tambah(){
        return view('user_tambah');
    }


    public function tambah_simpan(Request $request){
        UserModel::create([
            'username'=>$request->username,
            'nama'=>$request->nama,
            'password'=>Hash::make('$request->password'),
            'level_id'=>$request->level_id
        ]);
        return redirect('/user');
    }


    public function ubah($id){
        $user = UserModel::where('user_id', $id)->firstOrFail();
        return view('user_ubah', ['data' => $user]);
    }


    public function ubah_simpan($id, Request $request){
        $user = UserModel::where('user_id', $id)->firstOrFail();
        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->level_id = $request->level_id;
        $user->save();
        return redirect('/user');
    }


    public function hapus($id){
        $user=UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }*/


    public function list(Request $request) {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');
   
        if ($request->filled('level_id')) {
            $users->where('level_id', $request->level_id);
        } 
   
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                /*$btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';*/
                
                $btn = '<button onclick="modalAction(\''.url('/user/' . $user->user_id . 
                    '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id . 
                    '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id . 
                    '/delete_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    public function create(){  
        $breadcrumb =(object)[
            'title'=> 'Tambah User',
            'list'=>['Home','User','Tambah']
        ];
        $page =(object)[
            'title'=>'Tambah User Baru'
        ];


        $level = Level::all();
        $activemenu='user';
        return view('user.create',['breadcrumb'=>$breadcrumb,'page'=>$page,'level'=>$level,'activemenu'=>$activemenu]);
    }


    public function store(Request $request){
        $request->validate([
            'username'=>'required|string|min:3|unique:m_user,username',
            'nama'=> 'required|string|max:100',
            'password'=>'required|min:5',
            'level_id' => 'required|integer'
           
        ]);


        UserModel::create([
            'username'=>$request->username,
            'nama'=>$request->nama,
            'password' => Hash::make($request['password']),
            'level_id' => $request['level_id']
        ]);


        return redirect('/user')->with('success','Data User Berhasil Disimpan');
    }

    public function create_ajax() {
        $level = Level::select('level_id','level_nama')->get();
        return view('user.create_ajax')
                    ->with('level',$level);
    }

    public function store_ajax(Request $request) {
        // cek apakah request berupa ajax
        if($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama'     => 'required|string|max:100',
                'password' => 'required|min:6'
            ];
    
            
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails()){
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(), // pesan error validasi
                ]);
            }
    
            UserModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }
    
        redirect('/');
    }

    public function edit_ajax(string $id) {
        $user = UserModel::find($id);
        $level = Level::select('level_id', 'level_nama')->get();

        return view('user.edit_ajax',['user' => $user, 'level' => $level]);

    }
    
    public function update_ajax(Request $request, $id){
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
            'level_id' => 'required|integer',
            'username' => 'required|max:20|unique:m_user,username,'.$id.',user_id',
            'nama' => 'required|max:100',
            'password' => 'nullable|min:6|max:20'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
            'status' => false,
            'message' => 'Validasi gagal.',  
            'msgField' => $validator->errors()
        ]);
    }    
    $check = UserModel::find($id);
        if ($check) {
            if(!$request->filled('password') ){
            $request->request->remove('password');
        }
        $check->update($request->all());
            return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate'
        ]);
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        }
        return redirect('/');
    }


    public function confirm_ajax(string $id) {
        $user = UserModel::find($id);

        return view('user.confirm_ajax', ['user' => $user]);
    }

    public function delete_ajax(Request $request){
        if ($request->ajax() || $request->wantJson()){
            $user = UserModel::find($id);
            if($user){
                $user->delete();
                return response()->json([
                    'status' => true,
                    'message' =>'Data berhasil dihapus'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message'=>'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }




    public function show(string $id){
        $user=UserModel::with('level')->find($id);
        $breadcrumb = (object)[
            'title'=>'Detail User',
            'list'=> ['Home','User','Detail']
        ];
        $page = (object)[
            'title'=> 'Detail User'
        ];
        $activemenu = 'user';


        return view('user.show',['breadcrumb'=>$breadcrumb,'page'=>$page,'user'=>$user, 'activemenu'=>$activemenu]);
    }


    public function edit (string $id){
        $user= UserModel::find($id);
        $level =Level::all();


        $breadcrumb = (object)[
            'title' => 'Edit User',
            'list' => ['Home','User','Edit']
        ];


        $page = (object)[
            'title'=> 'Edit user'
        ];


        $activemenu = 'user';
        return view ('user.edit',['breadcrumb'=>$breadcrumb,'page'=>$page,'user'=>$user,'level'=>$level,'activemenu'=>$activemenu]);
    }


    public function update(Request $request, string $id){
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,'.$id.',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);
        UserModel::find($id)->update([
            'username'=>$request->username,
            'nama'=>$request->nama,
            'password'=>$request->password ? bcrypt($request->password): UserModel::find($id)->password,
            'level_id'=>$request->level_id
        ]);


        return redirect ('/user')->with('succsess','Data user berhasil diubah');
    }


    public function destroy(string $id){
        $check = UserModel::find($id);
        if(!$check){
            return redirect ('/user')->with ('error','Data user tidak ditemukan');
        }
        try{
            UserModel::destroy($id);
            return redirect ('/user')->with ('success','Data user berhasil dihapus');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect ('/user')->with ('error','Data user gagal dihapus karena masih terdapat tabel lain yang masih terkait dengan data ini');
        }
    }
    

}













