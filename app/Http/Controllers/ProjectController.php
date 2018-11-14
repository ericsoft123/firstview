<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use File;
use DB;
use Datatables;
use auth;

//use Schema;

class ProjectController extends Controller
{
    public function add_company(Request $request)
    {
        $logo = $request->file('logo')[0];
        $company_name = $request->input('company_name');
        $company_email = $request->input('company_email');
        $company_website = $request->input('company_website');
        $company_desc = $request->input('company_desc');
        $company_model = $request->input('company_model');
        $rand_value = $request->input('rand_value');
        date_default_timezone_set('Africa/Johannesburg');
        $today1 = date('Y-m-d H:i:s', time());

        $target_dir = 'images/';
        $target_file[0] = $target_dir.date('d_m_Y_H_i_s').'_'.$_FILES['logo']['name'][0];
        move_uploaded_file($_FILES['logo']['tmp_name'][0], $target_file[0]);
        $filename = $target_file[0];
        $company_logo = $target_file[0];
        if (auth::check()) { //for security reason. allow only auth users to create a company
            $checkcompany = DB::select("select company_name from companies where company_name='$company_name'");
            if ($checkcompany) {//means that we have in our database company that has this name
    $message = 0; // we will give user a message to  change company name
    return response()->json(array('message' => $message), 200);
            } else {
                $username = Auth::user()->username;

                //check file format

                $file_parts = pathinfo($filename);

                $file_parts['extension'];
                $cool_extensions = array('jpg', 'png');

                if (in_array($file_parts['extension'], $cool_extensions)) {
                    //validate width and height
                    list($width, $height) = getimagesize($filename);
                    if ($width >= 100 and $height >= 100) {
                        DB::table('companies')
        ->insert([
 'company_name' => $company_name,
 'company_email' => $company_email,
 'company_website' => $company_website,
 'company_logo' => $company_logo,
 'company_desc' => $company_desc,
 'company_model' => $company_model,
 'rand_value' => $rand_value,
 'creator_username' => $username,
 'created_at' => $today1,
        ]);

                        $message = 1; // this message means that. there is no error and query has been executed successfully
                        return response()->json(array('message' => $message), 200);
                    } else {
                        File::delete($target_file[0]); //delete this file
                        $message = 2;

                        return response()->json(array('message' => $message), 200);
                    }
                    //validate width and height
                } else {
                    $message = 3;

                    return response()->json(array('message' => $message), 200);
                }

                //check file format
            }
        }
    }

    public function edit_company(Request $request)
    {
        $logo = $request->file('logo')[0];
        $id_company = $request->input('id_company');
        $company_name = $request->input('company_name');
        $company_email = $request->input('company_email');
        $company_website = $request->input('company_website');
        $old_companylogo = $request->input('company_logo');
        $company_desc = $request->input('company_desc');
        $company_model = $request->input('company_model');
        $rand_value = $request->input('rand_value');
        date_default_timezone_set('Africa/Johannesburg');
        $today1 = date('Y-m-d H:i:s', time());

        $target_dir = 'images/';
        $target_file[0] = $target_dir.date('d_m_Y_H_i_s').'_'.$_FILES['logo']['name'][0];
        move_uploaded_file($_FILES['logo']['tmp_name'][0], $target_file[0]);
        $filename = $target_file[0];
        $company_logo = $target_file[0];

        if (auth::check()) { //for security reason. allow only auth users to create a company
            $checkcompany = DB::select("select id, company_name from companies where company_name='$company_name' and id!='$id_company'");
            if ($checkcompany) {//means that we have in our database company that has this name
                $message = 0; // we will give user a message to  change company name
                return response()->json(array('message' => $message), 200);
            } else {
                //check file format

                $file_parts = pathinfo($filename);

                $file_parts['extension'];
                $cool_extensions = array('jpg', 'png');

                if (in_array($file_parts['extension'], $cool_extensions)) {
                    //validate width and height
                    list($width, $height) = getimagesize($filename);
                    if ($width >= 100 and $height >= 100) {
                        File::delete($old_companylogo);
                        $username = Auth::user()->username;
                        DB::table('companies')
        ->where('id', $id_company)
    ->update([
'company_name' => $company_name,
'company_email' => $company_email,
'company_website' => $company_website,
'company_logo' => $company_logo,
'company_desc' => $company_desc,
'company_model' => $company_model,
'rand_value' => $rand_value,
'creator_username' => $username,
'updated_at' => $today1,
    ]);

                        $message = 1; // this message means that. there is no error and query has been executed successfully
                        return response()->json(array('message' => $message), 200);
                    } else {
                        File::delete($target_file[0]); //delete this file
                        $message = 2;

                        return response()->json(array('message' => $message), 200);
                    }
                    //validate width and height
                } else {
                    $message = 3;

                    return response()->json(array('message' => $message), 200);
                }

                //check file format

                //delete logo file
                $message = 1; // this message means that. there is no error and query has been executed successfully
                return response()->json(array('message' => $message), 200);
            }
        }
    }

    public function delete_company(Request $request)
    {
        $id = $request->input('id_delete');
        $company_logo = $request->input('company_logo');

        if (auth::check()) { //for security reason. allow only auth users to be able to delete  a company he created
            $username = Auth::user()->username;

            File::delete($company_logo); //delete logo file

            $checkdelete = DB::delete("delete from companies where creator_username='$username' and id='$id'");

            if ($checkdelete) {
                $message = 1; // this message means that. there is no error and query has been executed successfully
                return response()->json(array('message' => $message), 200);
            }
        }
    }

    public function get_company(Request $request)//display company data in table
    {
        if (auth::check()) { //for security reason. this user will be able to see only companies he created
            //
            $username = Auth::user()->username;
            $companydata = DB::select("select *from companies where creator_username='$username'");

            return Datatables::of($companydata)
    ->addColumn('action', function ($id) {
        return '
        <a href="#"   onclick="return view_company(\''.$id->id.'\',\''.$id->company_name.'\',\''.$id->company_email.'\'
        ,\''.$id->company_website.'\',\''.$id->company_desc.'\'
        ,\''.$id->company_model.'\',\''.$id->rand_value.'\',\''.$id->company_logo.'\')" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
        <a href="#"   onclick="return viewedit_company(\''.$id->id.'\',\''.$id->company_name.'\',\''.$id->company_email.'\'
        ,\''.$id->company_website.'\',\''.$id->company_desc.'\'
        ,\''.$id->company_model.'\',\''.$id->rand_value.'\',\''.$id->company_logo.'\')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">  <i class="fa fa-edit"></i></a>
        <a href="#"   onclick="return viewdelete_company(\''.$id->id.'\',\''.$id->company_name.'\',\''.$id->company_logo.'\')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash" style="color:red"></i></a>

        
       
    
    
      ';
    })->make(true);
        }
    }

    public function logout()
    {
        Auth::logout();

        return view('auth.login');
    }
}
