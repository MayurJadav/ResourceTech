<?php

namespace App\Http\Controllers;

use App\Models\Multiple_File;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function viewlogin(Request $request)
        {
            if ($request->session()->has('auth')) {
                return redirect('index');
            } else {
                return view('adminpanel.authentication.login');
            }
        }

    public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|min:5|max:12'
            ]);

            $user = User::where('email', '=', $request->email)->first();
            
            if($user == null)
            {
                return back()->with('error', 'Enter valid email');
            }

            if ($user->status == 0) {
                return back()->with('error', 'Permission denied');
            }
            else{
                if ($user) {
                    if (Hash::check($request->password, $user->password)) {
                        $request->session()->put('auth', $user->id);
                        $request->session()->put('role_id', $user->role_id);
                        $request->session()->put('firstname', $user->first_name);
                        $request->session()->put('lastname', $user->last_name);
                        $request->session()->put('photo', $user->photo);
                        return redirect('index')->with('success', "You've logged in");
                    } else {
                        return back()->with('error', 'Password not match');
                    }
                } else {
                    return back()->with('error', 'Email not found');
                }
            }
        }
    public function logout(Request $request)
        {
            if (session()->has('LOGIN_STATUS')) {
                session()->forget('LOGIN_STATUS');
            }
            session()->forget('auth');
            session()->forget('role_id');
            session()->forget('firstname');
            session()->forget('lastname');
            session()->forget('photo');

            return redirect('login')->with('success', "You've logged out");
        }

    public function viewforgotpassword(Request $request)
        {
            return view('adminpanel.authentication.forgot-password');
        }

    public function viewresetpassword(Request $request, $token = null)
        {
            return view('adminpanel.authentication.reset-password')->with(['token' => $token, 'email' => $request->email]);
        }

    public function forgotpassword(Request $request)
        {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);

            $token = Str::random(65);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token
            ]);

            $action_link = route('reset-password', ['token' => $token, 'email' => $request->email]);

            $body = "We are received a request to reset the password for account associated with " . $request->email . " You can reset your password by clicking the link below";

            Mail::send('adminpanel.authentication.mail-send', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
                $message->from('mypc3281@gmail.com', 'Hello, Your forget password link');
                $message->to($request->email, 'My name')->subject('Reset Password');
            });
            return redirect()->back()->with('success', 'Your forget password link is send your email');
        }

    public function updatepassword(Request $request)
        {
            $request->validate([
                'email' => 'required|unique:users|email|max:255',
                'password' => 'required|min:5|max:12',
                'confirmpassword' => 'required|min:5|max:12'
            ]);

            $check_token = DB::table('password_resets')->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

            if (!$check_token) {
                return redirect()->back()->with('error', 'Invalid token');
            } else {
                User::where('email', $request->email)->update([
                    'password' => Hash::make($request->password)
                ]);

                DB::table('password_resets')->where([
                    'email' => $request->email
                ])->delete();
            }

            return redirect()->route('login')->with('success', 'Your password has been changed');
        }

    public function user_addview()
        {
            return view('adminpanel.user.add');
        }

    public function user_add(Request $request)
            {
                DB::table('users')->where('email', $request->email)->delete();

                $request->validate([
                    'first_name' => 'required|min:2|max:10',
                    'last_name' => 'required|min:2|max:10',
                    'phone' => 'required|min:10|max:10',
                    'email' => 'required|unique:users|email|max:255',
                    'role_id' => 'required|numeric'
                ]);

                $adduser = new User();

                $adduser->first_name = $request->get('first_name');
                $adduser->last_name = $request->get('last_name');
                $adduser->phone = $request->get('phone');
                $adduser->email = $request->get('email');
                $adduser->role_id = $request->get('role_id');

                $adduser->save();

                $token = Str::random(65);

                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token
                ]);

                $action_link = route('profile-edit',['token'=>$token,'email'=>$request->email]);

                $body = "Hello, ";
                $body.= $request->get('first_name');
                $body.= "<br> Update your profile and then login to your account.";

                Mail::send('adminpanel.user.mail-send', ['action_link'=>$action_link,'body'=>$body], function ($message) use ($request) {
                        $message->from('mypc3281@gmail.com','Invatation Link');
                        $message->to($request->email,'My name')->subject('Invatation Link');
                });

                return redirect()->back()->with('success', 'User has been added');
            }

    public function user_view(Request $request)
        {
            $data = User::join('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.role_name')
                ->paginate(10);
            return view('adminpanel.user.view', compact('data'));
        }

    public function user_edit($id)
        {
            $edituser = User::find($id);
            $editrole = Role::all();

            $edudocs = Multiple_File::where('type','educational_qualification')->get();
            $edudoc1 = Multiple_File::where('user_id',$id)->get();
            $edudoc =[];
            foreach ($edudoc1 as $doc2) {
                foreach ($edudocs as $doc3) {
                    if ($doc2->id == $doc3->id) {
                        array_push($edudoc,$doc2);
                    }
                }
            }

            $prodocs = Multiple_File::where('type','professional_experience')->get();
            $prodoc =[];
            foreach ($edudoc1 as $doc2) {
                foreach ($prodocs as $doc3) {
                    if ($doc2->id == $doc3->id) {
                        array_push($prodoc,$doc2);
                    }
                }
            }
            return view('adminpanel.user.edit', compact('edituser', 'editrole','edudoc','prodoc'));
        }

    public function user_update(Request $request, $id)
        {
            $request->validate([
                'first_name' => 'required|min:2|max:10',
                'last_name' => 'max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|min:10|max:10',
                'monthly_pay_grade' => 'required|max:255',
                'branch_name' => 'max:255',
                'date_of_birth' => 'required|date',
                'date_of_joining' => 'required|date',
                'date_of_leaving' => 'date',
                'address' => 'max:255',
                'emergency_contact' => 'min:10|max:10',
                'gender'=>'required',
                'marital_status'=>'',
                'photo'=>'mimes:png,jpg,jpeg,png',
            ]);

            $updatedata = User::find($id);
            $updatedata->first_name = $request->get('first_name');
            $updatedata->last_name = $request->get('last_name');
            $updatedata->phone = $request->get('phone');
            $updatedata->email = $request->get('email');
            $updatedata->branch_name = $request->get('branch_name');
            $updatedata->monthly_pay_grade = $request->get('monthly_pay_grade');
            $updatedata->gender = $request->get('gender');
            $updatedata->date_of_birth = $request->get('date_of_birth');
            $updatedata->date_of_joining = $request->get('date_of_joining');
            $updatedata->date_of_leaving = $request->get('date_of_leaving');
            $updatedata->marital_status = $request->get('marital_status');
            $updatedata->status = $request->get('status','0');

            if ($request->hasFile('photo')) {
                $destination = 'storage/user/' . $updatedata->photo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('photo');
                $extention = $file->getClientOriginalName();
                $filename = $extention;
                $file->move('storage/user/', $filename);
                $updatedata->photo = $filename;
            }

            $updatedata->address = $request->get('address');
            $updatedata->emergency_contact = $request->get('emergency_contact');
            $updatedata->role_id = $request->get('role');
            $inserteddata = $updatedata->save();

            $documents = [];
            if ($inserteddata) {
                    if ($files = $request->file('educational_qualification')) {
                        foreach ($files as $file) {
                            $name = $file->getClientOriginalName();
                            $file->move('storage/documents/', $name);
                            $documents[] = ['documents' => $name, 'type' => 'educational_qualification', 'user_id' => $updatedata->id];
                        }
                    }

                    if ($files = $request->file('professional_experience')) {
                        foreach ($files as $file) {
                            $name = $file->getClientOriginalName();
                            $file->move('storage/documents/', $name);
                            $documents[] = ['documents' => $name, 'type' => 'professional_experience', 'user_id' => $updatedata->id];
                        }
                    }

            }
            Multiple_File::insert($documents);
            return redirect('user/user-view')->with('success', 'User has been updated');
        }

    public function user_delete($id)
        {
            $documents = Multiple_File::where('user_id',$id)->get();

            foreach ($documents as $document) {
                if ($document->documents) {
                    $destination = 'storage/documents/'.$document->documents;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }            
                }           
             }
             $documents_delete = Multiple_File::where('product_id',$id)->delete();

            $deletedata = User::find($id);
            $destination = 'upload/' . $deletedata->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $deletedata->delete();
            return redirect('user/user-view')->with('success', 'User has been deleted');
        }

    public function profile_edit(Request $request)
        {
            $token_exist = 0;
            $tokens = DB::table('password_resets')->get();
            foreach ($tokens as $token) {
                if ($token->token == $request->token) {
                    $token_exist = 1;
                }
            }
            if($token_exist == 1){
                $email = $request->email;
                $user = User::where('email',$email)->first();                 
                        session()->put('auth', $user->id);
                return view('adminpanel.user.profile',compact('user'));
            }else{
                return('<center style="margin-top:290px; color:red;"><h1>Your link is expired</h1></center>');
            }
        }

    public function profile_update(Request $request,$id)
        {
            $request->validate([
                'first_name' => 'required|min:2|max:10',
                'last_name' => 'max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|min:5|max:12',
                'phone' => 'required|min:10|max:10',
                'monthly_pay_grade' => 'required|max:255',
                'branch_name' => 'max:255',
                'date_of_birth' => 'required|date',
                'date_of_joining' => 'required|date',
                'date_of_leaving' => 'date',
                'address' => 'max:255',
                'emergency_contact' => 'min:10|max:10',
                'gender'=>'required',
                'marital_status'=>'',
                'photo'=>'mimes:png,jpg,jpeg,png',
            ]);

            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone = $request->phone;
            $user->monthly_pay_grade = $request->monthly_pay_grade;
            $user->branch_name = $request->branch_name;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->date_of_joining = $request->date_of_joining;
            $user->date_of_leaving = $request->date_of_leaving;
            $user->marital_status = $request->marital_status;
            $user->status = $request->get('status','1');
            $user->address = $request->address;
            $user->emergency_contact = $request->emergency_contact;
            if ($request->hasfile('photo')) {
                $destination = 'storage/user/'.$request->photo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('storage/user/',$filename);
                $user->photo = $filename;
            }
            $datainsert = $user->update();
            $user = User::latest()->first();
            $documents = [];
            if ($datainsert) {
                    if ($files = $request->file('educational_qualification')) {
                        foreach ($files as $file) {
                            $name = $file->getClientOriginalName();
                            $file->move('storage/documents/', $name);
                            $documents[] = ['documents' => $name, 'type' => 'educational_qualification', 'user_id' => $user->id];
                        }
                    }

                    if ($files = $request->file('professional_experience')) {
                        foreach ($files as $file) {
                            $name = $file->getClientOriginalName();
                            $file->move('storage/documents/', $name);
                            $documents[] = ['documents' => $name, 'type' => 'professional_experience', 'user_id' => $user->id];
                        }
                    }

            }
            Multiple_File::insert($documents);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect('login');
        }

    public function my_edit_profile()
     {
        $id = session()->get('auth');
            $user = User::find($id);
         return view('adminpanel.user.edit-profile',compact('user'));
         }
        
    public function myprofile_update(Request $request, $id)
     {
        $request->validate([
            'first_name' => 'required|min:2|max:10',
            'last_name' => 'max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:5|max:12',
            'phone' => 'required|min:10|max:10',
            'monthly_pay_grade' => 'required|max:255',
            'branch_name' => 'max:255',
            'date_of_birth' => 'required|date',
            'date_of_joining' => 'required|date',
            'date_of_leaving' => 'date',
            'address' => 'max:255',
            'emergency_contact' => 'min:10|max:10',
            'gender'=>'required',
            'marital_status'=>'',
            'photo'=>'mimes:png,jpg,jpeg,png',
        ]);
    
                $email_exist = 0;
                $emails = User::all();
                foreach ($emails as $email) {
                    if ($email->email == $request->email) {
                        $email_exist = 1;
                    }
                }
                $myemail = User::find($id);
                if ($myemail->email == $request->email) {
                    $email_exist = 0;
                }

                
                if($email_exist == 0){
                $user = User::find($id);
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->monthly_pay_grade = $request->monthly_pay_grade;
                $user->branch_name = $request->branch_name;
                $user->gender = $request->gender;
                $user->date_of_birth = $request->date_of_birth;
                $user->date_of_joining = $request->date_of_joining;
                $user->date_of_leaving = $request->date_of_leaving;
                $user->marital_status = $request->marital_status;
                $user->address = $request->address;
        
                if($request->hasfile('photo')) {
                    $destination = 'storage/user/'.$user->photo;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('photo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('storage/user/',$filename);
                    $user->photo = $filename;
                }
        
                $userupdate = $user->update();
            }else{
                return redirect()->back()->with('error','Please Enter New Email This Email Is Already Exists');

            }
                if ($userupdate) {
                    if ($request->hasFile('educational_qualification')) {
                        $documents = [];
                        foreach ($request->file('educational_qualification') as $file) {
                            $extension = $file->getClientOriginalName();
                            $filename = time().$extension;
                            $file->move('storage/documents/',$filename);
                            $documents[] = ['documents' => $filename,
                                            'type' => 'educational_qualification',
                                            'user_id' => $user->id];
                        }
                    Multiple_File::insert($documents);
                    }
        
                    if ($request->hasFile('professional_experience')) {
                        $documents = [];
                        foreach ($request->file('professional_experience') as $file) {
                            $extension = $file->getClientOriginalName();
                            $filename = time().$extension;
                            $file->move('storage/documents/',$filename);
                            $documents[] = ['documents' => $filename,
                                            'type' => 'professional_experience',
                                            'user_id' => $user->id];
                        }
                    Multiple_File::insert($documents);
                    }
                  }
        
                  return redirect('index')->with('success','Profile has been updated');
         }

     public function mydoc_update($id){
            $file = Multiple_File::find($id);
            if ($file->documents != "") {
                $destination = '/storage/documents/'.$file->documents;
                if (File::exists($destination)) {
                    File::delete($destination);
                }   
                $file->delete();
            }else{
                return redirect()->back()->with('error','Something Went Wrong');
        
            }
            return redirect()->back()->with('success','Your File Deleted');

        }
}