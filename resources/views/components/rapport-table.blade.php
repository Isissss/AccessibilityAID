  <h2 style="color:{{ $color }}">({{count($challenges)}}) {{ $message }} </h2>
    <ul>
    @foreach($challenges as $challenge)
            <li>{{$challenge->challenge->name}} - {{$challenge->score}} </li>
    @endforeach
    </ul>
</table>
