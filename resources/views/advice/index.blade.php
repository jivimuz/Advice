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
        <div class="card-header">
            <div class="pull-right" id="cariMenu">
                <a class="btn btn-warning btn-rounded  mb-3 mt-3" id="languages"><i class="fa fa-language"></i> Languages</a>

                <a class="btn btn-primary btn-rounded  mb-3 mt-3" id="addModal"><i class="fa fa-plus"></i> Add
                    Advice</a>
            </div>
            <div class="col-md-12">
                <h2 class="card-title mb-3 mt-3"><b>Advice</b></h2>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="main-table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Name</td>
                                    <td>Information</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ThisModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog " style="min-width: 90%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ThisModalLabel">Input Data</h5>
                    <a type="button" class="btn rounded-pill btn-outline-dark btn-sm" id="btnclose"
                        onclick="closeModal('ThisModal')" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body" id="thisModalBody">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            getList()
            $('#addModal').attr('onclick', 'addModal()')
            $('#languages').attr('onclick', 'langModal()')
        })

        function getList() {
            let noD = 1
            const columns = [{
                    data: "id",
                    render: function(data, b, c) {

                        return `${noD++}.`
                    },
                    className: 'text-center'
                },
                {
                    data: 'name'
                },
                {
                    data: 'information',

                },
                {
                    width: '150px',
                    data: "advice_id",
                    render: function(data, b, c) {
                        var a = '';
                        a += `<a  class="btn btn-sm btn-outline-warning rounded-pill mt-2 ml-2" style="margin-right:5px !important" onclick="editModal(${data})">
                                              <i class="fa fa-eye"></i>
                                               </a>`

                        a += `<a  class="btn btn-sm btn-outline-danger rounded-pill mt-2 ml-2" onclick="deleteData(${data})">
                                               <i class="fa fa-trash"></i>
                                               </a>`


                        return a

                    },
                },
            ]

            var tabled = $('#main-table').DataTable({
                searching: true,
                destroy: true,
                lengthChange: false,
                responsive: true,
                // pageLength: 2,
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: "{{ url('advice/getMainList') }}",
                    type: "POST",
                    data: {
                        type: $('#typeMod').val()
                    }

                },
                columns: columns,
                // initComplete: function(data) {}
            });

        }

        function addModal() {
            $.ajax({
                url: "{{ url('advice/addModal') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#ThisModalLabel').html("Add Advice")
                    $('#thisModalBody').html(data)
                    $('#ThisModal').modal('show')
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        function langModal() {
            $.ajax({
                url: "{{ url('lang/addModal') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#ThisModalLabel').html("Languages")
                    $('#thisModalBody').html(data)
                    $('#ThisModal').modal('show')
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        function editModal(id) {
            $.ajax({
                url: "{{ url('advice/editModal') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#ThisModalLabel').html("Edit  Modal")
                    $('#thisModalBody').html(data)
                    $('#ThisModal').modal('show')
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }

        function deleteData(id) {
            Swal.fire({
                title: "You sure?",
                text: "This data will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('advice/deleteData') }}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {
                            Toast.fire({
                                icon: "success",
                                title: "Advice Deleted"
                            });
                            getList()
                        },
                        error: function(xhr, status, error) {
                            Toast.fire({
                                icon: "error",
                                title: JSON.parse(xhr.responseText).error
                            });

                        }
                    });
                }
            });
        }
    </script>
@endsection
