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

    <title>Crud form</title>
</head>

<body>

    <center>
        <h1>Crud From</h1>
    </center>


    <div class="container mt-5">
        <a href="{{ route('show') }}">
            <button class="btn btn-primary">Show Table </button>
        </a>
        <form class="mt-5" action="store_data" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name"
                    required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"> Upload Image</label>
                <input class="form-control" name="image" type="file" id="formFile" onchange="previewImage(event)"
                    required>
            </div>

            <img src="#" id="imagePreview" alt="imagePreview" style="max-width: 200px; display:none">
            <hr>


            <label for="formFile" class="form-label"> Skills</label>
            <div class="form-check">
                <input class="form-check-input" name="skill[]" type="checkbox" value="PHP" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    PHP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="skill[]" type="checkbox" value=" PYTHON" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    PYTHON
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="skill[]" type="checkbox" value=" C++" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    C++
                </label>
            </div>
            <hr>
            <div class="mb-3">
                <label for="formFile" class="form-label"> Upload Multiple Image</label>
                <input class="form-control" name="images[]" type="file" id="formFile" multiple required>
            </div>

            <label for="formFile" class="form-label"> Gender</label>

            <div class="form-check">
                <input class="form-check-input" name="gender" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault1" value="Male">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="gender" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault2" value="FeMale">
                <label class="form-check-label" for="flexRadioDefault2">
                    FeMale
                </label>
            </div>
            <hr>
            <select class="form-select" name="country" aria-label="Default select example">
                <option selected>Select Your Country</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Bangladesh">Bangladesh</option>
            </select>
            <button type="submit" class="btn btn-primary mt-5 my-5 w-100">Submit</button>

        </form>
    </div>



    <script>
        function previewImage(event) {
            var imagePreview = document.getElementById('imagePreview');
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.style.display = 'block';
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.style.display = 'none';
                imagePreview.src = '#';
            }
        }
    </script>
</body>

</html>
