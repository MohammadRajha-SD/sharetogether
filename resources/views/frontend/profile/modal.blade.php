<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Change Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="imageForm" method="POST" action="{{route('profile.image.update')}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                        <div class="form-group">
                            <label for="profileImage">Upload Image</label>
                            <input type="file" class="form-control -file" id="profileImage" accept="image/*" name="image" />
                        </div>
                        <div class="form-group">
                            <img id="previewImage" src="#" alt="Preview Image" class="img-thumbnail" style="display:none;">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveImage">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
