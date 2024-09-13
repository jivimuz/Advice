@extends('main')
@section('style')
    <style>
        .menu-list:hover {
            background-color: #B6E2FF;
        }

        .menu-list {
            width: 100%;
            height: 130px;
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right" id="cariMenu">
                        <div class="input-group ">
                            <input type="search" class="form-control" placeholder="search" onchange="searchAdvice()"
                                aria-label="search" style="border-radius: 50px 0 0 50px; border-color: skyblue"
                                id="params">
                            <div class="input-group-append ">
                                <a class="input-group-text btn btn-primary" id="search" onclick="searchAdvice()"
                                    style="border-radius:  0 50px 50px 0;border-color: #003059; background-color:#003059; height: 100%; margin-top:-1px">
                                    <i class="mdi mdi-magnify"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h3><b>Home</b></h3>
                </div>
                <div class="col-md-12">
                    <hr>
                    <div class="row" id="adviceList"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="adviceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adviceModalLabel"></h5>
                    <a type="button" class="btn rounded-pill btn-outline-dark btn-sm" onclick="closeModal('adviceModal')"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body" id="adviceModalBody">
                    <div class="form-group">
                        <label for="">Name :</label>
                        <h3 id="nName"><b></b></h3>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Information :</label>
                        <h4 id="nInfo"></h4>
                    </div>
                    <div class="form-group">
                        <label for="">Tip :</label>
                        <h5 id="nTip">ffff</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            searchAdvice()
        })

        function searchAdvice() {
            $.ajax({
                url: "{{ url('getAdviceList') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    params: $('#params').val(),
                },
                success: function(data) {
                    $('#adviceList').html(data)

                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        function showFull(id) {
            $.ajax({
                url: "{{ url('showAdviceDetail') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id: id
                },
                success: function(data) {
                    $('#nName').html(data.data.name)
                    $('#nInfo').html(data.data.information)
                    $('#nTip').html(data.data.actual_tip)
                    $('#adviceModal').modal('show')
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }
    </script>
@endsection
