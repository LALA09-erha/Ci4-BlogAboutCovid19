<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Users extends BaseController
{

    public function index()
    {
        $data = [
            'role' => session()->get('role'),
            'user' => session()->get('username')
        ];
        if ($data['role'] == 'Guest') {
            return view('home/tamplateguest', $data);
        } else if ($data['role'] == 'Admin') {
            return view('home/tamplateadmin', $data);
        } else {
            session()->setFlashdata('warning', 'Please Login First!');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->removeTempdata('role');
        return redirect()->to('/login');
    }

    public function forgot()
    {
        session();
        $data = [
            'title' => 'Registrasi Account',
            'valid' => \config\Services::validation(),
            'role' => session()->get('role'),
            'user' => session()->get('username')
        ];
        if ($data['role']) {
            return redirect()->to('/');
        }
        return view('home/forgot', $data);
    }

    public function confirm()
    {
        if (!$this->validate([
            'email' => 'required'
        ])) {
            $valid = \config\Services::validation();
            session()->setFlashdata('pesan', 'Please check first!');
            return redirect()->to('/forgot')->withInput()->with('valid', $valid);
        }
        $em = $this->request->getVar('email');
        $quer = $this->userModel->where('email', $em)->findAll();
        if ($quer == false) {
            session()->setFlashdata('warning', 'Couldn\'t find your Email');
            return redirect()->to('/forgot');
        }
        $email = \Config\Services::email();
        $email->setfrom('fikri41153.pesonaxii@gmail.com', 'Admin Unicorn');
        $email->setto($quer[0]['email']);
        $email->setsubject('Your Data');
        $email->setmessage('<b>Your Username :</b> ' . $quer[0]['username'] . '<br><b>Your Password : </b>' . $quer[0]['password']);
        if ($email->send()) {
            session()->setFlashdata('pesan', 'Email Succes Send');
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('warning', 'Email not Succes Send');
            return redirect()->to('/login');
        }
    }
    public function user()
    {
        $data = [
            'title' => 'Users',
            'users' => $this->userModel->findAll(),
            'role' => session()->get('role'),
            'user' => session()->get('username')
        ];
        if ($data['role'] == "Admin" || $data['role'] == 'admin') {
            return view('home/users', $data);
        } else {
            session()->setFlashdata('warning', 'Please Login First!');
            return redirect()->to('/login');
        }
    }
    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'users' => $this->userModel->find($_GET['id']),
            'role' => session()->get('role'),
            'user' => session()->get('username')
        ];
        if ($data['role'] == "Admin" || $data['role'] == 'admin') {
            return view('home/profile', $data);
        } else {
            session()->setFlashdata('warning', 'Please Login First!');
            return redirect()->to('/login');
        }
    }
    public function register()
    {
        session();
        $data = [
            'title' => 'Registrasi Account',
            'valid' => \config\Services::validation(),
            'role' => session()->get('role'),
            'user' => session()->get('username')
        ];
        if ($data['role']) {
            return redirect()->to('/');
        } else {
            return view('home/register', $data);
        }
    }
    public function login()
    {
        session();
        $data = [
            'title' => 'Page Login',
            'valid' => \config\Services::validation(),
            'users' => $this->userModel->findAll(),
            'role' => session()->get('role'),
            'user' => session()->get('username')
        ];
        if ($data['role']) {
            return redirect()->to('/');
        } else {
            return view('home/login', $data);
        }
    }
    public function save()
    {
        session();
        if (!$this->validate([
            'email' => 'required|is_unique[users.email]',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required',
            'password2' => 'required',
            'cek' => 'required'
        ])) {
            $valid = \config\Services::validation();
            session()->setFlashdata('pesan', 'Please check first!');
            return redirect()->to('/register')->withInput()->with('valid', $valid);
        }

        if ($this->request->getVar('password') != $this->request->getVar('password2')) {
            session()->setFlashdata('pesan', 'Password doesn\'t match');
            return redirect()->to('/register');
        };
        //enkripsi
        $encrypter = \Config\Services::encrypter();
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        // dd($encrypter->decrypt($password));
        $this->userModel->save([
            'role' => $this->request->getVar('role'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $password
        ]);
        session()->setFlashdata('pesan', 'Account added successfully');
        return redirect()->to('/login');
    }
    public function sistem()
    {
        // $query
        session();
        $encrypter = \Config\Services::encrypter();
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            $valid = \Config\Services::validation();
            return redirect()->to('/login')->withInput()->with('valid', $valid);
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $quer = $this->userModel->where('username', $username)->findAll();
        $valid = \config\Services::validation();
        if ($this->request->getVar('remember') == true) {
            session()->setTempdata('role', $quer[0]['role'], time() + 30);
            session()->setTempdata('username', $quer[0]['username'], time() + 30);
            return redirect()->to('/');
        }
        if ($quer == true) {
            $pass = $quer[0]['password'];
            if ($pass == $password) {
                session()->setTempdata('role', $quer[0]['role'], 60 * 60 * 60 * 24);
                session()->setTempdata('username', $quer[0]['username'], 60 * 60 * 60 * 24);
                return redirect()->to('/');
            } else {
                $pass1 = password_verify($password, $quer[0]['password']);
                if ($pass1 == true) {
                    session()->setTempdata('role', $quer[0]['role'], 60 * 60 * 60 * 24);
                    session()->setTempdata('username', $quer[0]['username'], 60 * 60 * 60 * 24);
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('warning', 'Wrong password. Try again or click Forgot password to reset it.');
                    return redirect()->to('/login');
                }
            }
        } else {
            session()->setFlashdata('warning', 'Couldn\'t find your Username');
            return redirect()->to('/login');
        }
    }

    public function edit()
    {
        session();
        $data = [
            'title' => 'Edit Account',
            'valid' => \config\Services::validation(),
            'users' => $this->userModel->find($_GET['id']),
            'role' => session()->get('role'),
            'user' => session()->get('username')
        ];
        // dd($data['users']);
        if ($data['role'] == "Admin" || $data['role'] == 'admin') {
            return view('home/edit', $data);
        }
        return redirect()->to('/');
    }

    public function update()
    {
        session();
        $userLama = $this->userModel->find($_GET['id']);
        if ($userLama['email'] == $this->request->getVar('email')) {
            $rulesEmail = 'required';
        } else {
            $rulesEmail = 'required|is_unique[users.email]';
        }
        if ($userLama['username'] == $this->request->getVar('username')) {
            $rulesUser = 'required';
        } else {
            $rulesUser = 'required|is_unique[users.username]';
        }

        if (!$this->validate([
            'role' => 'required',
            'email' => $rulesEmail,
            'username' => $rulesUser,
            'password' => 'required',
            'password2' => 'required',
            'cek' => 'required'
        ])) {
            $valid = \config\Services::validation();
            session()->setFlashdata('pesan', 'Please check first!');
            return redirect()->to('/edit?id=' . $_GET['id'])->withInput()->with('valid', $valid);
        }

        if ($userLama['password'] != $this->request->getVar('password')) {
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        } else {
            $password = $userLama['password'];
        }
        $this->userModel->save([
            'id' => $_GET['id'],
            'role' => $this->request->getVar('role'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $password
        ]);
        session()->setFlashdata('pesan', 'Account Update successfully');
        return redirect()->to('/user');
    }
    public function hapus($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data Deleted Successfully');
        return redirect()->to('/user');
    }
}