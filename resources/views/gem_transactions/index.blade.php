<a href="{{route('gem.index')}}">Back to Gem</a>
<br>
<span>UserId: {{$gem->user_id}}</span> <span>-</span> <span>Gems: {{$gem->gems}} (owned)</span>

<br>
<hr>
<span>Last Transactions:</span>
@if (!$transactions)
<br>You have no transaction.
@endif
<ul>
  @foreach($transactions as $transaction)
  <li style="margin-bottom: 10px;">
    <b>{{$transaction->amount}}<b>
      <br>
      {{$transaction->title}}
      <br>
      <sub><a href="{{route('gem.transaction.show', ['id'=>$transaction->id])}}">Details</a></sub>
    </li>
    @endforeach
  </ul>
  {{$transactions->links()}}