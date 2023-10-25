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
                            <input type="hidden" name="product_category" value="custom-patches">
                            <input type="hidden" name="product_type" value="1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="name" type="text" placeholder="Product category" id="id_backing"
                                        required="" style="border-radius: 8px;" class="form-control" tabindex="-98">
                                        <option class="bs-title-option" value="">Please Custom Apparels</option>
                                        <option class="bs-title-option" value="hoodies">Hoodies</option>
                                        <option value="t-shirts">T-shirts</option>
                                        <option value="tank_top">Tank Top</option>
                                        <option value="shorts">Shorts</option>
                                        <option value="trousers">Trousers</option>
                                        <option value="denim-jackets">Denim Jackets</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group height-wrapper"><input type="text" name="attributes[color]"
                                        style="border-radius: 8px;" step="any" required="" placeholder="Colors"
                                        class="form-control" id="txtheight"></div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select name="hear_about_us" title="Backing" placeholder="Backing" type="text"
                                    id="id_backing" required="" style="border-radius: 8px;margin-bottom: 5px;"
                                    class="form-control" tabindex="-98">
                                    <option value="" selected="selected" class="gf_placeholder">
                                        How did you hear abou us ?
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
                                <div class="form-group"><input type="number" name="quantity" style="border-radius: 8px;"
                                        min="1" required="" placeholder="Product Quantity" id="txtquantity"
                                        class="form-control"></div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label style="font-size:18px;color:gray;">Sizes And Custom Apparels</label>
                            <div class="col-md-2">
                                <div class="form-group width-wrapper">
                                    <center><label style="font-size:13px;">Small</label></center>
                                    <input type="number" name="attributes[small]" style="border-radius: 8px;"
                                        step="any" placeholder="" class="form-control" id="txtwidth">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group width-wrapper">
                                    <center><label style="font-size:13px;">Medium</label></center>
                                    <input type="number" name="attributes[medium]" style="border-radius: 8px;"
                                        step="any" required="" placeholder="" class="form-control" id="txtwidth">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group width-wrapper">
                                    <center><label style="font-size:13px;">Large</label></center>
                                    <input type="number" name="attributes[larage]" style="border-radius: 8px;"
                                        step="any" required="" placeholder="" class="form-control"
                                        id="txtwidth">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group width-wrapper">
                                    <center><label style="font-size:13px;">X Large</label></center>
                                    <input type="number" name="attributes[x_large]" style="border-radius: 8px;"
                                        step="any" required="" placeholder="" class="form-control"
                                        id="txtwidth">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group width-wrapper">
                                    <center><label style="font-size:13px;">2 XL</label></center>
                                    <input type="number" name="attributes[2_xl]" style="border-radius: 8px;"
                                        step="any" required="" placeholder="" class="form-control"
                                        id="txtwidth">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group width-wrapper">
                                    <center><label style="font-size:13px;">3 XL</label></center>
                                    <input type="number" name="attributes[3_xl]" style="border-radius: 8px;"
                                        step="any" required="" placeholder="" class="form-control"
                                        id="txtwidth">
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="attributes[custom_woven_tag]" title="Custom Woven Tags" type="text"
                                        placeholder="Custom Woven Tags" id="" required=""
                                        style="border-radius: 8px;width:100%;font-size:13px;color:gray;"
                                        class="form-control">
                                        <option value="">Custom Woven Tags</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="attributes[embellishment]" title="Custom Woven Tags" type="text"
                                        placeholder="Custom Woven Tags" id="" required=""
                                        style="border-radius: 8px;width:100%;font-size:13px;color:gray;"
                                        class="form-control">
                                        <option value="">Please Select Embellishment</option>
                                        <option value="Embroidered">Embroidered</option>
                                        <option value="Screen Printing">Screen Printing</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <textarea class="form-control" required="" type="text" name="instruction_notes"
                                placeholder="Special Instructions" style="border-radius: 8px;padding: 5px;" id="txtmessage"></textarea>
                        </div>

                        <div class="row mb-3 file__load">

                            <div class="col-md-12">
                                <label style="font-size:13px;">Upload Images</label>
                                <div class="form-group artwork-wrapper upload-image">
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
