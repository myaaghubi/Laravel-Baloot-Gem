<a href="{{route('gem.index')}}">Back to Gems</a>
<br>
User Id: {{$gem->user_id}}
<br>
Gems Owned: <b>{{$gem->gems}}</b>
<br>
<hr>
<span>Last Transactions:</span>
@if (!$gem->transactions)
<br>You have no transaction.
@else
<a href="{{route('gem.transaction.index', ['userId'=>$gem->user_id])}}">See All</a>
@endif
<ul>
  @foreach($gem->transactions as $transaction)
  <li style="margin-bottom: 10px;">
    {{$transaction->id}}: <b>{{$transaction->amount}}</b>
    <br>
    {{$transaction->title}}
    <br>
    <sub><a href="{{route('gem.transaction.show', ['id'=>$transaction->id])}}">Details</a></sub>
  </li>
  @endforeach
</ul>