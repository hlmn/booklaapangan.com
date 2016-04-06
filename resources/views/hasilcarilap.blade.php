 <!DOCTYPE html>
<html>
<head>
<title>
	
</title>
</head>
<body>

@foreach ($shows as $show)
{{$show->NAMA_LAP}}
        @foreach ($fasilitas as $fas) 
        	@if ($show->ID_LAP == $fas->ID_LAP )
            {{$fas->NAMA_FAS}}
            @endif
        @endforeach

@endforeach

</body>
</html> 