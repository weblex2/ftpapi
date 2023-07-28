<select {{ $attributes->merge(['class' => 'alert']) }}>
    @foreach ($dat as $key => $row) 
        <option class="dropdown-option" value="{{$row['id']}}">{{$row['name']}}</option>
    @endforeach
</select >