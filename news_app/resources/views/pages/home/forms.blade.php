@extends("layout")
@section("", "")
@section("content")

@endsection

@push('script')
            <!-- Morris Charts JavaScript -->
            <script src={{asset("../js/raphael.min.js")}}></script>
            <script src={{asset("../js/morris.min.js")}}></script>
            <script src={{asset("../js/morris-data.js")}}></script>
@endpush