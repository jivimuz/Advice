<div class="p-4">
    <div class="row">
        <div class="col-md-12" id="addLangField" hidden>
            <div class="row">
                <div class="col-col-6">
                    <div class="form-group">
                        <label for="">Language</label>
                        <select id="langList" style="width: 100%"></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="addField">
            <div class="float-end">
                <a class="btn btn-primary btn-rounded  mb-3 mt-3" onclick="addLang()"><i class="fa fa-plus"></i> Add
                    Language</a>
            </div>
        </div>
        <div class="col-md-12" hidden id="editField">
            <div class="float-end">
                <a class="btn btn-danger btn-rounded  mb-3 mt-3" onclick="cancelLang()"><i class="fa fa-times"></i>
                    Cancel</a>
                <a class="btn btn-success btn-rounded  mb-3 mt-3" onclick="saveLang()"><i class="fa fa-check"></i>
                    Save</a>
            </div>
        </div>
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Act</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($langs as $i)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $i->code }}</td>
                                <td>{{ $i->name }}</td>
                                <td>
                                    @if ($i->id == $cur_id)
                                        <a class="btn btn-sm btn-secondary rounded-pill mt-2 ml-2">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-sm btn-success rounded-pill mt-2 ml-2"
                                            onclick="useLang({{ $i->id }})">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <a class="btn btn-sm btn-outline-danger rounded-pill mt-2 ml-2"
                                            onclick="deleteLang({{ $i->id }})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var langArray = [];
    var selectedLang = {
        'code': null,
        'name': null
    };
    $(document).ready(function() {
        $('#langList').select2({
            dropdownParent: $('#ThisModal')
        })

        $('#langList').on('change', function() {
            selectedLang.code = $('#langList').val()
            selectedLang.name = $('#langList option:selected').text()
        })
    })

    function addLang() {
        if (langArray.length == 0) {
            $.ajax({
                url: "{{ url('lang/getLangRequest') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(res) {
                    var data = JSON.parse(res.data)
                    langArray = data.supported_languages;
                    var option = ''
                    option += `<option value="" selected>-</option>`
                    $.each(langArray, function(languageName, languageCode) {
                        option +=
                            `<option value="${languageCode}">${languageName}</option>`
                    });
                    $('#langList').html(option)
                    $('#langList').select2({
                        dropdownParent: $('#ThisModal')
                    })
                    $('#addLangField').attr('hidden', false)
                    $('#editField').attr('hidden', false)
                    $('#addField').attr('hidden', true)
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        } else {
            $('#addLangField').attr('hidden', false)
            $('#editField').attr('hidden', false)
            $('#addField').attr('hidden', true)
        }
    }

    function saveLang() {
        if (!selectedLang || !selectedLang.code || !selectedLang.name) {
            console.log('Selected Language is missing');
            return Toast.fire({
                icon: "error",
                title: "Please choose the Language first!"
            });
        }

        $.ajax({
            url: "{{ url('lang/saveLang') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                code: selectedLang.code,
                name: selectedLang.name
            },
            success: function(res) {
                console.log('Success Response:', res);
                langModal();
                $('#btnclose').attr('onclick', 'location.reload()')
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });
            }
        });
    }

    function useLang(id) {
        $.ajax({
            url: "{{ url('lang/setLang') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                cur_lang: id
            },
            success: function(data) {
                langModal()
                $('#btnclose').attr('onclick', 'location.reload()')
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });
    }


    function cancelLang() {
        $('#addLangField').attr('hidden', true)
        $('#editField').attr('hidden', true)
        $('#addField').attr('hidden', false)
    }
</script>
