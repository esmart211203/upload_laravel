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
        <h1 class="text-center">Upload form</h1>
        <!-- form -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('store-product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product desc</label>
                        <textarea class="form-control" name="description" id="" cols="3" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"> Product Images</label>
                        <input class="form-control" type="file" name="images[]" multiple accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- table -->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Title</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <th scope="row">{{ $product['id'] }}</th>
                                <td>{{ $product['title'] }}</td>
                                <td>{{ $product['description'] }}</td>
                                <td>
                                    <a href="{{ route('detail-product', ['id' => $product->id]) }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>