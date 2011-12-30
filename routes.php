<?php

return array(

	'GET /' => function()
	{
		$users = User::skip(1)->take(1)->get();

		foreach($users as $row)
		{
			echo $row->username .'<br />';
		}
	},

	'GET /update' => function()
	{
		$user = User::where(array('username' => 'mike'))->first();
		// $user = User::where('username', 'mike')->first();
		$user->email = 'email@domain.com';
		$user->save();

		print_r($user);
	},

	'GET /insert' => function()
	{
		$story = new Story;
		$story->name = 'Hello World';
		$story->save();

		print_r($story);
	},

	'GET /make_relation' => function()
	{
		$story = Story::where(array('name' => 'Hello World'))->first();
		$user = User::where('username', 'mike')->first();

		$user_story = new User\Story();
		$user_story->user_id = $user->_id;
		$user_story->story_id = $story->_id;
		$user_story->save();

	},

	'GET /get_relation' => function()
	{
		$user = User::where('username', 'mike')->first();

		print_r($user->story);
	}

);