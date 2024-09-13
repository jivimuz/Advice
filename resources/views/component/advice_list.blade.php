<div class="row">
    @foreach ($lists as $i)
        <div class="col-lg-4">
            <div class="card" style="width: 100%; margin-bottom:10px">
                <div class="card-body" style="height:200px;">
                    <h4 class="">
                        <b>
                            {{ strlen(strip_tags($i->name)) > 30 ? substr(strip_tags($i->name), 0, 30) . '...' : strip_tags($i->name) }}</b>
                    </h4>
                    <h5 class=" mb-2 text-muted">
                        {{ strlen(strip_tags($i->information)) > 30 ? substr(strip_tags($i->information), 0, 30) . '...' : strip_tags($i->information) }}
                    </h5>
                    <h6>
                        {{ strlen(strip_tags($i->example_tip)) > 200 ? substr(strip_tags($i->example_tip), 0, 200) . '...' : strip_tags($i->example_tip) }}
                    </h6>
                </div>
                <div class="p-4">
                    <a class="btn btn-primary btn-rounded" onclick="showFull({{ $i->id }})">Show Full</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
