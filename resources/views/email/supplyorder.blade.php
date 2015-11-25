<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <style>h1, a {color: #c64d44;}</style>
</head>
<body>

<h1>Sweet Sweet Chocolates would like to order the following from you:</h1>
<ul>
    @foreach($ingredients as $i)
        <li>{{ $i->quantity }} {{ $i->unit}} of {{ $i->name }}</li>
    @endforeach
</ul>

<p>For questions or concerns please contact our business office at 804-387-4267. We appreciate your business!</p>

</body>
</html>