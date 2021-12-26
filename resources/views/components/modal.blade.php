<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Silahkan pilih</div>
        <div class="modal-footer">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit" data-dismiss="modal">Logout</button>
            </form>
        </div>
    </div>
</div>
</div>
{{-- data-toggle="modal" data-target="#logoutModal" --}}