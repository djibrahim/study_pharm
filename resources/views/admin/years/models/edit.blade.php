<div class="modal fade" id="edit_year{{$year->id}}">
    <div class="modal-dialog" role="document">
        <form action="{{route('years.update',$year->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier une une année</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>L'année <span class="text-danger">*</span></label>
                    <input name="name" id="name" type="text" class="form-control form-control-lg" placeholder="entrez l'année académique" value="{{$year->name}}" required>
                </div>
                <div class="form-group">
                    <label>La description</label>
                    <textarea name="description" id="description" class="form-control ">{{$year->description}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
        </form>
    </div>
</div>

