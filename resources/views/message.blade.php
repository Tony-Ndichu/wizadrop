@extends('layouts.masterchat')

@section('content')

            <!-- Our app will go here-->

              @foreach ($person as $object)

              
            <div id="receiver">
            		@if($object->Profileimage != 0 or $object->Profileimage != "")
<img src="{{ asset('profilepics/'.$object->Profileimage) }}"  width="100%" height="auto"/>
@else
    <img src="{{ URL::to('/images/images.png') }}" width="100%" height="auto" />
@endif
</div>
            	<div id="chatOutput">



            	
            			
            	</div>
          


<footer id="footer1">
            	 <form>
                   <input id="postText" class="form-control" type="text"  maxlength="250" name="name" >
                   
             
            	<input type="hidden" value="{{ $object->id }}" name="sentto" />
            	<input type="hidden" value="{{ Auth::user()->id }}" name="sentby" />

            		
            	
                  <button id="sendit" ><i class="fa fa-paper-plane fa-lg" ></i></button>
            </form>
</footer>
           
     @endforeach  

   

<script>

	   



$(document).ready(function () {



var latest = null;

  function retrieveMessages() {



	var sentto = $("input[name='sentto']").val();
	
	  var $chatOutput = $("#chatOutput");


        $.ajax({

              url: "{{route('messageread')}}",

              type:'get',

              data: {'_token': '{{ csrf_token() }}', sentto : sentto },

              dataType: 'json',

              cache: true,          
       

              success: function(response){  

              var mess = response.messages;
               var oldscrollHeight = $("#chatOutput")[0].scrollHeight;
              		  var chat = $('#chatOutput').empty();
              		  var sentby = $("input[name='sentby']").val();
             		

              	for (id in mess){

              		if (mess[id].sentfrom == sentby ){
              		

              		 chat.append('<div id="chatText">' + mess[id].text + '<div id="chatTime">' + mess[id].time + '</div>' + '</div>')
              		}
              		
else {

	chat.append('<div id="chatText2">' + mess[id].text + '<div id="chatTime">' + mess[id].time + '</div>' + '</div>')
}

            }
              	


              		 	var newscrollHeight = $("#chatOutput")[0].scrollHeight;
            if(newscrollHeight > oldscrollHeight){
                $("#chatOutput").scrollTop($("#chatOutput")[0].scrollHeight);

              	}
                  
                  }



              });
    }

setInterval(function(){

 retrieveMessages();
 
 

}, 5000);

window.onload = function(){
	retrieveMessages();
};

$("#sendit").click(function(e){

	   e.preventDefault();

	    var name = $("input[name='name']").val();
	    var sentto = $("input[name='sentto']").val();
	  

	   

	          $.ajax({

              url: "{{route('messagepost')}}",

              type:'post',

              data: {'_token': '{{ csrf_token() }}', name : name , sentto : sentto  },

              cache: false,          
       

              success: function(data){             
               
              		$('#postText').val('');
              		retrieveMessages();
              		load_unseen_notification();

                  }

              });
});







});

</script>
@endsection