<?php 

use Illuminate\Support\Facades\DB;

function user_akses($modul, $role)
{
    $session = DB::table('user_moduls')->where('modul_id', $modul)->where('role_id', $role)->first();
    return !empty($session) ? $session : false;
}

function user_akses2($modul, $role)
{
    $session = DB::table('user_moduls as a')->select('a.*')
        ->join('moduls as b', 'b.id', '=', 'a.modul_id')
        ->where('b.link', $modul)->where('a.role_id', $role)->first();
    return !empty($session) ? $session : false;
}

?>