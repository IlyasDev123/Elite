@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-lg-10  image__with-form">
            <div class="container custom__card m-3">
                <div class="d-flex justify-center">
                    <h2 class="m-3 site__btn text-center">Get a free Quote</h2>
                </div>
                <div class="">
                    <form class="inner quote-form-front animate__animated animate__backInRight" id="quotationform"
                        action="{{ route('quotes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group width-wrapper">
                                    <input type="number" name="attributes[width]" style="border-radius: 8px;"
                                        step="any" min="0" required="" placeholder="Width"
                                        class="form-control" id="txtwidth">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group width-wrapper">
                                    <input type="number" name="attributes[height]" style="border-radius: 8px;"
                                        step="any" min="0" required="" placeholder="height"
                                        class="form-control" id="txtwidth">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="row mb-3">
                                <input type="hidden" name="product_category" value="emborided-patches">
                                <input type="hidden" name="product_type" value="1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="name" placeholder="products" type="text" required=""
                                            id="id_backing" style="border-radius: 8px;" class="form-control">
                                            <option>Please Select Products</option>
                                            <option value="Embroiderey Patches">Embroiderey Patches</option>
                                            <option value="Chenille Patches">Chenille Patches</option>
                                            <option value="Leather Patches<">Leather Patches</option>
                                            <option value="Woven Patches">Woven Patches</option>
                                            <option value="Woven label/Size Tags">Woven label/Size Tags</option>
                                            <option value="Custom Apparels">Custom Apparels</option>
                                            <option value="Blank Apparels">Blank Apparels</option>
                                            <option value="Sublimation_Patches">Sublimation_Patches</option>
                                            <option value="Blank Patches">Blank Patches</option>
                                            <option
                                                value="Custom Sublimation White
                                            T_shirt">
                                                Custom Sublimation White
                                                T_shirt
                                            </option>
                                            <option value="Custom Face Mask">Custom Face Mask</option>
                                            <option value="Leather Patches">Leather Patches</option>
                                            <option value="Embroiderey keychains">Embroiderey keychains</option>
                                            <option value="Leather Keychains">Leather Keychains</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="attributes[backing]" title="Backing" type="text"
                                            placeholder="Backing" id="id_backing" required="" style="border-radius: 8px;"
                                            class="form-control">
                                            <option class="bs-title-option" value="">Please Select Backing</option>
                                            <option value="Sew-on / None">Sew-on / None</option>
                                            <option value="Iron-on/Plastic">Iron-on/Plastic</option>
                                            <option value="Velcro">Velcro</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <select name="hear_about_us" title="Backing" placeholder="Backing" type="text"
                                        id="id_backing" required="" style="border-radius: 8px;margin-bottom: 5px;"
                                        class="form-control" tabindex="-98">
                                        <option value="" selected="selected" class="gf_placeholder">
                                            How did you hear about
                                            us
                                            ?
                                        </option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Google">Google</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="ASI">ASI</option>
                                        <option value="Referred by someone">Referred by someone</option>
                                        <option value="Email">Email</option>
                                        <option value="Already Registered">Already Registered</option>
                                        <option value="Don't Remember">Don't Remember</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><input type="number" name="quantity"
                                            style="border-radius: 8px;" min="1" required=""
                                            placeholder="Product Quantity" id="txtquantity" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">


                            </div>

                            <div class="form-group mb-3">
                                <textarea class="form-control" required="" type="text" name="instruction_notes"
                                    placeholder="Special Instructions" style="border-radius: 8px;padding: 5px;" id="txtmessage"></textarea>
                            </div>

                            <div class="row mb-3 file__load">

                                <div class="col-md-12">
                                    <label style="font-size:13px;">Upload Images</label>
                                    <div class="form-group  upload-image">
                                        <input type="file" name="attachments[]" placeholder="Upload Image"
                                            class="form-control" id="txtimage1" multiple>
                                    </div>
                                    <h6 id="id_backing">File must be less than 80 mbs</h6>

                                </div>
                            </div>
                            <!-- <input type="hidden" value="embroidered-patches" id="product_form_slug" name="product_form_slug"><input class="button btn_lg btn_blue btn_full quote_submit" type="button" id="btnemail" name="btnemail" value="SUBMIT NOW"> -->
                            <div class="text-center mb-3">

                                <input type="submit" name="get"
                                    style="background-color: #058cf5;color: white;width: 200px;height: 40px;border: none;border-radius: 20px;">
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
