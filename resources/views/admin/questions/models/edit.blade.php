<div class="modal fade" id="edit_question{{$question->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('questions.update',$question->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier une question</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label>Le titre <span class="text-danger">*</span></label>
                            <input name="title" id="title" type="text" class="form-control input-default " placeholder="Entrez le titre de la question" value="{{$question->title}}" required>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label>L'EMD <span class="text-danger">*</span></label>
                            <select id="select_emd{{$question->id}}" name="emd" >
                                <option></option>
                                <option value="EMD 1" @if($question->emd=="EMD 1") selected @endif>EMD 1</option>
                                <option value="EMD 2" @if($question->emd=="EMD 2") selected @endif>EMD 2</option>
                                <option value="EMD 3" @if($question->emd=="EMD 3") selected @endif>EMD 3</option>
                            </select>
                        </div>
                    </div >
                    <div class="row">
                        <div class="col col-md-4 form-group">
                            <label>L'année<span class="text-danger">*</span></label>
                            <input name="year" id="year" type="number" class="form-control input-default " placeholder="2024" value="{{$question->year}}" required>
                        </div>
                        <div class="col col-md-4 form-group">
                            <label>Rattrapage <span class="text-danger">*</span></label>
                            <select id="select_ratt{{$question->id}}" name="ratt" >
                                <option></option>
                                <option value="1" @if($question->ratt=="1") selected @endif>OUI</option>
                                <option value="0" @if($question->ratt=="0") selected @endif>NON</option>
                            </select>
                        </div>
                        <div class="col col-md-4 form-group">
                            <label>Images</label>
                            <div class="col col-md-2 form-group">
                                <label>Images</label>
                                <label>
                                    <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                                    <input type="file" name="images_question[]" style="display:none" multiple>
                                </label>
                            </div>
                        </div>
                    </div>

                    @if(isset($course))
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                    @else
                        <div class="form-group">
                            <label>Le cours <span class="text-danger">*</span></label>
                            <select id="select_course{{$question->id}}" name="course_id" >
                                <option></option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" @if($course->id==$question->course_id) selected @endif>{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
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

            $("#select_emd{{$question->id}}").select2({
                placeholder: "Sélectionnez l'EMD'",
            });

            $("#select_course{{$question->id}}").select2({
                placeholder: "Sélectionnez le cours",
            });

            $("#select_ratt{{$question->id}}").select2({
                placeholder: "Si rattrapage Sélectionnez OUI",
            });


        })(jQuery);
    </script>
@endpush



