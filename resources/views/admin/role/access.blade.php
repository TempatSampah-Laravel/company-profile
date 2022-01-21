
@if(user_akses2('role', Auth::user()->role_id)->posting ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role Access</a></li>
                    <li class="breadcrumb-item active">Setting Role Acccess</li>
                </ol>
            </div>
            <h4 class="page-title">Setting Role Access</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Setting Role Access {{ $role->name_role }}</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('role.index') }}" class="btn btn-success"> <i class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('role.proses') }}" enctype="multipart/form-data" method="post"
                    accept-charset="utf-8">
                    {{ csrf_field() }}
                    <input type="hidden" name="role_id" value="{{ $role->id }}">

                            <?php

                                echo"<table class='table table-striped table-bordered table-sm'>
                                <thead>
                                <tr>
                                <th class='center' width='5%'>No</th>
                                <th>Nama Modul</th>
                                <th width='10%' class='center'>View</th>
                                <th width='10%' class='center'>Input</th>
                                <th width='10%' class='center'>Edit</th>
                                <th width='10%' class='center'>Delete</th>
                                <th width='10%' class='center'>Posting</th>
                                </tr>
                                </thead>
                                <tbody>"; 

                                $no=1;

                                    foreach ($modul as $m){

                                        $role_id = $role->id;
                                        $name_modul = $m->name_modul;
                                        $modul_id = $m->id;


                                        $id_ubah_saja = array("3", "4", "10");
                                        $id_view_delete = array("xx");
                                        $id_view_saja = array("13","20","26", "11");
                                        $id_full_previlage = array("2");	

                                        if (in_array($modul_id,$id_ubah_saja)){
                                            echo "<tr>
                                            <td class='center'>$no</td>
                                            <td>$name_modul  <input type='hidden' name='modul[]' value='$modul_id'/></td>
                                            <td class='center'></td>
                                            <td class='center'></td>

                                        <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->update ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='update-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='update-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>


                                            <td class='center'></td>
                                            <td class='center'></td>
                                            </tr>";	
                                        } else if (in_array($modul_id,$id_view_delete)){
                                            echo "<tr>
                                            <td class='center'>$no</td>
                                            <td>$name_modul  <input type='hidden' name='modul[]' value='$modul_id'/></td>
                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            
                                            
                                            
                                            if (($cek->view ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='1' checked class=''/>";
                                        
                                        } else {

                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>



                                            <td class='center'></td>
                                            <td class='center'></td>


                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->delete ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='delete-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='delete-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>
                                            <td class='center'><label class='pos-rel'></td>
                                            </tr>";	
                                        } else if (in_array($modul_id,$id_view_saja)){
                                            echo "<tr>
                                            <td class='center'>$no</td>
                                            <td>$name_modul  <input type='hidden' name='modul[]' value='$modul_id'/></td>
                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            
                                            
                                            
                                            if (($cek->view ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='1' checked class=''/>";
                                        
                                        } else {

                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>



                                            <td class='center'></td>
                                            <td class='center'></td>
                                            <td class='center'></td>
                                            <td class='center'><label class='pos-rel'></td>
                                            </tr>";	
                                        }

                                        else if (in_array($modul_id,$id_full_previlage)){
                                            echo "<tr>
                                            <td class='center'>$no</td>
                                            <td>$name_modul  <input type='hidden' name='modul[]' value='$modul_id'/></td>
                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            
                                            if (($cek->view ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='1' checked class=''/>";
                                        
                                        } else {

                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>



                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->input ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='input-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='input-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>

                                        <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->update ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='update-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='update-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>


                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->delete ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='delete-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='delete-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>
                                            
                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if ($cek->posting ?? '0' =='1'){
                                            echo"<input class='ace' type='checkbox' name='posting-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='posting-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>
                                            </tr>";	
                                            
                                        }
                                        else 
                                        {
                                            echo "<tr>
                                            <td class='center'>$no</td>
                                            <td>$name_modul  <input type='hidden' name='modul[]' value='$modul_id'/></td>
                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            
                                            
                                            
                                            if (($cek->view ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='1' checked class=''/>";
                                        
                                        } else {

                                            echo"<input class='ace' type='checkbox' name='view-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>



                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->input ?? '0')=='1'){	
                                            echo"<input class='ace' type='checkbox' name='input-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='input-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>

                                        <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->update ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='update-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='update-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>


                                            <td class='center'><label class='pos-rel'>";
                                            $cek = user_akses($modul_id,$role_id);
                                            if (($cek->delete ?? '0')=='1'){
                                            echo"<input class='ace' type='checkbox' name='delete-$modul_id' values='1' checked>";
                                            } else {

                                            echo"<input class='ace' type='checkbox' name='delete-$modul_id' values='0'>";
                                            }
                                            echo"<span class='lbl'></span></label></td>
                                            <td class='center'><label class='pos-rel'></td>
                                            </tr>";	
                                        }
                                        
                                        $no++;
                                    }
                                echo "</tbody>
                                </table>";

                                echo'<div>
                                        <div class="row">
                                            <div class="text-lg-end my-1 my-lg-0">
                                                <button class="btn btn-sm btn-primary" type="submit" name="submit"> Update Role Access</button>    
                                            </div>    
                                        </div>
                                    </div>
                                
                                    ';
                                echo"</form>";

                            ?>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@endif