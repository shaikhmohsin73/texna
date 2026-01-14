<!DOCTYPE html>
<html>
<head>
    <title>Marketing Excel Import</title>
</head>
<body>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="/marketing-import" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <br><br>
    <button type="submit">Upload Excel</button>
</form>

</body>
</html>
