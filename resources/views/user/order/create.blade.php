@extends('layouts.app')
@section('content')
    <div class="row mt-3 image__with-form">
        <div class="create-order">
            <div class="col-lg-12">
                <div class="container custom__card">
                    <div class="d-flex justify-center">
                        <span class="site__btn text-center">Place A New Order</span>
                    </div>

                    <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-1">
                            <label for="input-1">Order Type</label>
                            <select class="form-control" name="product_category" id="ordertype">
                                <option value="digitizing" selected>Digitizing</option>
                                <option value="vector">Vector Conversion</option>
                            </select>
                        </div>
                        <input type="hidden" name="product_type" id="textbox_id1" class="form-control other-placement"
                            value="2">

                        <div class="mt-3">
                            <label for="input-2">Design Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name"
                                placeholder="Enter Design Name" required />
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="j-input">
                                        <label for="colors">
                                            <b>Number of Colors *</b>
                                        </label>
                                        <input type="number" min="1"
                                            class="form-control @error('no_of_color') is-invalid @enderror"
                                            name="attributes[no_of_color]" id="colors" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="j-input">
                                        <label for="cname">
                                            <b>Name of Colors *</b>
                                        </label>
                                        <input type="text" placeholder="" id="cname" name="attributes[name_of_color]"
                                            class="form-control @error('name_of_color') is-invalid @enderror" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p style="color:white" class="text-white"><strong style="color:white">Size Of The
                                Design</strong>
                            Please write down prop in any ONE box to have it done proportionately to the other.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="j-input">
                                        <label for="colors">
                                            <b>Height *</b>
                                        </label>
                                        <input type="number" min="0.01" step="0.01"
                                            class="form-control  @error('height') is-invalid @enderror" id="height"
                                            name="attributes[height]" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="j-input">
                                        <label for="cname">
                                            <b>Width *</b>
                                        </label>
                                        <input type="number" min="0.01" step="0.01" placeholder="" id="width"
                                            class="form-control @error('width') is-invalid @enderror"
                                            name="attributes[width]" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="j-input">
                                        <label for="cname">
                                            <b>Unit</b>
                                        </label>
                                        <select name="attributes[unit]" id="type"
                                            class="form-control @error('unit') is-invalid @enderror">
                                            <option value="inches">Inches</option>
                                            <option value="mm">Mm</option>
                                            <option value="cm">Cm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="digitizing-fields" id="digitizing-field">
                            @include('user.order.digitizing-fields')
                        </div>
                        <div class="vector-fields" id="vector-field">
                            @include('user.order.vector-field')
                        </div>
                        <div class="form-group mt-3">
                            <label for="input-2">Additional Instructions.</label>
                            <textarea class="form-control" spellcheck="false" name="extra_instruction"></textarea>
                        </div>
                        <div class="form-group mt-3">

                            <label for="input-2"><strong>Attach Your Artwork</strong> - * If you have multiple
                                artwork
                                files, ZIP them up.</label>
                            <div class="mb-3 file__load">
                                <label for="formFileMultiple" class="form-label">Multiple files</label>
                                <input class="form-control" type="file" id="formFileMultiple" name="attachments[]"
                                    multiple>
                            </div>
                        </div>
                        <div class="form-group m-2 mb-4 d-flex justify-content-end">
                            <button type="submit" class="site__btn btn btn-group-lg text-dark" value="Place Order"
                                id="onSubmit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            const val = $('#ordertype').val();
            if (val === 'digitizing') {
                $('#vector-field select').prop('disabled', true);
                $('#vector-field input').prop('disabled', true);
                $('#vector-field').hide();
            }
            $('#ordertype').change(function() {
                const selectedValue = $(this).val();
                if (selectedValue === 'digitizing') {
                    $('#vector-field select').prop('disabled', true);
                    $('#vector-field input').prop('disabled', true);
                    $('#digitizing-field select').prop('disabled', false);
                    $('#digitizing-field input').prop('disabled', false);
                } else {
                    $('#digitizing-field select').prop('disabled', true);
                    $('#digitizing-field input').prop('disabled', true);
                    $('#vector-field select').prop('disabled', false);
                    $('#vector-field input').prop('disabled', false);
                }
                $('#vector-field').toggle(selectedValue === 'vector');
                $('#digitizing-field').toggle(selectedValue === 'digitizing');
                $('#onSubmit').click(function() {
                    e.preventDefault();
                });
            });
        });
    </script>
@endsection
