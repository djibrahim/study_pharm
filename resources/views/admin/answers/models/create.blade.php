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
                    <div class="col-6 form-group">
                        <label>Réponse 1 <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col-1 form-group">
                        <br><br>
                        <input type="checkbox" class="form-check-input" id="check1" value="0" name="is_correct[]">

                    </div>
                    <div class="col-4 form-group">
                        <label>Image 1</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>


                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Réponse 2 <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col-1 form-group">
                        <br><br>
                        <input type="checkbox" class="form-check-input" id="check2" value="1" name="is_correct[]">

                    </div>
                    <div class="col-4 form-group">
                        <label>Image 2</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Réponse 3<span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col-1 form-group">
                        <br><br>
                        <input type="checkbox" class="form-check-input" id="check3" value="2" name="is_correct[]">

                    </div>
                    <div class="col-4 form-group">
                        <label>Image 3</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Réponse 4 <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col-1 form-group">
                        <br><br>
                        <input type="checkbox" class="form-check-input" id="check4" value="3" name="is_correct[]">
                    </div>
                    <div class="col-4 form-group">
                        <label>Image 4</label>
                        <div></div>
                        <label>
                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                            <input type="file" name="image_answer[]" style="display:none">
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Réponse 5 <span class="text-danger">*</span></label>
                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                    </div>
                    <div class="col-1 form-group">
                        <br><br>
                        <input type="checkbox" class="form-check-input" id="check5" value="4" name="is_correct[]">

                    </div>
                    <div class="col-4 form-group">
                        <label>Image 5</label>
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

