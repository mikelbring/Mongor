<?php

class User extends Mongor\Model {

	public static $collection = 'users';

	public function name()
	{
		return $this->username;
	}

	public function story()
	{
		return $this->has_and_belongs_to_many('Story', 'User\Story', 'user_id', 'anime_id');
	}

}