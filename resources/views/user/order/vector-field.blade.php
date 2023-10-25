<div class="form-group mt-3">
    <label for="input-3">What will you use it for *</label>
    <select name="attributes[where_will_use]" class="form-control @error('type') is-invalid @enderror" id="use1"
        required>
        <option value=""></option>
        <option value="Screen Printing">Screen Printing</option>
        <option value="Direct To Garment">Direct To Garment</option>
        <!-- <option value="Embroidery">Embroidery</option> -->
        <option value="Sublimation">Sublimation</option>
        <option value="Vinyl Cutting">Vinyl Cutting</option>
        <option value="Laser Engraving">Laser Engraving</option>
        <option value="Lapel Pins/Emblems">Denim</option>
        <option value="Sand Blasting">Sand Blasting</option>
        <option value="Diamond Drag Engarving">Diamond Drag Engraving</option>
        <option value="Other">Other</option>
    </select>
</div>
<div class="form-group mt-3">
    <label for="input-4">Color Scheme *</label>
    <select name="attributes[color_scheme]" id="colorscheme"
        class="form-control @error('placement') is-invalid @enderror" required>
        <option value="">Color Scheme</option>
        <option value="Black and White">Black and White</option>
        <option value="Black and White with halftones">Black
            and White with halftones
        </option>
        <option value="Spot Colors with NO Halftones">Spot
            Colors with NO Halftones
        </option>
        <option value="Spot Colors with Halftones">Spot
            Colors with Halftones
        </option>
        <option value="Other">Other</option>
    </select>
</div>
<div class="form-group mt-3">
    <label for="input-5">Design Format *</label>
    <select class="form-control @error('design_format') is-invalid @enderror" name="attributes[design_format]"
        id="designformat" required>
        <option value="" selected="">Design Format</option>
        <option value=".ai">.ai</option>
        <option value=".cdr">.cdr</option>
        <option value=".pdf">.pdf</option>
        <option value=".eps">.eps</option>
        <option value=".psd">.psd</option>
        <option value=".svg">.svg</option>
        <option value="other">other</option>
    </select>
</div>
<div class="form-group  selection mt-3" id="otherdesignformat" style="display: none;">
    <label for="input-5">Enter Format *</label>
    <input type="text" placeholder="Enter other format" id="otherdesignformat" class="form-control other-format"
        name="attributes[other_format]">
</div>
<div class="form-group mt-3">
    <label for="input-5">Time Frame *</label>
    <select class="form-control @error('time_frame') is-invalid @enderror" name="attributes[time_frame]"
        id="time-frame-vector" require>
        <option value="" selected="">Time Frame</option>
        <option value="Normal Turnaround 3 - 24 Hours.">Normal
            Turnaround 3 - 24 Hours.
        </option>
        <option value="Urgent Turnaround 1-12 Hours.">Urgent
            Turnaround 1-12 Hours. (Additional $5).
        </option>
    </select>
</div>

<script>
    $(document).ready(function() {
        $('#designformat').change(function() {
            if ($(this).val() === 'other') {
                $('#otherdesignformat').show();
            } else {
                $('#otherdesignformat').hide();
            }
        });
    });
</script>
