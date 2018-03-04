
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>A Simple Responsive HTML Email</title>
       <style type="text/css">
            body {
            margin: 0;
            padding: 0;
            min-width: 100% !important;
        }
        .content {
        width: 100%;
        max-width: 600px;
        }  

        @media only screen and (min-device-width: 601px) {
.content {width: 600px !important;}
}

          </style>
    
</head>
<body bgcolor="#f6f8f1">
    <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
        <table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">
            <tr>
               <td align="center">
                <img src="{{asset('images/wiza.svg')}}" width="60%" style="padding: 10%;" >
			   </td>
            </tr>
        </table>

        <table width="100%" bgcolor="#40e0d0" >
            <tr>
                <td align="center" style="padding:10%; color:white;">
                    <p style="color:white;"><h2>Hello!</h2></br>You are receiving this email because we received a password reset request for your account.</p> 
                </td>
				
			</tr>
			<tr>
			<td align="center">
				<div style="border-radius:5px; display:table-cell;vertical-align:middle; height:40px; width:110px; background-color:red;" >
                      <a href="{{ route('password.reset',['token'=>$token]) }}" style="text-decoration:none; color:white; width:50px;" >Reset password</a>
                    </div>
					</td>
			</tr>
			<tr>
                <td align="center" style="padding:20%; font-size:70%;">
                    <p style="color:white;">If you did not request a password reset, no further action is required</p>
				</td>	
            </tr>
			
	
        </table>
</table>

    </body>
</html>