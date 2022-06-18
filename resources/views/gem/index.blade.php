<a href="{{route('home')}}">Back to Home</a>
<br>
<hr>
<span>Last Users:</span>
@if (!$gems)
<br>This list is empty.
@endif
<ul>
  @foreach($gems as $gem)
  <li style="margin-bottom: 10px;">
    User <a href="{{route('gem.show', ['userId'=>$gem->user_id])}}">{{$gem->user_id}}</a> owned <b>{{$gem->gems}}</b> gems
  </li>
  @endforeach
</ul>