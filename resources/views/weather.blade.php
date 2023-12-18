<!DOCTYPE html>
<html>
<head>
    <title>Weather Information</title>
</head>
<body>
    <h1>Weather Information</h1>

    @if(isset($weather['main']))
        <p>Temperature: {{ $weather['main']['temp'] }} °C</p>
        <p>Humidity: {{ $weather['main']['humidity'] }}%</p>
        <!-- Tambahkan informasi cuaca lainnya sesuai kebutuhan -->
    @else
        <p>Failed to retrieve weather information.</p>
    @endif
</body>
</html>
