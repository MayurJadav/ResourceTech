<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multiple_File;

class DropzoneController extends Controller
{
    public function edustore(Request $request)
    {
        $id = session()->get('auth');
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('/storage/documents/'),$filename);
        
        $Edudoc = new Multiple_File();
            $Edudoc->documents = $filename;
            $Edudoc->type = 'educational_qualification';
            $Edudoc->user_id = $id;
            $Edudoc->save();
        
      return response()->json([ 'success' => $filename ]);
    }
    public function eduremvoeFile(Request $request)
    {
        // $name =  $request->get('name');
        // Multiple_File::where(['documents' => $name])->delete();

        $name =  $request->get('name');
        Multiple_File::where('documents',$name)->delete();
        $path=public_path().'/storage/documents/'.$name;
        if (file_exists($path)) {
            unlink($path);
        }
        return $name; 
    }
    public function prostore(Request $request)
    {
        $id = session()->get('auth');
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('/storage/documents/'),$filename);
        
        $prodoc = new Multiple_File();
            $prodoc->documents = $filename;
            $prodoc->type = 'professional_qualification';
            $prodoc->user_id = $id;
            $prodoc->save();
        
      return response()->json([ 'success' => $filename ]);
    }
    public function proremvoeFile(Request $request)
    {
        // $name =  $request->get('name');
        // Multiple_File::where(['documents' => $name])->delete();

        $name =  $request->get('name');
        Multiple_File::where('documents',$name)->delete();
        $path=public_path().'/storage/documents/'.$name;
        if (file_exists($path)) {
            unlink($path);
        }
        return $name; 
    }   
}