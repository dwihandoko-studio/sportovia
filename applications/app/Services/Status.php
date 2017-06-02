<?php namespace App\Services;

class Status  {

	/**
	 * Set the login user statut
	 *
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function setLoginStatus($login)
	{
		session()->put('status', auth()->guard('admin')->id());
		session()->put('status', auth()->guard('user')->id());
	}

	/**
	 * Set the visitor user statut
	 *
	 * @return void
	 */
	public function setVisitorStatus()
	{
		session()->put('status', 'visitor');
	}

	/**
	 * Set the statut
	 *
	 * @return void
	 */
	public function setStatus()
	{
		if(!session()->has('status'))
		{
			session()->put('status', auth()->check() ?  auth()->user()->role->slug : 'visitor');
			session()->put('status', auth()->check() ?  auth()->admin()->role->slug : 'visitor');
		}
	}

}
