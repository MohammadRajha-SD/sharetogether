<!-- Deleted Insurance Modal -->
<div class="modal fade" id="Deleted{{$subcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('messages.ask', ['name' => $subcategory->name.' Sub Category'])}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.categories.destroy', $subcategory->id)}}" method="post">
                @method('DELETE')
                @csrf

                <input type="hidden" name="id" value="{{$subcategory->id}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('messages.close')}}</button>
                    <button class="btn btn-primary">{{trans('messages.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
