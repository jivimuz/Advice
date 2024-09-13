<div class="p-4">
    <form id="edit-form" class="row">
        <input type="text" hidden name="id" value="{{ $advid }}">
        <div class="col-md-12">
            <h4><b> Advice Name</b></h4>
            <div class="row">
                <div class="col-md-6"><br>
                    <label for="adv_name_{{ $cur_lang->id }}" class="form-label mb-4 ">
                        {{ $cur_lang->name }}:
                    </label>
                    <textarea class="form-control gen-first required" data-name="Advice Name" data-lang-code="{{ $cur_lang->code }}"
                        id="adv_name_{{ $cur_lang->id }}" name="adv_name_{{ $cur_lang->id }}" langName="{{ $cur_lang->name }}"
                        placeholder="Name in {{ $cur_lang->name }}">{{ $cur_lang->aname }}</textarea>
                </div>
                <div class="col-md-6">
                    @if (count($langs) > 0)
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive mb-3">
                                    <div class="btn-group" role="group" aria-label="Language Selector">
                                        @php
                                            $genLang = $cur_lang->code;
                                        @endphp
                                        @foreach ($langs as $i)
                                            @php
                                                if ($loop->first) {
                                                    $genLang = $i->code;
                                                }
                                            @endphp
                                            <a class="btn btn-outline-primary btn_adv_name btn-lang {{ $loop->first ? 'active' : '' }}"
                                                data-lang-id="{{ $i->id }}"
                                                data-target-id="#adv_name_{{ $i->id }}"
                                                data-target-class="adv_name" data-lang-code="{{ $i->code }}">
                                                {{ $i->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-sm btn-success btn-rounded" id="gen_adv_name"
                                    data-fr-id="{{ $cur_lang->id }}" data-lang-fr="{{ $cur_lang->code }}"
                                    data-lang-code="{{ $genLang }}" data-target-class="adv_name"
                                    onclick="generateTranslate(this)"><i class="fa fa-cogs"></i> Auto
                                    Translate</a>
                            </div>
                        </div>
                        @foreach ($langs as $i)
                            <textarea class="form-control  adv_name {{ $loop->first ? 'active' : 'd-none' }}" id="adv_name_{{ $i->id }}"
                                name="adv_name_{{ $i->id }}" langName="{{ $i->name }}">{{ $i->aname }}</textarea>
                        @endforeach
                    @endif
                </div>
            </div>
            <hr>
        </div>

        <div class="col-md-12">
            <h4><b> Brief Information:</b></h4>
            <div class="row">
                <div class="col-md-6"><br>
                    <label for="breaf_info_{{ $cur_lang->id }}" class="form-label mb-4 ">
                        {{ $cur_lang->name }}:
                    </label>
                    <textarea class="form-control gen-first required" data-name="Breaf Information" data-lang-code="{{ $cur_lang->code }}"
                        id="breaf_info_{{ $cur_lang->id }}" name="breaf_info_{{ $cur_lang->id }}" langName="{{ $cur_lang->name }}"
                        placeholder="Information in {{ $cur_lang->name }}">{{ $cur_lang->ainfo }}</textarea>
                </div>
                <div class="col-md-6">
                    @if (count($langs) > 0)
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive mb-3">
                                    <div class="btn-group" role="group" aria-label="Language Selector">
                                        @foreach ($langs as $i)
                                            <a class="btn btn-outline-primary  btn_breaf_info btn-lang {{ $loop->first ? 'active' : '' }}"
                                                data-lang-id="{{ $i->id }}"
                                                data-target-id="#breaf_info_{{ $i->id }}"
                                                data-target-class="breaf_info" data-lang-code="{{ $i->code }}">
                                                {{ $i->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-sm btn-success btn-rounded" id="gen_breaf_info"
                                    data-fr-id="{{ $cur_lang->id }}" data-lang-fr="{{ $cur_lang->code }}"
                                    data-lang-code="{{ $genLang }}" data-target-class="breaf_info"
                                    onclick="generateTranslate(this)"><i class="fa fa-cogs"></i> Auto
                                    Translate</a>
                            </div>
                        </div>

                        @foreach ($langs as $i)
                            <textarea class="form-control breaf_info {{ $loop->first ? 'active' : 'd-none' }}" id="breaf_info_{{ $i->id }}"
                                name="breaf_info_{{ $i->id }}" langName="{{ $i->name }}">{{ $i->ainfo }}</textarea>
                        @endforeach
                    @endif
                </div>
            </div>
            <hr>
        </div>

        <div class="col-md-12">
            <h4><b> Actual Tip:</b></h4>
            <div class="row">
                <div class="col-md-6"><br>
                    <label for="act_tip_{{ $cur_lang->id }}" class="form-label mb-4 ">
                        {{ $cur_lang->name }}:
                    </label>
                    <textarea class="form-control gen-first required" data-name="Actual Tip" data-lang-code="{{ $cur_lang->code }}"
                        id="act_tip_{{ $cur_lang->id }}" name="act_tip_{{ $cur_lang->id }}" langName="{{ $cur_lang->name }}"
                        placeholder="Information in {{ $cur_lang->name }}">{{ $cur_lang->atip }}</textarea>
                </div>
                <div class="col-md-6">
                    @if (count($langs) > 0)
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive mb-3">
                                    <div class="btn-group" role="group" aria-label="Language Selector">
                                        @foreach ($langs as $i)
                                            <a class="btn btn-outline-primary  btn_act_tip btn-lang {{ $loop->first ? 'active' : '' }}"
                                                data-lang-id="{{ $i->id }}"
                                                data-target-id="#act_tip_{{ $i->id }}"
                                                data-target-class="act_tip" data-lang-code="{{ $i->code }}">
                                                {{ $i->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-sm btn-success btn-rounded" id="gen_act_tip"
                                    data-fr-id="{{ $cur_lang->id }}" data-lang-fr="{{ $cur_lang->code }}"
                                    data-lang-code="{{ $genLang }}" data-target-class="act_tip"
                                    onclick="generateTranslate(this)"><i class="fa fa-cogs"></i> Auto
                                    Translate</a>
                            </div>
                        </div>

                        @foreach ($langs as $i)
                            <textarea class="form-control act_tip {{ $loop->first ? 'active' : 'd-none' }}" id="act_tip_{{ $i->id }}"
                                name="act_tip_{{ $i->id }}" langName="{{ $i->name }}">{{ $i->atip }}</textarea>
                        @endforeach
                    @endif
                </div>
            </div>
            <hr>
        </div>

        <div class="col-md-12">
            <h4><b> Tip Example:</b></h4>
            <div class="row">
                <div class="col-md-6"><br>
                    <label for="tip_example_{{ $cur_lang->id }}" class="form-label mb-4 ">
                        {{ $cur_lang->name }}:
                    </label>
                    <textarea class="form-control gen-first required" data-name="Tip Example" id="tip_example_{{ $cur_lang->id }}"
                        data-lang-code="{{ $cur_lang->code }}" name="tip_example_{{ $cur_lang->id }}" langName="{{ $cur_lang->name }}"
                        placeholder="Information in {{ $cur_lang->name }}">{{ $cur_lang->aexample }}</textarea>
                </div>
                <div class="col-md-6">
                    @if (count($langs) > 0)
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive mb-3">
                                    <div class="btn-group" role="group" aria-label="Language Selector">
                                        @foreach ($langs as $i)
                                            <a class="btn btn-outline-primary  btn_tip_example btn-lang {{ $loop->first ? 'active' : '' }}"
                                                data-lang-id="{{ $i->id }}"
                                                data-target-id="#tip_example_{{ $i->id }}"
                                                data-target-class="tip_example" data-lang-code="{{ $i->code }}">
                                                {{ $i->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-sm btn-success btn-rounded" id="gen_tip_example"
                                    data-fr-id="{{ $cur_lang->id }}" data-lang-fr="{{ $cur_lang->code }}"
                                    data-lang-code="{{ $genLang }}" data-target-class="tip_example"
                                    onclick="generateTranslate(this)"><i class="fa fa-cogs"></i> Auto
                                    Translate</a>
                            </div>
                        </div>

                        @foreach ($langs as $i)
                            <textarea class="form-control tip_example {{ $loop->first ? 'active' : 'd-none' }}"
                                id="tip_example_{{ $i->id }}" name="tip_example_{{ $i->id }}" langName="{{ $i->name }}">{{ $i->aexample }}</textarea>
                        @endforeach
                    @endif
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="float-end">
                <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Save Advice</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        summercode('.gen-first', "for " + "Information in " + $('.gen-first').attr('langName'))
        summercode('textarea.active', "for " + $('textarea.active').attr('langName'))
        $('.btn-lang').on('click', function() {
            var langId = $(this).data('lang-id');
            var targetID = $(this).data('target-id');
            var targetClass = $(this).data('target-class');
            var langCode = $(this).data('lang-code');

            if ($(targetID).hasClass('d-none')) {
                $('.' + targetClass).each(function(index, item) {
                    $(this).summernote('destroy')
                });
                $('.btn_' + targetClass).removeClass('active');
                $(this).addClass('active');

                $("." + targetClass).removeClass('active');
                $("." + targetClass).addClass('d-none');
                $(targetID).addClass('active');
                $(targetID).removeClass('d-none');
                $('#gen_' + targetClass).attr('data-lang-code', langCode);

                var plh = "for " + $(targetID).attr('langName');
                summercode(targetID, plh);
            }
        });
        $('#edit-form').on('submit', function(e) {
            e.preventDefault()

            let isValid = true;
            var err = '';
            $(this).find('.required').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    if (err != '') {
                        err += ', ' + $(this).data('name')
                    } else {
                        err += $(this).data('name')
                    }
                }
            });

            if (!isValid) {
                return Toast.fire({
                    title: 'Please insert ' + err + ' first ',
                    icon: 'warning'
                })
            }
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{ url('advice/updateData') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    getList();
                    closeModal('ThisModal')
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Created!',
                    });
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: 'error',
                        title: JSON.parse(xhr.responseText).error
                    });
                }
            });
        })
    });

    var trigg = 1

    function generateTranslate(val) {
        $(val).attr('disabled', true)
        $(val).removeClass('btn-success')
        $(val).addClass('btn-secondary')
        var frCode = $(val).data('lang-fr')
        var toCode = $(val).attr('data-lang-code')
        var target = $(val).data('target-class')
        var curid = $(val).data('fr-id')
        var targetID = ''
        $('.' + target).each(function(index, item) {
            if ($(item).hasClass('active')) {
                targetID = $(item).attr('id')
            }
        });
        $("#" + targetID).summernote('destroy');
        summercode("#" + targetID, "Loading...")
        if ($("#" + target + "_" + curid).val() && targetID) {
            if (trigg == 1) {
                trigg = 0
                $.ajax({
                    url: "{{ url('lang/generateTranslate') }}",
                    method: 'POST',
                    data: {
                        fr: frCode,
                        to: toCode,
                        val: $("#" + target + "_" + curid).val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        var data = JSON.parse(res.data)
                        trigg = 1
                        $(val).attr('disabled', false)
                        $(val).addClass('btn-success')
                        $(val).removeClass('btn-secondary')

                        $("#" + targetID).summernote('destroy');
                        $("#" + targetID).val(data.translations.translation)
                        summercode("#" + targetID)

                    },
                    error: function(xhr, status, error) {
                        trigg = 1
                        $("#" + targetID).summernote('destroy');
                        summercode("#" + targetID)
                        $(val).attr('disabled', false)
                        $(val).addClass('btn-success')
                        $(val).removeClass('btn-secondary')
                        return Toast.fire({
                            icon: 'error',
                            title: JSON.parse(xhr.responseText).error
                        });
                    }
                });
            }
        } else {
            $("#" + targetID).summernote('destroy');
            summercode("#" + targetID, '...')
            return Toast.fire({
                icon: 'error',
                title: "Please check the data first!"
            });
        }

    }

    function summercode(id, pl = '...', code = '') {
        $(id).summernote({
            height: "100px",
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol']],
            ],
            placeholder: pl,

        });
    }
</script>
