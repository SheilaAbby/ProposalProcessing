<h1>Welcome to our Proposal Submission Site,{{$user->username}}</h1>

To verify your account, <a href="{{route('sendEmailDone',["email"=>$user->email,"Verifytoken"=>$user->Verifytoken])}}">Click here.</a>