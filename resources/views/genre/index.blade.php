<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>All Genres</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style>
            tbody {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row m-5">
                <h1>All Genres</h1>
            </div>
            <div class="row mt- 5">
                <div class="col col-md-6">
                    <table>
                        <th>Genre Name</th>
                        <th>Config</th>
                        <th>Delete</th>
                        @foreach($genres as $genre)
                            <tr>
                                <td>{{$genre->genre_Name}}</td>
                                <td><a class="btn btn-secondary" href="{{action('GenreController@edit', $genre->genre_ID)}}">Edit </a></td>
                                <td>
                                    <a class="btn btn-sm"><form method="POST" action="{{ action('GenreController@destroy', $genre->genre_ID) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col col-md-6">
                    <a class="btn btn-primary" href="{{action('GenreController@create')}}">Create New Genre</a>
                </div>
            </div>
        </div>
    </body>
</html>
