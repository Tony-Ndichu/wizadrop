@extends ('layouts.master')
@section ('content')

<form method="POST" action="{{ route('users.update') }}">
	{{ csrf_field() }}
	{{ method_field('patch') }}

	<label>Name</label>
	<input type="text" name="name" value="{{ $user->name }}" />
</br>

	<label>Email</label>
	<input type="email" name="email" value="{{ $user->email }}" />
</br>

	<label>Password</label>
	<input type="password" name="password" />
</br>

	<label>Confirm Password</label>
	<input type="password" name="pasword_confirmation" />
</br>

	<button type="submit"> Send </button>

</form>
@endsection