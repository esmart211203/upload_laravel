<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Multiple Image</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">title: {{$product->title}}</h1>
        <p>Description: {{$product->description}}</p>
        <div class="row">
            @forelse($pro_images as $data)
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body">
                    <img src="/product_images/{{$data->image}}" width="300px" alt="">
                    </div>
                </div>
            </div>
            @empty
            <h1 class="text-center danger">NO image</h1>
            @endforelse
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>