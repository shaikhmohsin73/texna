<form action="/party-import" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import Excel</button>
</form>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
