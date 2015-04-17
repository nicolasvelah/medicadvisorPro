<?php namespace MedicAdvisor\Services;

use MedicAdvisor\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
			'name' => 'required|max:255',
			'lastname' => 'required|max:255',
            'phone' => 'required|numeric',
            'blood_type' => 'required',
            'donor' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required|max:255',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        //print_r($data);
        //exit;

		return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['name'].$data['lastname']))).rand(00000, 99999),
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'blood_type' => $data['blood_type'],
            'donor' => $data['donor'],
            'country' => $data['country'],
            'city' => $data['city'],
            'address' => $data['address'],
            'medals' => '',
            'type' => $data['type']
		]);
	}

}

