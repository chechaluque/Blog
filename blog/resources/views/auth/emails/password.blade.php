Click Here to Rest your Password: <br>
<a href="{{ $link = url('password/reset', $token).'?email='.urldecode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>