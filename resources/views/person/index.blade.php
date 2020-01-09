<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All Casts</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            .video-card {
                /* max-width: 300px; */
            }
            .image-container {
                width: 100%;
            }

            .image-container img {
                width: 100%;
            }

            .btn {
                width: 50%;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row m-5">
                <h1>All Casts</h1>
            </div>
            <div class="row flex-column mt-5">
                <h2>Directors</h2>
                @foreach($person as $people)
                    @if($people->person_Role == "Director")
                    <div class="col col-md-4 mx-auto video-card mb-5">
                        <h2>{{$people->person_Name}}</h2>

                        <a class="btn btn-secondary" href="{{action('PersonController@edit', $people->person_ID)}}">Edit</a>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="row flex-column mt-5">
                <h2>Stars</h2>
                @foreach($person as $people)

                    @if($people->person_Role == "Stars")
                    <div class="col col-md-4 mx-auto video-card mb-5">
                        <h2>{{$people->person_Name}}</h2>

                        <a class="btn btn-secondary" href="{{action('PersonController@edit', $people->person_ID)}}">Edit</a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </body>
</html>
