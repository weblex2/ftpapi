<select class="dropdown">
    @foreach ($dat as $key => $row) 
        <option class="dropdown-option" value="{{$row['id']}}">{{$row['name']}}</option>
    @endforeach
</select >