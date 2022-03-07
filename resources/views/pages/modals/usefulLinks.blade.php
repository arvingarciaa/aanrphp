<?php 
    $landing_page = App\LandingPageElement::find(1);
?>

<div class="modal fade" id="editUsefulLinksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['LandingPageElementsController@editUsefulLinks'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Footer Info</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('useful_links', 'Useful Links', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('useful_links', $landing_page->useful_links, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#useful_links'))
            .catch(error => {
                console.error(error);
        });
    });
</script>