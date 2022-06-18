<a href="{{ URL::previous() }}">Back to Transactions</a>
<br>
<span>Amount: <b>{{$transaction->amount}}</b></span> 
<br>
<span>{{$transaction->title}}</span>
<br>
<span>{{$transaction->tag}}</span>
<br>
<span>{{$transaction->created_at}}</span>