@extends('frontend.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon" style="margin:0">
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
                Scholarship Details
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a id="tableToExcel" class="btn-shadow btn btn-success ml-2"
                onclick="window.print()" data-toggle="tooltip"
                    data-placement="bottom" title="">
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
        <h5 class="card-title">Scholarship Details</h5>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="scholarship_as_per_education">Scholarship according to your education<span class="required-class">*</span></label>
                <input type="text" class="form-control rounded" value="{{ $apply->scholarship_as_per_education }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Student Name</label>
                <input type="text" class="form-control rounded"
                       value="{{ $apply->fullname }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                    <label for="father_name">Father Name<span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="father_name" name="father_name"
                        placeholder="Father Name" value="{{ $apply->father_name }}" readonly>
            </div>
        </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="year">Year<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" value="{{ $apply->year }}" readonly>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="matric_board">Matric Board <span class="readonly-class">*</span></label>
                    <input type="text" class="form-control" id="matric_board" name="matric_board"
                        placeholder="Enter Matric Board" value="{{ $apply->matric_board }}" readonly maxlength="100">

                </div>
                <div class="col-md-6 mb-3">
                    <label for="matriculation_year">Matriculation Year <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="matriculation_year" name="matriculation_year"
                        placeholder="Enter Matriculation Year" value="{{ $apply->matriculation_year }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="group">Matric Group <span class="readonly-class">*</span></label>
                    <input type="text" class="form-control" id="group" name="group" placeholder="Enter Group"
                        value="{{ $apply->group }}" readonly maxlength="100" readonly>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="marks_in_matric">Marks in Matric <span class="small">( Write in this format:
                            600/1050 ) </span><span class="readonly-class">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control rounded allowSlash marksFormat" id="marks_in_matric"
                            name="marks_in_matric" placeholder="Enter Marks in Matric"
                            value="{{ $apply->marks_in_matric }}" maxlength="9" readonly>

                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="current_city">Your Current City Name <span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly" id="current_city"
                        name="current_city" placeholder="Enter Current City Name" value="{{ $apply->current_city }}"
                        maxlength="55" readonly>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="beneficary_name">Your Beneficiary Name <span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly" id="beneficary_name"
                        name="beneficary_name" placeholder="Enter Your Beneficiary Name"
                        value="{{ $apply->beneficary_name }}" maxlength="55" readonly>

                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="beneficary_iban_number">Your Beneficiary's 24 Digits
                        IBAN number </label>
                    <input type="text" class="form-control rounded" id="beneficary_iban_number"
                        name="beneficary_iban_number" placeholder="Enter Your Beneficiary's 24 Digits IBAN number"
                        value="{{ $apply->beneficary_iban_number }}" maxlength="34" readonly>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="beneficary_bank">Your Beneficiary's Bank Name <span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="beneficary_bank" name="beneficary_bank"
                        placeholder="Enter Your Beneficiary Bank Name" value="{{ $apply->beneficary_bank }}"
                        maxlength="100" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="beneficary_cnic">Your Beneficiary's CNIC Number </label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="beneficary_cnic"
                        name="beneficary_cnic" placeholder="Enter Your Beneficiary's CNIC Number"
                        value="{{ $apply->beneficary_cnic }}" maxlength="14" readonly>
                </div>
                <!-- <div class="col-md-6 mb-3">
                    <label for="beneficary_bank_address">Your Beneficiary's Bank Address <span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="beneficary_bank_address"
                        name="beneficary_bank_address" placeholder="Enter Your Beneficiary's CNIC Number"
                        value="{{ $apply->beneficary_bank_address }}" readonly>
                </div> -->
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label> If you've acheived any position of board level, please provide detail </label>
                    <input type="text" class="form-control rounded " id="position_board_detail"
                        name="position_board_detail" placeholder="Enter Position Board Details"
                        value="{{ $apply->position_board_detail }}"  readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label What do you want to be in future? </label>
                    <input type="text" class="form-control rounded" id="career_path_details"
                        name="career_path_details" placeholder="Enter Career Path Details"
                        value="{{ $apply->career_path_details }}"  readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="preferred_test_location">Preferred Test Location<span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded" value="<?= $apply->preferred_test_location ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="intermediate_studies">What subject did you choose for your intermediate studies</label>
                    <input type="text" class="form-control rounded" id="intermediate_studies"
                        name="intermediate_studies" placeholder="What subject did you choose for your intermediate studies" value="{{ $apply->intermediate_studies }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="residential_address">Student Address</label>
                    <input type="text" class="form-control rounded" id="residential_address"
                        name="residential_address" placeholder="Residential Address" value="{{ $apply->residential_address }}" readonly>
                </div>

                
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="relatives_detail">Relatives Detail</label>
                    <input type="text" class="form-control rounded" id="relatives_detail"
                        name="relatives_detail" placeholder="Relatives Detail" value="{{ $apply->relatives_detail }}" readonly>
                </div>
            </div>

            <!-- <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="relatives_name">Relatives Name</label>
                    <input type="text" class="form-control rounded" id="relatives_name"
                        name="relatives_name" placeholder="Relatives Name" value="{{ $apply->relatives_name }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="relatives_email">Relatives Email</label>
                    <input type="text" class="form-control rounded" id="relatives_email"
                        name="relatives_email" placeholder="Relatives Email" value="{{ $apply->relatives_email }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="relatives_contact">Relatives Contact</label>
                    <input type="text" class="form-control rounded" id="relatives_contact"
                        name="relatives_contact" placeholder="Relatives Contact" value="{{ $apply->relatives_contact }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="relatives_address">Relatives Address</label>
                    <input type="text" class="form-control rounded" id="relatives_address"
                        name="relatives_address" placeholder="Relatives Address" value="{{ $apply->relatives_address }}" readonly>
                </div>
            </div> -->

            <hr>
                <h5 class="card-title">
                    If you're studing in any madrasa/religious education books, please provide name and complete address
                </h5>
            <hr>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="madrasa_name">Name</label>
                    <input type="text" class="form-control rounded" id="madrasa_name"
                        name="madrasa_name" placeholder="Name" value="{{ $apply->madrasa_name }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="madrasa_address">Address</label>
                    <input type="text" class="form-control rounded" id="madrasa_address"
                        name="madrasa_address" placeholder="Address" value="{{ $apply->madrasa_address }}" readonly>
                </div>
            </div>

            <hr>
            <h5 class="card-title">College Information</h5>
            <hr>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name_of_college">Name Of College<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="name_of_college" name="name_of_college"
                        placeholder="Enter Name Of College" value="{{ $apply->name_of_college }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="postal_address_of_college">Postal Address Of College<span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="postal_address_of_college"
                        name="postal_address_of_college" placeholder="Enter Postal Address Of College"
                        value="{{ $apply->postal_address_of_college }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="telephone_of_college">Telephone Number Of College<span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="telephone_of_college"
                        name="telephone_of_college" placeholder="Enter Telephone Number Of College"
                        value="{{ $apply->telephone_of_college }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="principal_name">Principal Name<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="principal_name" name="principal_name"
                        placeholder="Enter Principal Name" value="{{ $apply->principal_name }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="principal_number">Principal Number<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="principal_number" name="principal_number"
                        placeholder="Enter Principal Number" value="{{ $apply->principal_number }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="college_email">College Email Address<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="college_email" name="college_email"
                        placeholder="Enter College Email" value="{{ $apply->college_email }}" readonly>
                </div>
            </div>
            <hr>
            <h5 class="card-title">References</h5>
            <hr>
            <div class="label">
                <span class="font-weight-bold">Please give your teacher or neighbor reference which are not your
                    relatives </span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="password">Name<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="teacher_name1" name="teacher_name1"
                        placeholder="Enter Name" value="{{ $apply->teacher_name1 }}" readonly>

                </div>
                <div class="form-group col-md-4">
                    <label for="password">Cell No<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="teach_cell_no1" name="teach_cell_no1"
                        placeholder="Enter Cell No" value="{{ $apply->teach_cell_no1 }}" readonly>

                </div>
                <div class="form-group col-md-4">
                    <label for="password">Address<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="teacher_address1" name="teacher_address1"
                        placeholder="Enter Address" value="{{ $apply->teacher_address1 }}" readonly>

                </div>
                <div class="form-group col-md-4">
                    <label for="password">Name<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="teacher_name2" name="teacher_name2"
                        placeholder="Enter Name" value="{{ $apply->teacher_name2 }}" readonly>

                </div>
                <div class="form-group col-md-4">
                    <label for="password">Cell No<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="teach_cell_no2" name="teach_cell_no2"
                        placeholder="Enter Cell No" value="{{ $apply->teach_cell_no2 }}" readonly>

                </div>
                <div class="form-group col-md-4">
                    <label for="password">Address<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="teacher_address2" name="teacher_address2"
                        placeholder="Enter Address" value="{{ $apply->teacher_address2 }}" readonly>

                </div>
            </div>
            <div class="label">
                <span class="font-weight-bold">If the above information is incorrect, the form will be declined</span>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">How many family members do you have?<span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="family_members" name="family_members"
                        placeholder="How many family members do you have?" value="{{ $apply->family_members }}"
                        readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">How much monthly income?<span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="monthly_income" name="monthly_income"
                        placeholder="How much monthly income?" value="{{ $apply->monthly_income }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">How much sqr yards of your home/flat?<span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="home_in_sqr_yards"
                        name="home_in_sqr_yards" placeholder="How much sqr yards of your home/flat?"
                        value="{{ $apply->home_in_sqr_yards }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">What is source of income of your father/guardian?<span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="source_of_income" name="source_of_income"
                        placeholder="What is source of income of your father/guardian?"
                        value="{{ $apply->source_of_income }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Have you ever received any scholarships?<span
                            class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded" id="any_scholarship" name="any_scholarship"
                        placeholder="Have you ever received any scholarships?" value="{{ $apply->any_scholarship }}"
                        readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cnic_number">Your CNIC Number / Form 'B' <span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="cnic_number"
                        name="cnic_number" placeholder="Enter Your CNIC Number / Form 'B'"
                        value="{{ $apply->cnic_number }}" maxlength="14" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="mobile_number">Your Mobile Number <span class="readonly-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="mobile_number"
                        name="mobile_number" placeholder="Enter Your Mobile Number"
                        value="{{ $apply->mobile_number }}" maxlength="13" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="whatsapp_number">Your WhatsApp Number </label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="whatsapp_number"
                        name="whatsapp_number" placeholder="Enter Your WhatsApp Number"
                        value="{{ $apply->whatsapp_number }}" maxlength="13" readonly>
                </div>
            </div>
            <!-- <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="goals">Short & Long Term Goals and how you will pay back/serve Dalda
                        Foundation after completing your degree ? <span class="readonly-class">*</span></label>
                    <textarea name="goals" class="form-control" placeholder="Enter Short & Long Term Goals" rows="2"
                        maxlength="250" readonly>{{ $apply->goals }}</textarea>
                </div>
            </div> -->
            <!-- <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="suggestion">Your Suggestions, how we together can develop Dalda Foundation Community to
                        serve
                        mankind ? <span class="readonly-class">*</span></label>
                    <textarea name="suggestion" class="form-control" placeholder="Enter Your Suggestions" rows="2"
                        maxlength="250" readonly>{{ $apply->suggestion }}</textarea>
                </div>
            </div> -->
            <!-- <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="your_contribution">What role you will play for Dalda
                        Foundation Community ? <span class="readonly-class">*</span></label>
                    <textarea name="your_contribution" class="form-control" placeholder="Enter Your Role For Dalda Foundation"
                        rows="2" maxlength="250" readonly>{{ $apply->your_contribution }}</textarea>
                </div>
            </div> -->
            <div class="form-row">
                <div class="form-group form-check col-md-6">
                    <label for="contact">Are you interested in achieving international
                        scholarships with the help of Dalda
                        Foundation Trust ? <span class="readonly-class">*</span></label><br>
                    {{$apply->international_scolarship}}
                </div>
                <div class="form-group col-md-6">
                    <label for="cnic">Are you ready to take standardized tests such as
                        GRE/GMAT/LSAT ? <span class="readonly-class">*</span></label>
                    <br>
                    {{ $apply->standarized_test}}
                </div>
            </div>
            <!-- <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="contact">Are you ready to take English ability test such
                        as IELTS/TOEFL/PTE/PVT/ITEP/DUOLINGO ? <span class="readonly-class">*</span></label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="english_ability_test" class="custom-control-input"
                            id="english_ability_test_yes" value="yes"
                            {{ $apply->english_ability_test == 'yes' ? 'checked' : '' }} readonly>
                        <label class="custom-control-label checkbox-primary outline"
                            for="english_ability_test_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="english_ability_test" class="custom-control-input"
                            id="english_ability_test_no" value="no"
                            {{ $apply->english_ability_test == 'no' ? 'checked' : '' }} readonly>
                        <label class="custom-control-label checkbox-primary outline"
                            for="english_ability_test_no">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="english_ability_test" class="custom-control-input"
                            id="english_ability_test_may" value="maybe"
                            {{ $apply->english_ability_test == 'maybe' ? 'checked' : '' }} readonly>
                        <label class="custom-control-label checkbox-primary outline"
                            for="english_ability_test_may">May be</label>
                    </div>
                </div>
            </div> -->
            <!-- <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="share_any">Anything you want to share with Dalda
                        Foundation Trust ?</label>
                    <textarea name="share_any" class="form-control" placeholder="Enter Your Suggestions" rows="2"
                        maxlength="250">{{ $apply->share_any }}</textarea>

                </div>
            </div> -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Student Photo s </label>
                    @if (!empty($apply->student_photo) && Storage::disk('public')->exists('uploads/' . $apply->student_photo))
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $apply->student_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $apply->student_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                    @endif
                    {{-- @if (!empty($apply->student_photo))
                        <div class="d-flex">
                            <img src="{{ Storage::url('uploads/' . $apply->student_photo ?? '') }}" width="100"
                                height="100">
                        </div>
                    @endif --}}
                </div>
                <div class="form-group col-md-12">
                    <label>Matric Mark Sheet Photo</label>
                    @if (!empty($apply->marksheet_photo) && Storage::disk('public')->exists('uploads/' . $apply->marksheet_photo))
                        @if (in_array('pdf', explode('.', $apply->marksheet_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/' . $apply->marksheet_photo) }}"
                                    class="alert-link">Matric Mark Sheet Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $apply->marksheet_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $apply->marksheet_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-12">
                    <label>Beneficiary CNIC Photo</label>
                    @if (!empty($apply->beneficary_cnic_photo) && Storage::disk('public')->exists('uploads/' . $apply->beneficary_cnic_photo))
                        @if (in_array('pdf', explode('.', $apply->beneficary_cnic_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/' . $apply->beneficary_cnic_photo) }}"
                                    class="alert-link">Beneficiary CNIC Photo </a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $apply->beneficary_cnic_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $apply->beneficary_cnic_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
                </div>
                <div class="form-group col-md-12">
                    <label>Father/Mother or Guardian CNIC Photo</label>
                    @if (!empty($apply->parent_cnic_photo) && Storage::disk('public')->exists('uploads/' . $apply->parent_cnic_photo))
                        @if (in_array('pdf', explode('.', $apply->parent_cnic_photo)))
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ Storage::url('uploads/' . $apply->parent_cnic_photo) }}"
                                    class="alert-link">Father/Mother or Guardian CNIC Photo</a>.
                            </div>
                        @else
                        <div class="input-group">
                            <a href="{{ Storage::url('uploads/' . $apply->parent_cnic_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ Storage::url('uploads/' . $apply->parent_cnic_photo ?? '') }}" class="img-fluid rounded">
                            </a>
                        </div>
                        @endif
                    @endif
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
                                    <h4 class="card-title">Scholarship Details</h4>
                                </div>
                                <div class="col-md-6 row justify-content-end">
                                    <a href="" class="btn btn-primary mr-2" onclick="window.print()">Pdf</a>
                                    <a href="/student/apply-for-scholarship" class="btn btn-primary float-right">←
                                        Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Student Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->fullname }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Year </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->year }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Matric Board </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->matric_board }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="group">Matric Group <span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded"
                                                       id="group"
                                                       name="group" placeholder="Enter Group"
                                                       value="{{ $apply->group }}" maxlength="100">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Marks in Matric (Write in this format: 990/1050) </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->marks_in_matric }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Current City Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->current_city }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your Beneficiary Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->beneficary_name }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="beneficary_iban_number">Your Beneficiary's 24 Digits
                                                    IBAN number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->beneficary_iban_number }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your Beneficiary Bank Name </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->beneficary_bank }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Beneficiary's CNIC Number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->beneficary_cnic }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="beneficary_bank_address">Your Beneficiary's Bank Address
                                                    <span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded"
                                                       id="beneficary_bank_address" name="beneficary_bank_address"
                                                       placeholder="Enter Your Beneficiary's CNIC Number"
                                                       value="{{ $apply->beneficary_bank_address }}" readonly>
                                            </div>
                                        </div>

                                        <h4>College Information</h4>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="name_of_college">Name Of College<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="name_of_college"
                                                       name="name_of_college" placeholder="Enter Name Of College"
                                                       value="{{ old('name_of_college',$apply->name_of_college) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="postal_address_of_college">Postal Address Of College<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded"
                                                       id="postal_address_of_college"
                                                       name="postal_address_of_college"
                                                       placeholder="Enter Postal Address Of College"
                                                       value="{{ old('postal_address_of_college',$apply->postal_address_of_college) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="telephone_of_college">Telephone Number Of College<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded"
                                                       id="telephone_of_college"
                                                       name="telephone_of_college"
                                                       placeholder="Enter Telephone Number Of College"
                                                       value="{{ old('telephone_of_college',$apply->telephone_of_college) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="principal_name">Principal Name<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="principal_name"
                                                       name="principal_name" placeholder="Enter Principal Name"
                                                       value="{{ old('principal_name',$apply->principal_name) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="principal_number">Principal Number<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="principal_number"
                                                       name="principal_number" placeholder="Enter Principal Number"
                                                       value="{{ old('principal_number',$apply->principal_number) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="college_email">College Email Address<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="college_email"
                                                       name="college_email" placeholder="Enter College Email"
                                                       value="{{ old('college_email',$apply->college_email) }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <h4>References</h4>

                                        <div class="label">
                                            <span class="font-weight-bold">Please give your teacher or neighbor reference which are not your relatives </span>
                                        </div>

                                        <!-- <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="password">Name<span class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="teacher_name1"
                                                       name="teacher_name1" placeholder="Enter Name"
                                                       value="{{ old('teacher_name1',$apply->teacher_name1) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="password">Cell No<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="teach_cell_no1"
                                                       name="teach_cell_no1" placeholder="Enter Cell No"
                                                       value="{{ old('teach_cell_no1',$apply->teach_cell_no1) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="password">Address<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="teacher_address1"
                                                       name="teacher_address1" placeholder="Enter Address"
                                                       value="{{ old('teacher_address1',$apply->teacher_address1) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="password">Name<span class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="teacher_name2"
                                                       name="teacher_name2" placeholder="Enter Name"
                                                       value="{{ old('teacher_name2',$apply->teacher_name2) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="password">Cell No<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="teach_cell_no2"
                                                       name="teach_cell_no2" placeholder="Enter Cell No"
                                                       value="{{ old('teach_cell_no2',$apply->teach_cell_no2) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="password">Address<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="teacher_address2"
                                                       name="teacher_address2" placeholder="Enter Address"
                                                       value="{{ old('teacher_address2',$apply->teacher_address2) }}"
                                                       readonly>
                                            </div>
                                        </div> -->

                                        <div class="label">
                                            <span class="font-weight-bold">If the above information is incorrect from the form will be declined</span>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password">How many family members do you have?<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="family_members"
                                                       name="family_members"
                                                       placeholder="How many family members do you have?"
                                                       value="{{ old('family_members',$apply->family_members) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password">How much monthly income?<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="monthly_income"
                                                       name="monthly_income" placeholder="How much monthly income?"
                                                       value="{{ old('monthly_income',$apply->monthly_income) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password">How much sqr yards of your home/flat?<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="home_in_sqr_yards"
                                                       name="home_in_sqr_yards"
                                                       placeholder="How much sqr yards of your home/flat?"
                                                       value="{{ old('home_in_sqr_yards',$apply->home_in_sqr_yards) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password">What is source of income of your
                                                    father/guardian?<span class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="source_of_income"
                                                       name="source_of_income"
                                                       placeholder="What is source of income of your father/guardian?"
                                                       value="{{ old('source_of_income',$apply->source_of_income) }}"
                                                       readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password">Have you ever received any scholarships?<span
                                                            class="required-class">*</span></label>
                                                <input type="text" class="form-control rounded" id="any_scholarship"
                                                       name="any_scholarship"
                                                       placeholder="Have you ever received any scholarships?"
                                                       value="{{ old('any_scholarship',$apply->any_scholarship) }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your CNIC Number / Form 'B' </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->cnic_number }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Mobile Number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->mobile_number }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Your WhatsApp Number </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->whatsapp_number }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Email Address </label>
                                                <input type="text" class="form-control rounded"
                                                       value="{{ $apply->email_address }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Short & Long Term Goals and how you will pay back/serve Dalda
                                                    Foundation after completing your degree ?</label>
                                                <textarea class="form-control"
                                                          rows="2" readonly>{{ $apply->goals }}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Your Suggestions, how we together can develop Dalda Foundation
                                                    Community to serve
                                                    mankind ?</label>
                                                <textarea class="form-control"
                                                          rows="2" readonly>{{ $apply->suggestion }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>What role you will play for Dalda
                                                    Foundation Community ?</label>
                                                <textarea class="form-control"
                                                          rows="2"
                                                          readonly>{{ $apply->your_contribution }}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Are you interested in achieving international
                                                    scholarships with the help of Dalda
                                                    Foundation Trust? </label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control rounded"
                                                           value="{{ $apply->international_scolarship }}" readonly>
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
                                                           value="{{ $apply->standarized_test }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Are you ready to take English ability test such
                                                    as IELTS/TOEFL/PTE/PVT/ITEP/DUOLINGO ? </label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control rounded"
                                                           value="{{ $apply->english_ability_test }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Anything you want to share with Dalda Foundation Trust ? </label>
                                                <textarea class="form-control"
                                                          rows="2"
                                                          readonly>{{ $apply->share_any }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Student Photo </label>
                                                @if(!empty($apply->student_photo))
                                                    <div class="d-flex">
                                                        <?php /*storage/app/public/uploads*/ ?>
                                                        <img src="{{Storage::url('app/public/uploads/'.$apply->student_photo ?? '')}}"
                                                             width="100" height="100">
                                                    </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Matric Mark Sheet Photo </label>
                                        @if(!empty($apply->marksheet_photo))
                                            @if( in_array('pdf',explode('.',$apply->marksheet_photo)))
                                                <div class="alert alert-secondary" role="alert">
                                                    <a href="{{ Storage::url('app/public/uploads/'.$apply->marksheet_photo)}}"
                                                       class="alert-link">Matric Mark Sheet Photo </a>.
                                                </div>
                                            @else
                                                <div class="d-flex">
                                                    <div class="hovereffect">
                                                        <img src="{{Storage::url('app/public/uploads/'.$apply->marksheet_photo ?? '')}}">
                                                        <div class="overlay">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Beneficiary CNIC Photo </label>
                                        @if(!empty($apply->beneficary_cnic_photo))
                                            @if( in_array('pdf',explode('.',$apply->beneficary_cnic_photo)))
                                                <div class="alert alert-secondary" role="alert">
                                                    <a href="{{ Storage::url('app/public/uploads/'.$apply->beneficary_cnic_photo)}}"
                                                       class="alert-link">Beneficiary CNIC Photo </a>.
                                                </div>
                                            @else
                                                <div class="d-flex">
                                                    <div class="hovereffect">
                                                        <img src="{{Storage::url('app/public/uploads/'.$apply->beneficary_cnic_photo ?? '')}}">
                                                        <div class="overlay">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Father/Mother or Guardian CNIC Photo </label>
                                        @if(!empty($apply->parent_cnic_photo))
                                            @if( in_array('pdf',explode('.',$apply->parent_cnic_photo)))
                                                <div class="alert alert-secondary" role="alert">
                                                    <a href="{{ Storage::url('app/public/uploads/'.$apply->parent_cnic_photo)}}"
                                                       class="alert-link">Father/Mother or Guardian CNIC Photo</a>.
                                                </div>
                                            @else
                                                <div class="d-flex">
                                                    <div class="hovereffect">
                                                        <img src="{{Storage::url('app/public/uploads/'.$apply->parent_cnic_photo ?? '')}}">
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
            <!-- END: Card DATA-->
        </div>
    </main> --}}
@endsection
