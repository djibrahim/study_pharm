<div class="modal fade" id="add_course">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un cours</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label>Le titre <span class="text-danger">*</span></label>
                        <input name="title" id="title" type="text" class="form-control input-default " placeholder="Entrez le titre du cours" required>
                    </div>
                    @if(isset($module))
                        <input type="hidden" name="module_id" value="{{$module->id}}">
                    @else
                    <div class="form-group">
                        <label>Le module <span class="text-danger">*</span></label>
                        <select id="select_module" name="module_id" >
                            <option></option>
                            @foreach($modules as $module)
                            <option value="{{$module->id}}">{{$module->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                <div class="form-group">
                    <label>La description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Entrez la description du cours"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
        </form>
    </div>
</div>


