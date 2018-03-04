<table style="width:100%;">
	<tr>
		<th>Pic</th>th>
		<th>skill</th>
	</tr>
	@foreach ($posts as $student)
	<tr>
		<td>{{ $student->Profilepic }}</td>
		<td>{{ $student->Skill }}</td>
	</tr>
	@endforeach
</table>

<script type="text/javascript">
	function search_data(search_value) {
		$.ajax({
			url:'/search-data/'+search_value,
			method: 'GET',
		}).done(function(response){
			$('#table-results').html(response);
			//put the returning html in the 'results' div 

		});

	}
</script>