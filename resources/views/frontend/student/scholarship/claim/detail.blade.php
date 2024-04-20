@extends('frontend.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon " style="margin:0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28.326" height="25.568"
                        viewBox="0 0 28.326 25.568">
                        <g id="education" transform="translate(-2.25 -3.233)">
                            <path fill="#2b8540 " class="cls-3" id="Path_1660" data-name="Path 1660"
                                d="M24.061,24.057,16.98,28.041,9.9,24.057V19.849L7.875,18.725v6.516l9.1,5.121,9.1-5.121V18.724l-2.023,1.124v4.208Z"
                                transform="translate(-0.567 -1.561)" fill="#fff" />
                            <path fill="#2b8540 " class="cls-3" id="Path_1661" data-name="Path 1661"
                                d="M16.413,3.233,2.25,10.576V12.33L16.413,20.2l12.14-6.744v5.588h2.023V10.576Zm10.116,9.031-2.023,1.124-8.093,4.5-8.093-4.5L6.3,12.264l-1.4-.779L16.413,5.512l11.518,5.973Z"
                                transform="translate(0)" fill="#fff" />
                        </g>
                    </svg>
                </i>
            </div>
            <div>
                Claim Scholarship Details
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a id="tableToExcel" class="btn-shadow btn btn-success ml-2"
                    href="" onclick="window.print()" >
                    <span class="btn-icon-wrapper pr-2 opacity-7 text-white">
                        <i class="fas fa-file-excel fa-w-20"></i>
                    </span>
                    <span class="text-white"> Download PDF </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Claim Scholarship Details</h5>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="student_id">Student Id <span
                                class="required-class">*</span></label>
                                <input type="text" class="form-control rounded"
                                value="{{ $claim->student_id }}" readonly>
                    <div class="invalid-feedback">
                        Please select a student id.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           name="fullname" id="fullname_id"
                           placeholder="Student Full Name"
                           value="{{ $claim->fullname }}" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="board_intermediate">Board Of Intermediate <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           id="board_intermediate" name="board_intermediate"
                           placeholder="Enter Board Of Intermediate"
                           value="{{ $claim->board_intermediate }}" maxlength="55" required readonly>
                    <div class="invalid-feedback">
                        Please enter your board intermediate.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="marks_in_xi">Marks in XI ( Write in this format:
                        440/550 ) <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowSlash marksFormat" id="marks_in_xi" name="marks_in_xi"
                           placeholder="Enter Marks in XI"
                           value="{{ $claim->marks_in_xi }}" maxlength="7" required readonly>
                    <div class="invalid-feedback">
                        Please enter your marks.
                    </div>
                    <span class="text-danger font-weight-light marks_in_xi"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="marks_in_xii">Marks in XII ( Write in this
                        format: 800/1100 ) </label>
                    <input type="text" class="form-control rounded allowSlash marksFormat" id="marks_in_xii" name="marks_in_xii"
                           placeholder="Enter Marks in XII"
                           value="{{ $claim->marks_in_xii }}" maxlength="9" required readonly>
                    <span class="text-danger font-weight-light marks_in_xii"></span>
                    <div class="invalid-feedback">
                        Please enter your marks.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_one">Marks in Bachelor's Year
                        1 </label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="marks_in_bachelor_one" name="marks_in_bachelor_one"
                           placeholder="Enter Marks in Bachelor's Year 1"
                           value="{{ $claim->marks_in_bachelor_one }}" maxlength="3" required readonly>
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_two">Marks in Bachelor's Year
                        2 </label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="marks_in_bachelor_two" name="marks_in_bachelor_two"
                           placeholder="Enter Marks in Bachelor's Year 2"
                           value="{{ $claim->marks_in_bachelor_two }}" maxlength="3" required readonly>
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_three">Marks in Bachelor's Year
                        3 </label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="marks_in_bachelor_three" name="marks_in_bachelor_three"
                           placeholder="Enter Marks in Bachelor's Year 3"
                           value="{{ $claim->marks_in_bachelor_three }}" maxlength="3" required readonly>
                        <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_four">Marks in Bachelor's Year
                        4 </label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="marks_in_bachelor_four" name="marks_in_bachelor_four"
                           placeholder="Enter Marks in Bachelor's Year 4"
                           value="{{ $claim->marks_in_bachelor_four }}" maxlength="3" required readonly>
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_five">Marks in Bachelor's Year
                        5 </label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="marks_in_bachelor_five" name="marks_in_bachelor_five"
                           placeholder="Enter Marks in Bachelor's Year 5"
                           value="{{ $claim->marks_in_bachelor_five }}" maxlength="3" required readonly>
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Your Degree Full Name </label>
                    <input type="text" class="form-control rounded"
                           value="{{ $claim->degree_name }}"
                           readonly
                           style="text-transform: uppercase">
                </div>
                <div class="form-group col-md-6">
                    <label for="current_city">Your Current City Name <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           id="current_city" name="current_city"
                           placeholder="Enter Current City Name"
                           value="{{ $claim->current_city }}" maxlength="55" required readonly>
                           <div class="invalid-feedback">
                            Please enter your city name.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Intermediate Repeated:<span
                                class="required-class">*</span></label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="intermediate_repeated"
                               class="custom-control-input"
                               id="intermediate_repeated_yes"
                               value="yes" {{ empty(old("intermediate_repeated")) || old("intermediate_repeated",$claim->intermediate_repeated) == 'yes' ? 'checked readonly' : '' }}>
                        <label class="custom-control-label checkbox-primary outline"
                               for="intermediate_repeated_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="intermediate_repeated"
                               class="custom-control-input"
                               id="intermediate_repeated_no"
                               value="no" {{ old("intermediate_repeated",$claim->intermediate_repeated) == 'no' ? 'checked' : '' }}>
                        <label class="custom-control-label checkbox-primary outline"
                               for="intermediate_repeated_no">No</label>
                    </div>
                </div>
            </div>
            <hr style="margin-top: -10px">
            <h5 class="card-title">Past Installments</h5>
            <hr>
            @foreach($claim->installments as $key => $val)
            @php $key = $key +1; @endphp
            <h6>Installments {{$key}}</h6>
            <input type="hidden" name="installments[{{$key}}]"
                   value="{{$val->inst_number}}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="year_of_receiving{{$key}}">Year Of Receiving</label>
                    <input type="text" class="form-control rounded"
                           id="year_of_receiving{{$key}}"
                           name="year_of_receiving[{{$key}}]"
                           placeholder="Enter Year Of Receiving"
                           value="{{ old('year_of_receiving'.$key,$val->year_of_receiving) }}"
                           readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="received_yes{{$key}}">Receieved Yes Or No</label>
                    <input type="text" class="form-control rounded "
                           id="received_yes{{$key}}" name="received_yes[{{$key}}]"
                           placeholder="Enter Receieved Yes Or No"
                           value="{{ old('received_yes'.$key,$val->received_yes) }}"
                           readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="if_no_reason{{$key}}">If No Then Give Reason
                        Why?</label>
                    <input type="text" class="form-control rounded"
                           id="if_no_reason{{$key}}" name="if_no_reason[{{$key}}]"
                           placeholder="Enter If No Then Give Reason Why?"
                           value="{{ old('if_no_reason'.$key,$val->if_no_reason) }}"
                           readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="amount_received{{$key}}">Amount Received</label>
                    <input type="text" class="form-control rounded"
                           id="amount_received{{$key}}" name="amount_received[{{$key}}]"
                           placeholder="Enter Amount Received"
                           value="{{ old('amount_received'.$key,$val->amount_received) }}"
                           readonly>
                </div>
            </div>
        @endforeach

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="beneficary_name">Your Beneficiary Name <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           id="beneficary_name" name="beneficary_name"
                           placeholder="Enter Your Beneficiary Name"
                           value="{{ $claim->beneficary_name }}" maxlength="55" required readonly>
                           <div class="invalid-feedback">
                            Please enter your beneficiary name.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="beneficary_iban_number">Your Beneficiary's 24 Digits
                        IBAN number <span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded"
                           id="beneficary_iban_number" name="beneficary_iban_number"
                           placeholder="Enter Your Beneficiary's 24 Digits IBAN number"
                           value="{{ $claim->beneficary_iban_number }}" maxlength="34" required readonly>
                           <div class="invalid-feedback">
                            Please enter your beneficiary's 24 digits.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="beneficary_bank">Your Beneficiary's Bank Name <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded"
                           id="beneficary_bank" name="beneficary_bank"
                           placeholder="Enter Your Beneficiary Bank Name"
                           value="{{ $claim->beneficary_bank }}" maxlength="55" required readonly>
                           <div class="invalid-feedback">
                            Please enter your beneficiary's bank name.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="beneficary_cnic">Your Beneficiary's CNIC Number <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="beneficary_cnic" name="beneficary_cnic"
                           placeholder="Enter Your Beneficiary's CNIC Number"
                           value="{{ $claim->beneficary_cnic }}" maxlength="14" required readonly>
                           <div class="invalid-feedback">
                            Please enter your beneficiary's CNIC number.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="beneficary_bank_address">Your Beneficiary's Bank Address <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded"
                           id="beneficary_bank_address" name="beneficary_bank_address"
                           placeholder="Enter Your Beneficiary's CNIC Number"
                           value="{{ $claim->beneficary_bank_address }}" required readonly>
                           <div class="invalid-feedback">
                            Please enter your beneficiary's bank address.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cnic_number">Your CNIC Number / Form 'B' <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="cnic_number" name="cnic_number"
                           placeholder="Enter Your CNIC Number / Form 'B'"
                           value="{{ $claim->cnic_number }}" maxlength="14" required readonly>
                           <div class="invalid-feedback">
                            Please enter your CNIC number / form 'B'.
                        </div>

                </div>
                <div class="form-group col-md-4">
                    <label for="mobile_number">Your Mobile Number <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="mobile_number" name="mobile_number"
                           placeholder="Enter Your Mobile Number"
                           value="{{ $claim->mobile_number }}" maxlength="13" required readonly>
                           <div class="invalid-feedback">
                            Please enter your mobile number.
                        </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="whatsapp_number">Your WhatsApp Number </label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="whatsapp_number" name="whatsapp_number"
                           placeholder="Enter Your WhatsApp Number"
                           value="{{ $claim->whatsapp_number }}" maxlength="13" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="goals">Short & Long Term Goals and how you will pay
                        back/serve Dalda
                        Foundation after completing your degree? <span
                                class="required-class">*</span></label>
                    <textarea name="goals" class="form-control"
                              placeholder="Enter Short & Long Term Goals"
                              rows="2" maxlength="250" required readonly>{{ $claim->goals }}</textarea>
                        <div class="invalid-feedback">
                        Please enter valid input.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="suggestion">Your Suggestions, how we together can
                        develop Dalda Foundation Community to serve
                        mankind ? <span class="required-class">*</span></label>
                    <textarea name="suggestion" class="form-control"
                              placeholder="Enter Your Suggestions"
                              rows="2"
                              maxlength="250" required readonly>{{ $claim->suggestion }}</textarea>
                              <div class="invalid-feedback">
                                Please enter valid input.
                            </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="your_contribution">What role you will play for Dalda
                        Foundation Community ? <span
                                class="required-class">*</span></label>
                    <textarea name="your_contribution" class="form-control"
                              placeholder="Enter Your Role For Dalda Foundation"
                              rows="2"
                              maxlength="250" required readonly>{{ $claim->your_contribution }}</textarea>
                              <div class="invalid-feedback">
                                Please enter valid input.
                            </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="contact">Are you interested in achieving international
                        scholarships with the help of Dalda
                        Foundation Trust ? <span
                                class="required-class">*</span></label><div class="input-group">
                                    <input type="text"
                                           class="form-control rounded"
                                           value="{{ $claim->international_scolarship }}" readonly>
                                </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cnic">Are you ready to take standardized tests such as
                        GRE/GMAT/LSAT ? <span
                                class="required-class">*</span></label>
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control rounded"
                                           value="{{ $claim->standarized_test }}" readonly>
                                </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="contact">Are you ready to take English ability test such
                        as IELTS/TOEFL/PTE/PVT/ITEP/DUOLINGO ? <span
                                class="required-class">*</span></label><div class="input-group">
                                    <input type="text"
                                           class="form-control rounded"
                                           value="{{ $claim->english_ability_test }}" readonly>
                                </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Anything you want to share with Dalda Foundation Trust ?</label>
                    <textarea class="form-control"
                              rows="2"
                              readonly>{{ $claim->share_any }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Matric Mark Sheet Photo </label>
                    @if(!empty($claim->matric_photo) && Storage::disk('public')->exists('uploads/'.$claim->matric_photo))
                        @if( in_array('pdf',explode('.',$claim->matric_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->matric_photo)}}"
                                   class="alert-link">Matric Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->matric_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->matric_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Intermediate Mark Sheet Photo </label>
                    @if(!empty($claim->intermediate_photo) && Storage::disk('public')->exists('uploads/'.$claim->intermediate_photo))
                        @if( in_array('pdf',explode('.',$claim->intermediate_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->intermediate_photo)}}"
                                   class="alert-link">Intermediate Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->intermediate_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->intermediate_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Bachelor's Year 1 Mark Sheet Photo </label>
                    @if(!empty($claim->bachelor_one_photo) && Storage::disk('public')->exists('uploads/'.$claim->bachelor_one_photo))
                        @if( in_array('pdf',explode('.',$claim->bachelor_one_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->bachelor_one_photo)}}"
                                   class="alert-link">Bachelor's Year 1 Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->bachelor_one_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->bachelor_one_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Bachelor's Year 2 Mark Sheet Photo </label>
                    @if(!empty($claim->bachelor_two_photo) && Storage::disk('public')->exists('uploads/'.$claim->bachelor_two_photo))
                        @if( in_array('pdf',explode('.',$claim->bachelor_two_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->bachelor_two_photo)}}"
                                   class="alert-link">Bachelor's Year 2 Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->bachelor_two_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->bachelor_two_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Bachelor's Year 3 Mark Sheet Photo </label>
                    @if(!empty($claim->bachelor_three_photo) && Storage::disk('public')->exists('uploads/'.$claim->bachelor_three_photo))
                        @if( in_array('pdf',explode('.',$claim->bachelor_three_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->bachelor_three_photo)}}"
                                   class="alert-link">Bachelor's Year 3 Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->bachelor_three_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->bachelor_three_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Bachelor's Year 4 Mark Sheet Photo </label>
                    @if(!empty($claim->bachelor_four_photo) && Storage::disk('public')->exists('uploads/'.$claim->bachelor_four_photo)  )
                        @if( in_array('pdf',explode('.',$claim->bachelor_four_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->bachelor_four_photo)}}"
                                   class="alert-link">Bachelor's Year 4 Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->bachelor_four_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->bachelor_four_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Bachelor's Year 5 Mark Sheet Photo </label>
                    @if(!empty($claim->bachelor_five_photo) && Storage::disk('public')->exists('uploads/'.$claim->bachelor_five_photo))
                        @if( in_array('pdf',explode('.',$claim->bachelor_five_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->bachelor_five_photo)}}"
                                   class="alert-link">Bachelor's Year 5 Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->bachelor_five_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->bachelor_five_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Beneficiary CNIC Photo </label>
                    @if(!empty($claim->beneficary_cnic_photo) && Storage::disk('public')->exists('uploads/'.$claim->beneficary_cnic_photo))
                        @if( in_array('pdf',explode('.',$claim->beneficary_cnic_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->beneficary_cnic_photo)}}"
                                   class="alert-link">Beneficiary CNIC Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->beneficary_cnic_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->beneficary_cnic_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Father/Mother or Guardian CNIC Photo </label>
                    @if(!empty($claim->parent_cnic_photo) && Storage::disk('public')->exists('uploads/'.$claim->parent_cnic_photo))
                        @if( in_array('pdf',explode('.',$claim->parent_cnic_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/'.$claim->parent_cnic_photo)}}"
                                   class="alert-link">Father/Mother or Guardian CNIC Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $claim->parent_cnic_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $claim->parent_cnic_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>
                </div>
            </div>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
        </script>
    </div>
</div>
    {{-- <main>
        <div class="container-fluid site-width">


            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Claim Scholarship Details</h4>
                                </div>
                                <div class="col-md-6 row justify-content-end">
                                    <a href="" class="btn btn-primary mr-2" onclick="window.print()">Pdf</a>
                                    <a href="/student/claim-for-scholarship" class="btn btn-primary float-right">←
                                        Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Student Id </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->student_id }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Full Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->fullname }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Board Of Intermediate </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->board_intermediate }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Marks in XI ( Write in this format:
                                                    440/550 ) </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->marks_in_xi }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Marks in XII ( Write in this format:
                                                    800/1100 ) </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->marks_in_xii }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Marks in Bachelor's Year
                                                    1 </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->marks_in_bachelor_one }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Marks in Bachelor's Year
                                                    2 </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->marks_in_bachelor_two }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Marks in Bachelor's Year
                                                    3 </label>
                                                <input type="text" class="form-control rounded "
                                                       value="{{ $claim->marks_in_bachelor_three }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Marks in Bachelor's Year
                                                    4 </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->marks_in_bachelor_four }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Marks in Bachelor's Year
                                                    5 </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->marks_in_bachelor_five }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your Degree Full Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->degree_name }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="current_city">Current City Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->current_city }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Intermediate Repeated:<span
                                                            class="required-class">*</span></label>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="intermediate_repeated"
                                                           class="custom-control-input"
                                                           id="intermediate_repeated_yes"
                                                           value="yes" {{ empty(old("intermediate_repeated")) || old("intermediate_repeated",$claim->intermediate_repeated) == 'yes' ? 'checked readonly' : '' }}>
                                                    <label class="custom-control-label checkbox-primary outline"
                                                           for="intermediate_repeated_yes">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="intermediate_repeated"
                                                           class="custom-control-input"
                                                           id="intermediate_repeated_no"
                                                           value="no" {{ old("intermediate_repeated",$claim->intermediate_repeated) == 'no' ? 'checked' : '' }}>
                                                    <label class="custom-control-label checkbox-primary outline"
                                                           for="intermediate_repeated_no">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your Beneficiary Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->beneficary_name }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="beneficary_iban_number">Your Beneficiary's 24 Digits
                                                    IBAN number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->beneficary_iban_number }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="beneficary_bank_address">Your Beneficiary's Bank Address
                                                    <span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded"
                                                       id="beneficary_bank_address" name="beneficary_bank_address"
                                                       placeholder="Enter Your Beneficiary's CNIC Number"
                                                       value="{{ $claim->beneficary_bank_address }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your Beneficiary Bank Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->beneficary_bank }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Beneficiary's CNIC Number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->beneficary_cnic }}" readonly>
                                            </div>
                                        </div>

                                        <h4>Past Installments</h4>

                                        @foreach($claim->installments as $key => $val)
                                            @php $key = $key +1; @endphp
                                            <h6>Installments {{$key}}</h6>
                                            <input type="hidden" name="installments[{{$key}}]"
                                                   value="{{$val->inst_number}}">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="year_of_receiving{{$key}}">Year Of Receiving</label>
                                                    <input type="text" class="form-control rounded"
                                                           id="year_of_receiving{{$key}}"
                                                           name="year_of_receiving[{{$key}}]"
                                                           placeholder="Enter Year Of Receiving"
                                                           value="{{ old('year_of_receiving'.$key,$val->year_of_receiving) }}"
                                                           readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="received_yes{{$key}}">Receieved Yes Or No</label>
                                                    <input type="text" class="form-control rounded "
                                                           id="received_yes{{$key}}" name="received_yes[{{$key}}]"
                                                           placeholder="Enter Receieved Yes Or No"
                                                           value="{{ old('received_yes'.$key,$val->received_yes) }}"
                                                           readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="if_no_reason{{$key}}">If No Then Give Reason
                                                        Why?</label>
                                                    <input type="text" class="form-control rounded"
                                                           id="if_no_reason{{$key}}" name="if_no_reason[{{$key}}]"
                                                           placeholder="Enter If No Then Give Reason Why?"
                                                           value="{{ old('if_no_reason'.$key,$val->if_no_reason) }}"
                                                           readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="amount_received{{$key}}">Amount Received</label>
                                                    <input type="text" class="form-control rounded"
                                                           id="amount_received{{$key}}" name="amount_received[{{$key}}]"
                                                           placeholder="Enter Amount Received"
                                                           value="{{ old('amount_received'.$key,$val->amount_received) }}"
                                                           readonly>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your CNIC Number / Form 'B' </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->cnic_number }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Mobile Number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->mobile_number }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your WhatsApp Number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->whatsapp_number }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Email Address </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $claim->email_address }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Short & Long Term Goals and how you will pay back/serve Dalda
                                                    Foundation after completing your degree ?</label>
                                                <textarea class="form-control"
                                                          rows="2" readonly>{{ $claim->goals }}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Suggestions, how we together can develop Dalda Foundation
                                                    Community to serve
                                                    mankind ?</label>
                                                <textarea class="form-control"
                                                          rows="2" readonly>{{ $claim->suggestion }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>What role you will play for Dalda
                                                    Foundation Community ?</label>
                                                <textarea class="form-control"
                                                          rows="2"
                                                          readonly>{{ $claim->your_contribution }}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Are you interested in achieving international
                                                    scholarships with the help of Dalda
                                                    Foundation Trust ? </label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control rounded"
                                                           value="{{ $claim->international_scolarship }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Are you ready to take standardized tests such as
                                                    GRE/GMAT/LSAT ? </label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control rounded"
                                                           value="{{ $claim->standarized_test }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Are you ready to take English ability test such
                                                    as IELTS/TOEFL/PTE/PVT/ITEP/DUOLINGO ? </label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control rounded"
                                                           value="{{ $claim->english_ability_test }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Anything you want to share with Dalda Foundation Trust ?</label>
                                                <textarea class="form-control"
                                                          rows="2"
                                                          readonly>{{ $claim->share_any }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Student Photo </label>
                                                @if(!empty($claim->student_photo))
                                                    <div class="d-flex">
                                                        <img src="{{Storage::url('uploads/'.$claim->student_photo ?? '')}}"
                                                             width="100" height="100">

                                                    </div>
                                            </div>
                                            @endif
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label>Intermediate Mark Sheet Photo </label>
                                            @if(!empty($claim->intermediate_photo))
                                                @if( in_array('pdf',explode('.',$claim->intermediate_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->intermediate_photo)}}"
                                                           class="alert-link">Intermediate Mark Sheet Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->intermediate_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Bachelor's Year 1 Mark Sheet Photo </label>
                                            @if(!empty($claim->bachelor_one_photo))
                                                @if( in_array('pdf',explode('.',$claim->bachelor_one_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->bachelor_one_photo)}}"
                                                           class="alert-link">Bachelor's Year 1 Mark Sheet Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->bachelor_one_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Bachelor's Year 2 Mark Sheet Photo </label>
                                            @if(!empty($claim->bachelor_two_photo))
                                                @if( in_array('pdf',explode('.',$claim->bachelor_two_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->bachelor_two_photo)}}"
                                                           class="alert-link">Bachelor's Year 2 Mark Sheet Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->bachelor_two_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Bachelor's Year 3 Mark Sheet Photo </label>
                                            @if(!empty($claim->bachelor_three_photo))
                                                @if( in_array('pdf',explode('.',$claim->bachelor_three_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->bachelor_three_photo)}}"
                                                           class="alert-link">Bachelor's Year 3 Mark Sheet Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->bachelor_three_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Bachelor's Year 4 Mark Sheet Photo </label>
                                            @if(!empty($claim->bachelor_four_photo))
                                                @if( in_array('pdf',explode('.',$claim->bachelor_four_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->bachelor_four_photo)}}"
                                                           class="alert-link">Bachelor's Year 4 Mark Sheet Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->bachelor_four_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Bachelor's Year 5 Mark Sheet Photo </label>
                                            @if(!empty($claim->bachelor_five_photo))
                                                @if( in_array('pdf',explode('.',$claim->bachelor_five_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->bachelor_five_photo)}}"
                                                           class="alert-link">Bachelor's Year 5 Mark Sheet Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->bachelor_five_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Beneficiary CNIC Photo </label>
                                            @if(!empty($claim->beneficary_cnic_photo))
                                                @if( in_array('pdf',explode('.',$claim->beneficary_cnic_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->beneficary_cnic_photo)}}"
                                                           class="alert-link">Beneficiary CNIC Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->beneficary_cnic_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Father/Mother or Guardian CNIC Photo </label>
                                            @if(!empty($claim->parent_cnic_photo))
                                                @if( in_array('pdf',explode('.',$claim->parent_cnic_photo)))
                                                    <div class="alert alert-secondary" role="alert">
                                                        <a href="{{ Storage::url('uploads/'.$claim->parent_cnic_photo)}}"
                                                           class="alert-link">Father/Mother or Guardian CNIC Photo </a>.
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        <div class="hovereffect">
                                                            <img src="{{Storage::url('uploads/'.$claim->parent_cnic_photo ?? '')}}">
                                                            <div class="overlay">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END: Card DATA-->
        </div>
    </main> --}}
@endsection
