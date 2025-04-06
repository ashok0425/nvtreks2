@extends('frontend.layout.master')
@section('title')
    {{ $data->meta_title }}
    @endsection
@section('descr')
{{ $data->meta_description }}

@endsection
@section('keyword')
{{ $data->meta_keyword }}

@endsection

@section('url')
    {{ Request::url() }}
@endsection
@php
    define('PAGE', 'destination');
    $num = rand(1, 8);
@endphp
@section('content')
    <main>
        <x-page-header :title="$data->name" :route="route('package.category', ['url' => $data->url, 'url' => $data->url])" :img="getImageurl('banners/' . $num . '.webp')" />
        <section class="tour-packages ">
            <div class="container-fluid">

                {{-- search  --}}

                <form action="abc" method="post" id="filter_package">
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="card px-2 py-2">
                                <div class="row">

                                    <div class="col-6 col-md-3 my-1">
                                        <input type="number" class="form-control" id="from" placeholder="Price From"
                                            autocomplete="off" min="1">
                                    </div>
                                    <div class="col-md-3 col-6 my-1">
                                        <input type="number" class="form-control" id="to" placeholder="Price  To"
                                            autocomplete="off" min="1">

                                    </div>

                                    <div class="col-md-3 col-6 my-1">
                                        <input type="text" class="form-control" id="name" placeholder="Package name"
                                            autocomplete="off">

                                    </div>
                                    <div class="col-md-3 col-6 my-1">
                                        <input class="btn btn-primary btn-block d-block w-100" type="submit"
                                            value="Search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>




                <div class="row" id="package_data">
                    @foreach ($packages as $package)
                        <div class="col-lg-3 col-sm-6 ">
                            @include('frontend.template.card1', ['package' => $package])

                        </div>
                    @endforeach
                    <div class="my-2 py-4">
                        <div class="row">
                            <div class="col-md-4 offset-md-8">
                                {{ $packages->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>
    <div class="container my-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                {!! $data->details !!}
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        async function Filterpackage(from, to, name) {
            let token = $("meta[name='csrf-token']").attr('content')
            let data = {
                from: from,
                to: to,
                name: name,
                _token: token,

            }

            let url = `{{ route('filter_package') }}`
            $('#package_data').html('');

            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function(res) {
                    $('#package_data').html(res);
                }
            })
        }

        $('#filter_package').submit(function(e) {
            e.preventDefault()
            let from = $('#from').val()
            let to = $('#to').val()
            let name = $('#name').val()

            Filterpackage(from, to, name)
        })
    </script>
@endpush
