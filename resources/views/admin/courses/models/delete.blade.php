<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="delete_course{{$course->id}}">
    <form action="{{route('courses.delete',$course->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('delete')
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprime un cours</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-danger">Voulez-vous vraiment supprimer ce cours ({{$course->title}})</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
    </form>
</div>
