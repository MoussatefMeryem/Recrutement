



@extends('layouts.admin')
@section('page')
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

            <div class="container-xxl py-5" style="background-color: white">
                <div class="container">


                    <div class="container">
                        <h2 class="my-4">Liste des Offres</h2>
                        <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                            <thead>
                                <tr>
                                    <th style="border: 1.5px solid green; padding: 12px; background-color: with; color: green; text-align: center;">#</th>
                                    <th style="border: 1px solid green; padding: 12px; background-color: with; color: green; text-align: center;">Title</th>
                                    <th style="border: 1px solid green; padding: 12px; background-color: with; color: green; text-align: center;">Description</th>
                                    <th style="border: 1px solid green; padding: 12px; background-color: with; color: green; text-align: center;">category</th>
                                    <th style="border: 1px solid green; padding: 12px; background-color: with; color: green; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr style="background-color: #f8f9fa;background-color:white" >
                                        <td style="border: 1.5px solid green; padding: 12px; text-align: center;">{{ $loop->iteration }}</td>
                                        <td style="border: 1.5px solid green; padding: 12px; text-align: center;">
                                            @if($offer->utilisateur)
                                                <div style="display: flex; align-items: center; justify-content: center;">

                                                    <span>{{ $offer->titre}}</span>
                                                </div>
                                            @else
                                                Unknown User
                                            @endif
                                        </td>
                                        <td style="border: 1.5px solid green; padding: 12px; background-color:white">
                                            <a href="{{ route('display_application2') }}" style="text-decoration: none; color: #007bff;">
                                                <div style="font-size: 1.2em; color: blue; margin-bottom: 4px;">
                                                    {{ $offer->titre }}
                                                </div>
                                                <p style="margin-bottom: 0; color: black;">{{ $offer->desc }}</p>
                                            </a>
                                        </td>
                                        <td style="border: 1.5px solid green; padding: 12px; text-align: center; background-color:white">{{$offer->categorie->name}}</td>
                                        <td style="border: 1.5px solid green; padding: 12px; text-align: center; background-color:white">
                                            <form method="POST" action="{{ route('displayCandidature')}}">
                                                @csrf
                                                <input type="hidden" name="idO" value="{{ $offer->id}}">
                                            <button type="submit" style="padding: 6px 12px; font-size: 14px; color: white; background-color: #007bff; border: none; border-radius: 4px; cursor: pointer;">Display Offer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>












                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection
