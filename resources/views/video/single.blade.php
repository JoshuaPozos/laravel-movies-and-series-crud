<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$video->video_Name}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
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
                <h1>{{$video->video_Name}}</h1>
            </div>
            <div class="row mt- 5">


                    <div class="col col-md-4 mx-auto">
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
                        <div class="video-description mt-5 mb-5">
                            {{$video->video_Description}}
                        </div>
                        <div class="video-edit">
                            <a class="btn btn-primary p-2 mx-auto" href="{{action('VideoController@edit', $video->video_ID)}}">Edit</a>
                        </div>
                    </div>


            </div>
        </div>
    </body>
</html>
