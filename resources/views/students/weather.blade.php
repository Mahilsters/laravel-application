
<!-- resources/views/weather.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .weather-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .weather-info {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="weather-form">
                    <h2 class="mb-4">Weather Forecast</h2>
                    <form method="GET" action="{{ route('get.weather', ['city' => $city ?? '']) }}">
                        @csrf
                        <div class="form-group">
                            <label for="city">Enter City:</label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Get Weather</button>
                    </form>
                </div>
            </div>
        </div>
        @if(isset($weather))
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="weather-info">
                        <h2>Weather Forecast for {{ $city }}</h2>
                        <p>Temperature: {{ $weather['main']['temp'] }} &deg;C</p>
                        <p>Weather: {{ $weather['weather'][0]['main'] }}</p>
                        <p>Description: {{ $weather['weather'][0]['description'] }}</p>
                        <p>Humidity: {{ $weather['main']['humidity'] }}%</p>
                        <p>Wind Speed: {{ $weather['wind']['speed'] }} m/s</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
