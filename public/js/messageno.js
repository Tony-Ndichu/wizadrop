function load_unseen_notification(view = '')

{

 $.ajax({

  url:"{{ route('messageno') }}",

  method:"get",

  dataType:"json",

  success:function(response)

  {
  	
    $('.count').html(data.response);
   }

  

 });

}

load_unseen_notification();