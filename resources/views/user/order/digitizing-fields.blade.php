<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <div class="j-input">
                <label for="colors">
                    <b>Type *</b>
                </label>
                <select name="attributes[cloth_type]" class="form-control @error('type') is-invalid @enderror"
                    id="fabrics-digital" required>
                    <option value="">Fabric / Garments</option>
                    <option value="Cotton">Cotton</option>
                    <option value="Polyester">Polyester</option>
                    <option value="Poly/Cotton Blends">Poly/Cotton Blends</option>
                    <option value="Polo">Polo</option>
                    <option value="Twill">Twill</option>
                    <option value="Fleece">Fleece</option>
                    <option value="Denim">Denim</option>
                    <option value="Knit">Knit</option>
                    <option value="Silk">Silk</option>
                    <option value="Nylon">Nylon</option>
                    <option value="other">other</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="j-input">
                <label for="cname">
                    <b>Placement *</b>
                </label>
                <select class="form-control @error('placement') is-invalid @enderror" name="attributes[placement]"
                    id="placement-digital" data-other="#textbox_id1" data-other-text="Other" required>
                    <option>Design Placement</option>
                    <option style="font-weight: 700;" value="Cap">Cap</option>
                    <option value="Cap Back">Cap Back</option>
                    <option value="Beanie">Beanie</option>
                    <option value="Cap Front">Cap Front</option>
                    <option value="Cap Side">Cap Side</option>
                    <optgroup label="Others">
                        <option value="Jacket Back">Jacket Back</option>
                        <option value="Left Chest">Left Chest</option>
                        <option value="Front Chest">Front Chest</option>
                        <option value="Sleeves">Sleeves</option>
                        <option value="other">other</option>
                    </optgroup>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group  selection mt-3" id="otherformat" style="display: none;">
    <label for="input-5">Enter Format *</label>
    <input type="text" placeholder="Enter other format" id="other_format"
        class="form-control other-format @error('other_format') is-invalid @enderror" name="attributes[other_format]">
</div>
<div class="row mt-3">
    <div class="col-md-6 Appliques">
        <div class="form-group">
            <div class="j-span5">
                <b><label for="Appliquen">Appliques</label></b>
            </div>
            <div class="d-flex ml-4">
                <div class="radio" style="margin-right: 30px;">
                    <label> <input type="radio" id="yes-applique" value="1" name="attributes[applique]"
                            class="parsley-validated form-check-inline" data-required="true" />Yes
                    </label>
                </div>
                <div class="j-span3 j-input form-check-inline">
                    <div class="radio">
                        <label> <input type="radio" id="no-applique" value="0" name="attributes[applique]"
                                class="parsley-validated" data-required="true" />&nbsp;No </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5" style="display: none;">
        <div class="form-group">
            <div class="j-span5">
                <label for="sew"><b>Sew-Out Sample</b></label>
            </div>
            <div class="j-span3 form-check-inline">
                <div class="radio">
                    <label> <input type="radio" id="sew" value="1" name="attributes[sew-out-sample]"
                            class="parsley-validated" data-required="true" />&nbsp;Yes </label>
                </div>
            </div>
            <div class="j-span3 form-check-inline">
                <div class="radio">
                    <label> <input type="radio" vid="sew" value="0" name="attributes[sew-out-sample]"
                            class="parsley-validated" data-required="true" />&nbsp;No </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="input-5">Design Format *</label>
            <select class="form-control @error('design_format') is-invalid @enderror" name="attributes[design_format]"
                id="design-format-digital" required>
                <option value="" selected="">Design Format</option>
                <option value="Tajima (*.DST)">Tajima (*.DST)</option>
                <option value="Melco (*.CND)">Melco (*.CND)</option>
                <option value="Melco (*.EXP)">Melco (*.EXP)</option>
                <option value="Deco, Brother, Babylock  (*.PES)">Deco, Brother, Babylock
                    (*.PES)
                </option>
                <option value="Wilcom (*.EMB)">Wilcom (*.EMB)</option>
                <option value="Wilcom V9 (*.EMB)">Wilcom V9 (*.EMB)</option>
                <option value="Wilcom ESS (*.ESS)">Wilcom ESS (*.ESS)</option>
                <option value="Wilcom ESL (*.ESL)">Wilcom ESL (*.ESL)</option>
                <option value="Wilcom PLauen (*.T10)">Wilcom PLauen (*.T10)</option>
                <option value="Wilcom Saurer (*.T15)">Wilcom Saurer (*.T15)</option>
                <option value="Hiraoka DAT (*.DAT)">Hiraoka DAT (*.DAT)</option>
                <option value="Hiraoka VEP (*.VEP)">Hiraoka VEP (*.VEP)</option>
                <option value="Saurer SLC (*.SAS)">Saurer SLC (*.SAS)</option>
                <option value="Time and Space MJD (*.MJD)">Time and Space MJD (*.MJD)
                </option>
                <option value="Barudan (*.DSB)">Barudan (*.DSB)</option>
                <option value="ZSK (*.DSZ)">ZSK (*.DSZ)</option>
                <option value="ZSK TC(*.Z??)">ZSK TC(*.Z??)</option>
                <option value="Toyota (*.10O)">Toyota (*.10O)</option>
                <option value="Barudan (*.U??)">Barudan (*.U??)</option>
                <option value="Pfaff (*.KSM)">Pfaff (*.KSM)</option>
                <option value="Happy (*.TAP)">Happy (*.TAP)</option>
                <option value="Tajima (*.T01)">Tajima (*.T01)</option>
                <option value="Barudan (*.T03)">Barudan (*.T03)</option>
                <option value="Zangs (*.T04)">Zangs (*.T04)</option>
                <option value="ZSK (*.T05)">ZSK (*.T05)</option>
                <option value="Compucon (*.XXX)">Compucon (*.XXX)</option>
                <option value="Artista Design V4.0 (*.ART)">Artista Design V4.0 (*.ART)
                </option>
                <option value="Artista Design V3.0 (*.ART)">Artista Design V3.0 (*.ART)
                </option>
                <option value="Artista Design V2.0 (*.ART)">Artista Design V2.0 (*.ART)
                </option>
                <option value="Artista Design V1.0 (*.ART)">Artista Design V1.0 (*.ART)
                </option>
                <option value="Explorations Projects (*.ART42)">Explorations Projects
                    (*.ART42)
                </option>
                <option value="Explorations Tamplates (*.AMT42)">Explorations Tamplates
                    (*.AMT42)
                </option>
                <option value="Janome/Elna/Kenmore (*.SEW)">Janome/Elna/Kenmore (*.SEW)
                </option>
                <option value="Janome/Elna/Kenmore (*.JEF)">Janome/Elna/Kenmore (*.JEF)
                </option>
                <option value="Husqvarna/Viking (*.HUS)">Husqvarna/Viking (*.HUS)</option>
                <option value="Deco, Brother, Babylock (*.PEC)">Deco, Brother, Babylock
                    (*.PEC)
                </option>
                <option value="Pfaff (*.PCS)">Pfaff (*.PCS)</option>
                <option value="Pfaff (*.PCD)">Pfaff (*.PCD)</option>
                <option value="Pfaff (*.PCQ)">Pfaff (*.PCQ)</option>
                <option value="Poem, Huskygram, Singer (*.CSD)">Poem, Huskygram, Singer
                    (*.CSD)
                </option>
                <option value="Pxf">Pxf</option>
                <option value="Ofm">Ofm</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="input-5">Time Frame *</label>
            <select class="form-control @error('time_frame') is-invalid @enderror" name="attributes[time_frame]"
                id="time-frame" required data-placement="Time Fram">
                <option value="" selected="">Time Frame</option>
                <option value="Normal Turnaround 3 - 24 Hours.">Normal Turnaround 3 - 24
                    Hours.
                </option>
                <option value="Urgent Turnaround 1-12 Hours.">Urgent Turnaround 1-12 Hours.
                    (Additional $5). </option>
            </select>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="form-group">
            <b><label>Auto Thread Cutting </label></b>
            <button type="button" class="btn btn-sm" data-toggle="popover"
                style="padding-top: 3px; font-size: 16px; padding-bottom: 0px; color: #126aca;" data-container="body"
                data-placement="right" data-content="<img width='400px' src='/assets/img/auto-thread.jpg'>"
                data-original-title="" title="">
                <a target="_blank" href="/assets/img/auto-thread.jpg"><i class="bx bx-info-circle"></i></a>
            </button>
            <div class="j-input" style="margin-top: 10px;">
                <div class="j-span3 form-check-inline">
                    <div class="radio">
                        <label> <input type="radio" id="cutting" value="1"
                                name="attributes[threading_cute_size]" class="parsley-validated"
                                data-required="true" />&nbsp;Cut
                            thread
                            longer than 2 mm </label>
                    </div>
                </div>
                <div class="j-span3 form-check-inline">
                    <div class="radio">
                        <label> <input type="radio" id="cutting" value="2"
                                name="attributes[threading_cute_size]" class="parsley-validated"
                                data-required="true" />&nbsp;Cut all
                            connection threads </label>
                    </div>
                </div>
                <div class="j-span3 form-check-inline">
                    <div class="radio">
                        <label> <input type="radio" id="cutting" value="3"
                                name="attributes[threading_cute_size]" class="parsley-validated"
                                data-required="true" />&nbsp;Do
                            not
                            cut threads </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#fabrics-digital').change(function() {
            if ($(this).val() === 'other') {
                $('#otherformat').show();
            } else {
                $('#otherformat').hide();
            }
        });
    });
</script>
