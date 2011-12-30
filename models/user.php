<?php

class User extends Mongor\Model {

	public static $collection = 'users';

	public function name()
	{
		return $this->username;
	}

	public function anime()
	{
		return $this->has_and_belongs_to_many('Anime', 'User\Anime', 'user_id', 'anime_id');
	}

}