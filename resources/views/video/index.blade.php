<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All Movies and Series</title>

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
                <h1>All Movies</h1>
            </div>
            <div class="row mt- 5">
                @foreach($videos as $video)

                    <div class="col col-md-4 mx-auto video-card mb-5">
                        <h2>{{$video->video_Name}}</h2>
                        <span>Year: {{$video->video_Year}}</span>

                        @for ($i = 0; $i < count($genres); $i++)
                            @if ($video->genre_ID === $genres[$i]->genre_ID)
                                <span>Genre: {{
                                    $genres[$i]->genre_Name
                                }}</span>
                            @endif
                        @endfor

                        <div class="image-container">
                            {{-- <img src="{{$video->video_Image}}" alt="{{$video->video_Name}}"> --}}
                            <img src="{{ asset('storage/video/'.$video->video_Image) }}" alt="{{$video->video_Name}}">

                            {{-- {{ @dd($images) }} --}}

                        </div>

                        <div class="video-edit mt-2 text-center ">
                            <a class="btn btn-primary p-2 mx-auto" href="{{action('VideoController@show', $video->video_ID)}}">Learn More</a>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </body>
</html>
