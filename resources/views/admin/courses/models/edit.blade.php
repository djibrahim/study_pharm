<div class="modal fade" id="edit_course{{$course->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('courses.update',$course->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le cours</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Le titre <span class="text-danger">*</span></label>
                        <input name="title" id="title" type="text" class="form-control input-default " placeholder="Entrez le nom du module" value="{{$course->title}}" required>
                    </div>
                    @if(isset($module))
                        <input type="hidden" name="module_id" value="{{$module->id}}">
                    @else
                        <div class="form-group">
                            <label>Le module <span class="text-danger">*</span></label>
                            <select id="select_module{{$course->id}}" name="module_id" >
                                <option></option>
                                @foreach($modules as $module)
                                    <option value="{{$module->id}}" @if($module->id==$course->module_id) selected @endif>{{$module->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>La description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Entrez la description du cours">{{$course->description}}</textarea>
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

@push('js')
    <script>
        (function($) {
            "use strict"

            $("#select_module{{$course->id}}").select2({
                placeholder: "Sélectionnez le nom du module",
            });


        })(jQuery);
    </script>
@endpush



