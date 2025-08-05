<!DOCTYPE html>
<html>
<head>
    <title>Pechay Monitoring</title>
</head>
<body>
    <h1>Pechay Firestore Data</h1>
    <ul>
        @foreach($documents as $doc)
            <li>{{ $doc->id() }} - {{ json_encode($doc->data()) }}</li>
        @endforeach
    </ul>

    <h1>Pechay Realtime Database</h1>
    <pre>{{ print_r($data, true) }}</pre>
</body>
</html>
