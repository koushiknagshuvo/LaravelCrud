<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Show Form</title>
</head>

<body>



    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Multiple Images</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Country</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Edit Action </th>
                    <th scope="col">Delete Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $record)
                    <tr>
                        <th scope="row">{{ $record->id }}</th>
                        <td>{{ $record->name }}</td>
                        <td><img src="storages/images/{{ $record->image }}" alt="CRUD_Image" height="100px"
                                width="100px"></td>
                        <td>

                        <td>
                            @if ($record->images)
                                @php
                                    $imageNames = explode(',', $record->images);
                                @endphp

                                @foreach ($imageNames as $imageName)
                                    <img src="storages/images/{{ $imageName }}" alt="CRUD_Image" height="100px"
                                        width="100px">
                                @endforeach
                            @endif
                        </td>

                        </td>
                        <td>{{ $record->skill }}</td>
                        <td>{{ $record->gender }}</td>
                        <td>{{ $record->country }}</td>
                        <td>{{ $record->created_at }}</td>
                        <td>{{ $record->updated_at }}</td>
                        <td><a href="edit/{{ $record->id }}"><button type="submit"
                                    class="btn btn-success">Edit</button></a></td>
                        <td><a href="delete/{{ $record->id }}"><button type="submit"
                                    class="btn btn-danger">Delete</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('/') }}">
            <button class="btn btn-primary"> Go Form</button>
        </a>
    </div>

</body>

</html>
