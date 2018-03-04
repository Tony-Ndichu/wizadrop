@extends('layouts.master')

@section ('content')
<div id="accountcubes">
				
							
						<a href="{{ route('about_us') }}" class="linkit">
						<div id="aboutus">
						
							<p class="vertical">About us</p>
						
						</div>
							</a>
						
						
					<a href="{{ route('FAQ') }}" class="linkit">
						<div id="aboutus">
							
							<p class="vertical">FAQ</p>
							
						</div>
					</a>
						
										
			    
						<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="linkit">
						<div id="aboutus" >
							<p class="vertical">Log out</p>
						</div>
					</a>
					
					
						
						
				</div>
@endsection