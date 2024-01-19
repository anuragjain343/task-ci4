<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Home extends BaseController
{
    public function index(): string{
        return view('login');
    }
    public function signUp(): string{
        return view('signUp');
        
    }
   
   public function userRegister(): string{
    
        $data = [];
        helper(['form']);
        if($this->request->getMethod() == "post"){
            
            $rules = [
                "firstName" => "required|min_length[4]|max_length[20]",
                "lastName" => "required|min_length[3]|max_length[20]",
                "email" => "required|min_length[3]|max_length[20]|valid_email|is_unique[users.email]",
                "password" => "required|min_length[6]|max_length[20]",
                'profilePic' =>"required",
                "dob"=>  "required",
                "gender"=>  "required"
            
            ];
           // print_r($this->validate($rules)); die();
            if(!$rules){
                //print_r('dsd'); die();
                $res['status']= 0; 
                $res["msg"] = $this->validator;
                echo json_encode($res);die();
             }else{

                $user = new UserModel();
                $file = $this->request->getFile('profilePic');
                $result =$user->getUsers($this->request->getVar("email"));
                if($result->connID->affected_rows){
                    $res['status']= 0; 
                    $res["msg"] = 'Email already exists.';
                    echo json_encode($res);die();
                }
               
                if ($file->isValid() && ! $file->hasMoved()) {
                    // Get file name and extension
                    $name = $file->getName();
                    $ext = $file->getClientExtension();
                    // Get random file name
                    $newName = $file->getRandomName();
                    // Store file in public/uploads/ folder
                    $file->move('../public/uploads', $newName);
                   // File path to display preview
                   $filepath = base_url()."/uploads/".$newName;       
                }else{

                    $res['status'] = 0;
                    $data['msg'] = 'File not uploaded.'; 
                    echo json_encode($res);die();
                }
                $hashed_password = password_hash ($this->request->getVar("password"), PASSWORD_DEFAULT);     
                $userdata = [
                    "firstName" => $this->request->getVar("firstName"),
                    "lastName" => $this->request->getVar("lastName"),
                    "email" => $this->request->getVar("email"),
                    "password" => $hashed_password,
                    "profilePic" => $newName,  
                    "dob" => $this->request->getVar("dob"),
                    "geder" => $this->request->getVar("gender"),
                    "userRole"=>'user',
                    'createdAt'=>date('Y-m-d H:i:s'),
                    'updatedAt' =>date('Y-m-d H:i:s')
                ];
                
                $user->save($userdata);
                $res['status']= 1;
                $res["msg"] ="Successful Registration.";
                echo json_encode($res);die();
            }
        
        }
    }

    public function userLogin(): string{
    
        $data = [];
        helper(['form']);
        if($this->request->getMethod() == "post"){
            
            $rules = [
                "email" => "required|min_length[3]|max_length[20]|valid_email",
                "password" => "required|min_length[6]|max_length[20]"
            ];
          
            if(!$rules){
                
                $res['status']= 0; 
                $res["msg"] = $this->validator;
                echo json_encode($res);die();
             }else{

                $user = new UserModel();
                $email = $this->request->getVar('email'); 
                $result = $user->where('email', $email)->first();
                //print_r($result); die();
                if(!empty($result)){
                    //die($result['password']);
                    if(password_verify($this->request->getVar("password"), $result['password'])){
                        $session = session();
                        $newdata = [
                         'username'  => $result['firstName'],
                         'email'     => $result['email'],
                         'isLoggedIn' => true,
                         'userRole'  =>'user'
                        ];

                        $session->set($newdata);

                        $res['status']= 1;
                        $res["msg"] ="Login Successful Redireting...";
                        echo json_encode($res);die();
                    }else{
                        $res['status']= 0; 
                        $res["msg"] = 'Email or password incoreect!';
                        echo json_encode($res);die();
                    }
                }else{
                    $res['status']= 0; 
                    $res["msg"] = 'Email or password incoreect!';
                    echo json_encode($res);die(); 
                }

                }
            }   
    }
    
    public function deshboard(): string{
         $user = new UserModel();
         $email = 'anuragjain343@gmail.com'; 
         $result['data'] = $user->where('email', $email)->first();
         
         //print_r(); die();
         return view('deshboard',$result);
    }
     public function doForgotPassword(): string{
    
        $data = [];
        helper(['form']);
        if($this->request->getMethod() == "post"){
            
            $rules = [
                "email" => "required|min_length[3]|max_length[20]|valid_email",
                "password" => "required|min_length[6]|max_length[20]",
                "rePassword" => "required|min_length[6]|max_length[20]",
            ];
          
            if(!$rules){
                
                $res['status']= 0; 
                $res["msg"] = $this->validator;
                echo json_encode($res);die();
             }else{

                $user = new UserModel();
                $email = $this->request->getVar('email'); 
                $result = $user->where('email', $email)->first();
                if($this->request->getVar("password") != $this->request->getVar("rePassword")){
                    $res['status']= 0;
                    $res["msg"] ="Password and Re-Password should be same.";
                    echo json_encode($res);die();
                }
                
                $hashed_password = password_hash($this->request->getVar("password"), PASSWORD_DEFAULT);
                //print_r($result); die();
                if(!empty($result)){ 
                    $data = [
                    'email'    => $result['email'],
                    'password' =>$hashed_password
                    ];
                    $rest = $user->update($result['id'], $data); 
                    if(!$rest){
                        $res['status']= 0; 
                        $res["msg"] = 'Somthing went worng.';
                        echo json_encode($res);die(); 
                    }
                    //print_r($res); die();
                      $res['status']= 1; 
                      $res["msg"] = 'Password successfully reset ';
                      echo json_encode($res);die();                
                    
                }else{
                    $res['status']= 0; 
                    $res["msg"] = 'Email or password incoreect!';
                    echo json_encode($res);die(); 
                }

                }
            }   
    }

    public function logout() : string{
        
        session()->remove('isLoggedIn');
        session()->remove('userRole');
        session()->remove('username');
        session()->remove('email');
        return redirect()->to(site_url('/'));
        
    }

     public function forgotPassword(): string{
        return view('forgotPassword');
    }

    public function expoertData(): string{

       $user = new UserModel();
       $result = $user->where('email', 'anuragjain343@gmail.com')->first(); 
       //print_r($result); die();
      /*$db      = \Config\Database::connect();
      $builder = $db->table('users');   

      $query = $builder->query("SELECT * FROM users");

      $users = $query->getResult();*/
      
      $fileName = 'users1.xlsx';  
      $spreadsheet = new Spreadsheet();

      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Id');
      $sheet->setCellValue('B1', 'Name');
      $sheet->setCellValue('C1', 'Email');
      $sheet->setCellValue('D1', 'Profile');
      $sheet->setCellValue('E1', 'DOB');
     
      $rows = 2;

     // foreach ($users as $val){
          $sheet->setCellValue('A' . $rows, $result['id']);
          $sheet->setCellValue('B' . $rows, $result['firstName']);
          $sheet->setCellValue('C' . $rows, $result['email']);
          $sheet->setCellValue('D' . $rows, $result['profilePic']);
          $sheet->setCellValue('E' . $rows, $result['dob']);
          $rows++;
      //} 
      $writer = new Xlsx($spreadsheet);
      $writer->save("../public/uploads/".$fileName);
      header("Content-Type: application/vnd.ms-excel");
      base_url()."/upload/".$fileName;
      redirect('/deshboard'); 
  }
    
    
}
