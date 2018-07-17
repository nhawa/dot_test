<form action="{{url('test1')}}" method="post">
    <label for="test">array (separate with comma)</label>
    <input type="text" name="arr" @if(isset($arr))value="{{$arr}}"@endif>
    <button type="submit">submit</button>
</form>

@if(isset($number))
    <br>
    the second largest of array is: {{$number}}
@endif