 <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @extends('layouts.admin')
        @section('page')

         <div class="content-body">

             <div class="row page-titles mx-0">
                 <div class="col p-md-0">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ asset('javascript:void(0)')}}">Dashboard</a></li>
                         <li class="breadcrumb-item active"><a href="{{ asset('javascript:void(0)')}}">Home</a></li>
                     </ol>
                 </div>
             </div>
             <!-- row -->

             <div class="container-fluid">
                 <div class="row justify-content-center">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body">
                                 <div class="form-validation">
                                     <form class="form-valide" action="{{ route('updateOffer') }}" method="post">
                                        @csrf
                                        
                                         <div class="form-group row">
                                             <label class="col-lg-4 col-form-label" for="val-username">Title <span
                                                     class="text-danger">*</span>
                                             </label>
                                             <div class="col-lg-6">
                                                 <input type="text" class="form-control" id="val-username"
                                                     name="titre" value="{{ $offer->titre}} ">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label class="col-lg-4 col-form-label" for="val-suggestions">Description
                                                 <span class="text-danger">*</span>
                                             </label>
                                             <div class="col-lg-6">
                                                 <textarea class="form-control" id="val-suggestions" name="dscr" rows="5"
                                                     placeholder="Enter a description..">{{ $offer->desc}}</textarea>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label class="col-lg-4 col-form-label" for="val-email">Deadline <span
                                                     class="text-danger">*</span>
                                             </label>
                                             <div class="col-lg-6">
                                                 <input type="date" class="form-control" id="val-email"
                                                     name="datel" value="{{ $offer->date}}">
                                             </div>
                                         </div>
                                         <div class="form-group row">

                                            <div class="col-lg-6">
                                                <input type="hidden" class="form-control" id="val-email"
                                                    name="offer_id" value="{{ $offer->id}}">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                             <label class="col-lg-4 col-form-label" for="val-category">Category <span
                                                     class="text-danger">*</span></label>
                                             <div class="col-lg-6">
                                                <select class="form-control" id="val-category" name="cat">
                                                    <option value="{{ $offer->categorie->id}}">{{$offer->categorie->name}}</option>
                                                    // Générer dynamiquement les options
                                                    @foreach ($categories as $categorie)
                                                        {
                                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>;
                                                        }
                                                    @endforeach
                                                </select>
                                             </div>
                                         </div>






                                         <div class="form-group row">
                                             <label class="col-lg-4 col-form-label"><a href="#">Terms &amp;
                                                     Conditions</a> <span class="text-danger">*</span>
                                             </label>
                                             <div class="col-lg-8">
                                                 <label class="css-control css-control-primary css-checkbox"
                                                     for="val-terms">
                                                     <input type="checkbox" class="css-control-input" id="val-terms"
                                                         name="val-terms" value="1"> <span
                                                         class="css-control-indicator"></span> I agree to the
                                                     terms</label>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <div class="col-lg-8 ml-auto">
                                                 <button type="submit" class="btn btn-primary">Submit</button>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- #/ container -->
         </div>

         @endsection
         <!--**********************************
             Content body end
         ***********************************-->


         <!--**********************************
             Footer start
         ***********************************-->
