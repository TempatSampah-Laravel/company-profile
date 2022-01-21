<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Modul;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $title_page = 'Role Access';
        $config = ConfigWeb::all()->first();

        $role = Role::all();

        return view('admin.role.index', compact('title_page','config','role'));
    }

    public function create()
    {
        $title_page = 'Create Role Access';
        $config = ConfigWeb::all()->first();
        return view('admin.role.create', compact('title_page', 'config'));
    }

    public function store(RoleRequest $request, Role $role)
    {
        $data = $request->validated();

        Role::create($data);

        return redirect()->route('role.index')->with(['success' => 'Role Access Create Successfully']);
    }

    public function edit($id)
    {
        $title_page = 'Edit Role Access';
        $config = ConfigWeb::all()->first();
        $role = Role::findOrFail($id);

        return view('admin.role.edit', compact('title_page','config','role'));
    
    }

    public function update(RoleRequest $request, $id)
    {
        $data = $request->validated();

        $role = Role::findOrFail($id);

        $role->update($data);

        return redirect()->back()->with(['success' => 'Role Access Update Successfully']);
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()->with(['success' => 'Role Access Delete Successfully']);
    }

    public function roleAccess($id)
    {
        $title_page = 'Setting Role Access';
        $config = ConfigWeb::all()->first();
        $role = Role::findOrFail($id);
        $modul = Modul::all();

        return view('admin.role.access', compact('title_page','config','role', 'modul'));
    }

    public function proses_role_access(Request $request)
    {
        $mod = count($request->modul);
		$modul = $request->modul;
		
		for( $i = 0; $i <$mod;$i++ )
        {
            $id = $modul[$i];
            $view = !empty($request->input('view-'.$id)) ? $request->input('view-'.$id) : '';
            $input = !empty($request->input('input-'.$id)) ? $request->input('input-'.$id) : '';
            $update   = !empty($request->input('update-'.$id))   ? $request->input('update-'.$id)   : '';
            $delete  = !empty($request->input('delete-'.$id))  ? $request->input('delete-'.$id)  : '';
            $posting= !empty($request->input('posting-'.$id))? $request->input('posting-'.$id): '';
            
            if($view == 'on') {
                $view = 1;
            }else{
                $view = 0;
            }

            if($input == 'on'){
                $input = 1;
            }else{
                $input = 0;
            }

            if($update == 'on'){
                $update = 1;
            }else{
                $update =0;
            }

            if($delete =='on'){
                $delete = 1;
            }else{
                $delete =0;
            }

            if($posting =='on'){
                $posting =1;
            }else{
                $posting=0;
            }
            
            //cek apakah sudah diinput sebelumnya ?
            $cek = DB::table('user_moduls')
                    ->where('role_id', '=', $request->role_id)
                    ->where('modul_id', '=', $modul[$i])
                    ->count();
            if ($cek == 0)
            {	
                //jika belum ada ditabel user_modul maka di input dulu	
                DB::table('user_moduls')->insert([
                    'role_id'=>$request->role_id,
                    'modul_id'=>$modul[$i],
                    'view'=>$view,
                    'input'=>$input, 
                    'update'=>$update,
                    'delete' => $delete,
                    'posting' => $posting
                ]);

            } else {
                //jika sudah ada ditabel user_modul maka cukup update	
                DB::table('user_moduls')->where('role_id',$request->role_id)->where('modul_id',$modul[$i])->update([
                    'view'=>$view,
                    'input'=>$input, 
                    'update'=>$update,
                    'delete' => $delete,
                    'posting' => $posting
                ]);
            }
		
		}
    	
        return redirect('admin-panel/role/access/'.$request->role_id)->with(['success' => 'Role Access Update Successfully']);
    }
}
