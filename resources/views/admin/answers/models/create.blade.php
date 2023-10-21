<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="add_answer{{$question->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route('answers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une réponse</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Réponse <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label>Est correct <span class="text-danger">*</span></label>
                        <select id="is_correct1{{$question->id}}" name="is_correct[]" >
                            <option></option>
                            <option value="1">OUI</option>
                            <option value="0" selected>NON</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Image</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Réponse <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label>Est correct <span class="text-danger">*</span></label>
                        <select id="is_correct2{{$question->id}}" name="is_correct[]" >
                            <option></option>
                            <option value="1">OUI</option>
                            <option value="0" selected>NON</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Image</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Réponse <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label>Est correct <span class="text-danger">*</span></label>
                        <select id="is_correct3{{$question->id}}" name="is_correct[]" >
                            <option></option>
                            <option value="1">OUI</option>
                            <option value="0" selected>NON</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Image</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Réponse <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label>Est correct <span class="text-danger">*</span></label>
                        <select id="is_correct4{{$question->id}}" name="is_correct[]" >
                            <option></option>
                            <option value="1">OUI</option>
                            <option value="0" selected>NON</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Image</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Réponse <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label>Est correct <span class="text-danger">*</span></label>
                        <select id="is_correct5{{$question->id}}" name="is_correct[]" >
                            <option></option>
                            <option value="1">OUI</option>
                            <option value="0" selected>NON</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Image</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>

                <input type="hidden" name="question_id" value="{{$question->id}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
        </form>
    </div>
</div>


@push('js')
    <script>
        (function($) {
            "use strict"


            $("#is_correct1{{$question->id}}").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct2{{$question->id}}").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct3{{$question->id}}").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct4{{$question->id}}").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct5{{$question->id}}").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });






        })(jQuery);
    </script>

@endpush

