@extends('layouts.master')
@section ('content')

	<div class="row">
		<div class="coll-md-6 col-md-offset-3">
			<form>
				<span>
					Given span
					</span>
				<input type="text" id="search_text" onkeyup="search_data(this.value, 'result');" >
				<br />
				<hr />
			</form>
		</div>
					
	<div id="fixedsearch">		
	<div id="livesearch">
		<div id="searchboxed">
     <input type="text" name="search_text" id="search" placeholder="Search"  />
		</div>
    </div>
	</div>
   
   <div id="result">
   	@include ('_student-table')
   </div>

	</div>

	<script type"text/javascript">
		$(document).ready(function(){
			function(){
				$search=$(this).val (

					$.ajax({
						type:'get',
						url:'{{URL::to("search")}}',
						data:{'search':$search},
						success:function(data){
							console.log(data);
						}
					});
			});
			});
		</script>
	@endsection


	
