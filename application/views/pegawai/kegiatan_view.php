<div class="container mt-5">
        <h2 class="mb-4">Upload Kegiatan</h2>
        <form action="upload_kegiatan.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="activityName">Nama Kegiatan</label>
                <input type="text" class="form-control" id="activityName" name="activityName" required>
            </div>
            <div class="form-group">
                <label for="activityImage">Upload Gambar</label>
                <input type="file" class="form-control-file" id="activityImage" name="activityImage" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>