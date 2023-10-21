<div class="modal fade" id="add_question">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('questions.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une question</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Le titre <span class="text-danger">*</span></label>
                        <input name="title" id="title" type="text" class="form-control input-default " placeholder="Entrez le titre de la question" required>
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>L'EMD <span class="text-danger">*</span></label>
                        <select id="select_emd" name="emd" >
                            <option></option>
                            <option value="EMD 1">EMD 1</option>
                            <option value="EMD 2">EMD 2</option>
                            <option value="EMD 3">EMD 3</option>
                        </select>
                    </div>
                </div >
                <div class="row">
                    <div class="col col-md-4 form-group">
                        <label>L'année<span class="text-danger">*</span></label>
                        <input name="year" id="year" type="number" class="form-control input-default " placeholder="2024" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label>Rattrapage <span class="text-danger">*</span></label>
                        <select id="select_ratt" name="ratt" >
                            <option></option>
                            <option value="1">OUI</option>
                            <option value="0" selected>NON</option>
                        </select>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label>Images</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="images_question[]" style="display:none" multiple>
                        </label>
                    </div>
                </div>

                    @if(isset($course))
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                    @else
                    <div class="form-group">
                        <label>Le cours <span class="text-danger">*</span></label>
                        <select id="select_course" name="course_id" >
                            <option></option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
        </form>
    </div>
</div>


