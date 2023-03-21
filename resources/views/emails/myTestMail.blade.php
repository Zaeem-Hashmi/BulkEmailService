<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    {{-- {{ $details['body'] }} --}}
    {!! strip_tags($details['body']) !!}
   
    <p>Thank you</p>
</body>
</html>