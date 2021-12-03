<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Login'
		];
		return view('home/login', $data);
	}
	public function user()
	{
		$data = [
			'title' => 'Users'
		];
		return view('home/users', $data);
	}
	public function profile()
	{
		$data = [
			'title' => 'Profile'
		];
		return view('home/profile', $data);
	}
}