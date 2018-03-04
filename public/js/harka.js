
function load_unseen_notification(view = '')

{

 $.ajax({

  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {

   $('.dropdown-menu').html(data.notification);

   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }

  }

 });

}

load_unseen_notification();




function Chatter(){
        this.getMessage = function(callback, lastTime){
                var t = this;
                var latest = null;
 
                $.ajax({
                        'url': 'chatterengine.php',
                        'type': 'post',
                        'dataType': 'json',
                        'data': {
                                'mode': 'get',
                                'lastTime': lastTime
                        },
                        'timeout':30000,
                        'cache': true,
                        'success': function(result){
                                if(result.result){
                                        callback(result.message);
                                        latest = result.latest;
                                } 
                        },
                        'error': function(e){
                                console.log(e);
                        },
                        'complete': function(){
                                t.getMessage(callback, latest);
                        }
                });
        };
 
        this.postMessage = function(user, text, callback){
                $.ajax({
                        'url': 'chatterengine.php',
                        'type': 'post',
                        'dataType': 'json',
                        'data': {
                                'mode': 'post',
                                'user': user,
                                'text': text
                        },
                        'success': function(result){
                                callback(result);
                        },
                        'error': function(e){
                                console.log(e);
                        }
                });
        };
};

var c = new Chatter();

$(document).ready(function(){
        $('#formPostChat').submit(function(e){
                e.preventDefault();
 
                var user = $('#postUsername');
                var text = $('#postText');
				var done = $('#postId');
                var err = $('#postError');
 
                c.postMessage(user.val(), text.val(), function(result){
                        if(result){
                                text.val("");
                        }
                        err.html(result.output);
                });
 
               
				
				
				$('#formPostChat')[0].reset();
    load_unseen_notification();
	
	
	 return false;
	 
        });
		
		
		
		
 
        c.getMessage(function(message){
			 var oldscrollHeight = $(".chatMessageList")[0].scrollHeight;
			
                var chat = $('.chatMessageList').empty();
						
 
                for(
				var i = 0; i < message.length; i++){
				 chat.append( message[i].ditu);
				
					
                }
				
		

 
				var newscrollHeight = $(".chatMessageList")[0].scrollHeight;
            if(newscrollHeight > oldscrollHeight){
                $(".chatMessageList").scrollTop($(".chatMessageList")[0].scrollHeight);
            }
        });
		
		
		
		
		
});



$(document).on('click', '.readit', function(){



 load_unseen_notification('yes');
 $('.count').html('');
 

  

});




setInterval(function(){

 load_unseen_notification();
 
 

}, 5000);





