<div class="modal fade" id="add_module">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('modules.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un module</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label>Le nom <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control input-default " placeholder="Entrez le nom du module" required>
                    </div>
                    @if(isset($year))
                        <input type="hidden" name="year_id" value="{{$year->id}}">
                    @else
                    <div class="form-group">
                        <label>L'année <span class="text-danger">*</span></label>
                        <select id="select_year" name="year_id" >
                            <option></option>
                            @foreach($years as $year)
                            <option value="{{$year->id}}">{{$year->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                <div class="form-group">
                    <label>La description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Entrez la description du module"></textarea>
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


