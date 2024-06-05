
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        @extends('layouts.admin')
        @section('page')
        <style>
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 0.3em 1em;
            }
            .dataTables_wrapper .dataTables_filter {
                float: right;
            }
            .dataTables_wrapper .dataTables_length {
                float: left;
            }
            .dataTables_wrapper .dataTables_info {
                clear: both;
                padding-top: 0.75em;
            }
            .btn-custom-primary {
                background-color: #4CAF50; /* Custom button background color */
                color: white; /* Custom button text color */
            }
            .btn-custom-danger {
                background-color: #f44336; /* Custom button background color */
                color: white; /* Custom button text color */
            }
        </style>
        
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="container mt-4">
                                <h4 class="card-title mb-4">Offer Details</h4>
                                <div class="table-responsive">
                                    <table id="offers-table" class="table table-striped table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th style="background-color: white;color:green">Title</th>
                                                <th style="background-color: white;color:green">Description</th>
                                                <th style="background-color: white;color:green">Deadline</th>
                                                <th style="background-color: white;color:green">Category</th>
                                                <th style="background-color: white;color:green">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($offers as $offer)
                                                <tr>
                                                    <td style="background-color: white;color:black">{{ $offer->titre }}</td>
                                                    <td style="background-color: white;color:black">{{ $offer->desc }}</td>
                                                    <td style="background-color: white;color:black">{{ $offer->date }}</td>
                                                    <td style="background-color: white;color:black">{{ $offer->categorie ? $offer->categorie->name : 'No Category' }}</td>
                                                    <td>
                                                        <form method="post" action="{{ route('modO') }}" style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                                                            <button type="submit" class="btn btn-icon btn-sm btn-edit me-2" style="background-color: white; color: green; border: 1px solid green;">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </form>
                                                        <form method="post" action="{{ route('deleteO') }}" style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                                                            <button type="submit" class="btn btn-icon btn-sm btn-delete" style="background-color: white; color: green; border: 1px solid green;">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        
                                                       
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    </div
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @endsection
