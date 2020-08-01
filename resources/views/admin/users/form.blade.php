<?php
  $allowedRoles = config('variables.role');
  if (Auth::user()->rolename() !== "Superadmin") {
    foreach ($allowedRoles as $key => $value ) {
      if ($key >= Auth::user()->role) {
          unset($allowedRoles[$key]);
      }
    }
  }
?>
{!! Form::myInput('text', 'first_name', 'First Name') !!}

{!! Form::myInput('text', 'last_name', 'Last Name') !!}

{!! Form::myInput('email', 'email', 'Email') !!}

{!! Form::myInput('number', 'phone', 'Phone') !!}

{!! Form::myInput('password', 'password', 'Password') !!}

{!! Form::myInput('password', 'password_confirmation', 'Password confirmation') !!}

{!! Form::mySelect('role', 'Role', $allowedRoles) !!}