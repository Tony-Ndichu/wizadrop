@extends ('layouts.master')

@section ('content')

<div class="container">



<input type="text" class="form-control"  id="search" name="search" placeholder="Search">


<div class="centered"><img src="{{ URL::to('/images/wizabot.jpg') }}" width="100%" height="auto" ></div>


<div id="post-data2">


</div>

</div>


<script type="text/javascript">

$('#search').on('keyup',function(){
	$('.centered').hide();

$value=$(this).val();

$.ajax({

type : 'get',

url : '{{URL::to('search2')}}',

data:{'search':$value},

success:function(data){

$('#post-data2').html(data);

}

});


})

</script>

<script type="text/javascript">

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>

@endsection