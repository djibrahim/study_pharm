<div class="modal fade" id="edit_answer{{$answer->id}}">
    <div class="modal-dialog" role="document">
        <form action="{{route('answers.update',$answer->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier une réponse</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>réponse <span class="text-danger">*</span></label>
                        <input name="response" id="response" type="text" class="form-control form-control-lg" placeholder="entrez la réponse" value="{{$answer->response}}" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image_answer" multiple>
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Est correct&nbsp;&nbsp;&nbsp;</label>
                        <input type="checkbox" class="css-control-input mr-2" id="is_correct" name="is_correct" value="1" @if($answer->is_correct=='1') checked @endif>
                    </div>
                    <input type="hidden" name="question_id" value="{{$question->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</div>

