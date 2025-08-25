@extends('admin.master')


@section('content')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Lead #{{$lead->serial}} Detail</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Leads</li>
          <li class="breadcrumb-item active" aria-current="page">Lead #{{$lead->serial}}</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="content content-full content-boxed">
    <div class="block block-rounded">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Lead <small>Information</small></h3>
                      <div class="block-options">
                        <div class="dropdown">
                          <button type="button" class="btn-block-option dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                          <div class="dropdown-menu dropdown-menu-end" style="">
                            <a id="convert-to-quote" data-bs-toggle="modal" data-bs-target="#convert_to_quote" class="dropdown-item" href="javascript:void(0)">
                               Convert To Quote
                            </a>
                             <a class="dropdown-item" href="javascript:void(0)">
                               Convert To Order
                            </a>
                            <a class="dropdown-item" href="{{route('leads.edit', $lead->id)}}">
                               Edit
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                               Cancel
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="block-content">
                      <div class="row">
                          <div class="col-md-6">
                            <h4>Customer</h4>
                            <p style="margin-bottom: 0.25rem;">{{$lead->customer->first_name}} {{$lead->customer->last_name}}</p>
                            <p class="tel">{{$lead->customer->phone}} <a class="btn btn-sm btn-info" href=""><i class="far fa-copy"></i></a> <a class="btn btn-sm btn-success" href="tel:{{$lead->customer->phone}}"><i class="fas fa-phone"></i></a>
                             <br> {{$lead->customer->email}}
                            </p>
                          </div>
                          <div class="col-md-6">
                            <a class="btn btn-sm btn-primary" href="">Look on CD</a>
                            <a class="btn btn-sm btn-info" href="">Check Price</a>
                            <a class="btn btn-sm btn-dark" href="">Similer Offers</a>
                            <br>
                            <p><strong>Origin:</strong> {{$lead->from_zip}} : {{$lead->from_city}}, {{$lead->from_state}}
                              <br><strong>Destination:</strong> {{$lead->to_zip}} : {{$lead->to_city}}, {{$lead->to_state}}
                            </p>
                            <h5 style="margin-bottom: 0.25rem;">Vehicle</h5>
                            <p>{{$lead->year . ' ' . $lead->make . ' ' . $lead->model}}
                            </p>
                          </div>
                      </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="block block-rounded">
                        <div class="block-header block-header-default">
                          <h3 class="block-title">Notes </h3>
                        </div>
                        <div class="block-content">
                          <div class="form-floating mb-4">
                            <textarea class="form-control" id="example-textarea-floating" name="example-textarea-floating" style="height: 100px" placeholder="Leave a comment here"></textarea>
                            <label class="form-label" for="example-textarea-floating">Note</label>
                            <br>
                            <button class="btn btn-primary">Add Note</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="block hero flex-column mb-0 bg-body-dark">
                        <!-- Chat #5 Header -->
                        <div class="block-header w-100 bg-body-dark" style="min-height: 68px;">
                          <h3 class="block-title">
                            <a class="fs-sm fw-semibold ms-2" href="javascript:void(0)">To: 123543634</a>
                          </h3>
                        </div>
                        <!-- END Chat #5 Header -->

                        <!-- Chat #5 Messages -->
                        <div
                          class="js-chat-messages block-content block-content-full text-break overflow-y-auto w-100 flex-grow-1 px-lg-8 px-xlg-10 bg-body"
                          data-chat-id="5">
                          <div class="me-4">
                            <div class="fs-sm text-muted animated fadeIn my-2">12-10-2004</div>
                          </div>
                          <div class="me-4">
                            <div
                              class="fs-sm d-inline-block fw-medium animated fadeIn bg-body-light border-3 px-3 py-2 mb-2 shadow-sm mw-100 border-start border-dark rounded-end">
                              Hi there!</div>
                          </div>

                        </div>

                        <!-- Chat #5 Input -->
                        <div class="js-chat-form block-content p-3 w-100 d-flex align-items-center bg-body-dark" style="min-height: 70px; height: 70px;">
                          <form class="w-100" action="db_chat.html" method="POST">
                            <div class="input-group dropup">
                              <button type="button" class="btn btn-link d-sm-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-file-alt fa-fw me-1"></i> Upload File
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-image fa-fw me-1"></i> Upload Image
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-microphone-alt fa-fw me-1"></i> Record Audio
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fa fa-smile fa-fw me-1"></i> Add Stickers
                                </a>
                              </div>
                              <input type="text" class="js-chat-input form-control form-control-alt border-0 bg-transparent" data-target-chat-id="5" placeholder="Type a message..">
                              <button type="submit" class="btn btn-link">
                                <i class="fab fa-telegram-plane opacity-50"></i>
                                <span class="d-none d-sm-inline ms-1 fw-semibold">Send</span>
                              </button>
                            </div>
                          </form>
                        </div>
                        <!-- END Chat #5 Input -->
                      </div>
                    </div>
                  </div>

                </div>




          <!-- Normal Default Modal -->
          <div class="modal" id="convert_to_quote" tabindex="-1" role="dialog" aria-labelledby="convert_to_quote" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Convert to Quote</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-1">
                    <form action="{{route('convert_to_quote')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <div class="form-floating">
                              <input type="text" class="form-control" id="example-group1-floating3" name="example-group1-floating3" placeholder="Ammount">
                              <label for="example-group1-floating3">Amount</label>
                            </div>
                          </div>
                           <b> Recommended Price: $0</b><br>
                            <input type="hidden" name="lead_id" value="{{$lead->id}}">
                                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Convert to Quote</button>
                </div>
            </form>
              </div>
            </div>
          </div>
          <!-- END Normal Default Modal -->

@endsection
