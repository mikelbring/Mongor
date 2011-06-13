<?php

return array(

   'GET /users' => function()
   {
      $user = new User();

      /* Select all users */
      foreach($user->find() as $row)
      {
         echo $row['username'];
      }

      /* Select single user where username = mikelbring */
      $user_data = $user->get(array('username' => 'mikelbring')); // Get all fields
      $user_data = $user->get(array('username' => 'mikelbring'), array('email')); // Only get email field

      echo $user_data['email']; // print data

      /* Update user's email where username = mikelbring */
      $user->update(array('username' => 'mikelbring'), array('$set' => array('email' => 'myemail@domain.com')));

      /* Delete user where username = mikelbring */
      $user->delete(array('username' => 'mikelbring'));
   }

);