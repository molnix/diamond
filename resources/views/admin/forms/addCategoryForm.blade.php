<form id="CategoryAddForm" action="{{route('admin_create_category')}}" method="post" class="main_form">
    @csrf
    <input type="text" name="category">
    <input type="submit" class="btn-green">
</form>
