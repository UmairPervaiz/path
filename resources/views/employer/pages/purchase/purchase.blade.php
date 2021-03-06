@extends('employer.layouts.master')

@section('title')
    Path | Packages
@endsection

@section('css')
@endsection

@section('main-content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chart text-primary"></i>
                        </span>
                        <h4 class="card-label">Packages</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center text-center my-0 my-md-25">
                        <!-- begin: Pricing-->
                        @foreach($packages as $package)
                            @php
                                $packageDetail = DB::table('package_details')->where('package_id', $package->id)->first();
                                $packageFeatures = DB::table('package_feature_lists')->where('package_details_id', $packageDetail->id)->get();
                            @endphp

                                <div class="col-md-4 col-xxl-3 bg-white rounded-left shadow-sm mb-6">
                                    <form action="{{route('payment', encrypt($package->id))}}" method="POST">
                                        @csrf
                                        <div class="pt-25 pb-25 pb-md-10 px-4">
                                            <h4 class="mb-15">{{$package->package_name}}</h4>
                                            <p class="mb-10 d-flex flex-column text-dark-50">
                                                <span> @if (isset($packageDetail->package_description)) {{$packageDetail->package_description}} @endif</span>
                                            </p>
                                            <span class="px-7 py-3 font-size-h1 font-weight-bold d-inline-flex flex-center bg-primary-o-10 rounded-lg mb-15">
                                             @if (isset($packageDetail->rate)) {{ $packageDetail->currency  .' '.$packageDetail->rate}} @endif
                                            </span>
                                            <br />

                                            <h3>Features</h3>
                                            @foreach($packageFeatures as $packageFeature)
                                                <span class="flaticon2-correct">
                                                    {{$packageFeature->feature_name}}
                                                </span>
                                                <br>
                                            @endforeach
                                            <br>
                                            @if($exist == 0)
                                                <button type="submit" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Purchase</button>
                                            @elseif($exist == 1)
                                                @if($existRecord == "" || empty($existRecord))
                                                    <button type="submit" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Purchase</button>
                                                @else
                                                    <button @if($existRecord->package_id ==  $package->id) disabled @endif type="submit" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3" @if($existRecord->package_id ==  $package->id) style="cursor: no-drop" @endif>@if($existRecord->package_id ==  $package->id) Purchased @else Purchase @endif</button>
                                                @endif
                                            @endif
                                        </div>
                                    </form>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('script')
@endsection
