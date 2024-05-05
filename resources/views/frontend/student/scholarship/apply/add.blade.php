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
                Scholarship Program
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Add Scholarship</h5>
        <form id="applyForm" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="scholarship_as_per_education">Please select a scholarship according to your education<span class="required-class">*</span></label>
                    <select class="form-control rounded allowAlphabetOnly" name="scholarship_as_per_education" required>
                        <option selected disabled value=""> -- Select -- </option>
                        <option value="Scholorship for immediate studies">Scholorship for immediate studies</option>
                        <option value="Scholorship for vocational option">Scholorship for vocational option</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select your education.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="year">Year<span class="required-class">*</span></label>
                    <select class="form-control rounded" name="year" required>
                        <option selected disabled value=""> -- Select -- </option>
                        @foreach ($years as $val)
                            <option value="{{ $val }}" {{ (int) old('year') === $val ? 'selected' : '' }}>
                                {{ $val }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a year.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="matric_board">Matric Board <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="matric_board" name="matric_board"
                        placeholder="Enter Matric Board" value="{{ old('matric_board') }}" required maxlength="100">
                    <div class="invalid-feedback">
                        Invalid matric board input.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="matriculation_year">Matriculation Year <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="matriculation_year" name="matriculation_year"
                        placeholder="Enter Matriculation Year" value="{{ old('matriculation_year') }}" required maxlength="100">
                    <div class="invalid-feedback">
                        Invalid matriculation year input.
                    </div>
                </div>
                
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="group">Matric Group <span class="required-class">*</span></label>
                    <!-- <input type="text" class="form-control" id="group" name="group" placeholder="Enter Group"
                        value="{{ old('group') }}" required maxlength="100"> -->
                    <select class="form-control rounded" name="group" required>
                        <option selected disabled value=""> -- Select -- </option>
                        <option value="Science">Science</option>
                        <option value="Arts">Arts</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="invalid-feedback">
                        Invalid group select.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="another_matric_group">Another Matric Group</label>
                    <input type="text" class="form-control rounded" id="another_matric_group"
                        name="another_matric_group" placeholder="Another Matric Group" value="{{ old('another_intermediate_group') }}">
                    <div class="invalid-feedback">
                        Please make sure your another matric group is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="marks_in_matric">Marks in Matric <span class="small">( Write in this format:
                            600/1050 ) </span><span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control rounded allowSlash marksFormat" id="marks_in_matric"
                            name="marks_in_matric" placeholder="Enter Marks in Matric"
                            value="{{ old('marks_in_matric') }}" maxlength="9" required>
                        <div class="invalid-feedback">
                            Please enter matric marks.
                        </div>

                    </div>
                    <span class="text-danger font-weight-light error"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="current_city">Your Current City Name <span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly" id="current_city"
                        name="current_city" placeholder="Enter Current City Name" value="{{ old('current_city') }}"
                        maxlength="55" required>
                    <div class="invalid-feedback">
                        Please enter a city name.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="beneficary_name">Your Beneficiary Name <span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly" id="beneficary_name"
                        name="beneficary_name" placeholder="Enter Your Beneficiary Name"
                        value="{{ old('beneficary_name') }}" maxlength="55" required>
                    <div class="invalid-feedback">
                        Please enter a city name.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="beneficary_iban_number">Your Beneficiary's 24 Digits
                        IBAN number </label>
                    <input type="text" class="form-control rounded" id="beneficary_iban_number"
                        name="beneficary_iban_number" placeholder="Enter Your Beneficiary's 24 Digits IBAN number"
                        value="{{ old('beneficary_iban_number') }}"  minlength="24" maxlength="24" required>
                    <div class="invalid-feedback">
                        Please make sure IBAN number is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="beneficary_bank">Your Beneficiary's Bank Name <span
                            class="required-class">*</span></label>
                    <input type="text" class="form-control rounded" id="beneficary_bank" name="beneficary_bank"
                        placeholder="Enter Your Beneficiary Bank Name" value="{{ old('beneficary_bank') }}"
                        maxlength="100" required>
                    <div class="invalid-feedback">
                        Please enter a beneficiary bank name.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="beneficary_cnic">Your Beneficiary's CNIC Number </label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="beneficary_cnic"
                        name="beneficary_cnic" placeholder="Enter Your Beneficiary's CNIC Number"
                        value="{{ old('beneficary_cnic') }}" minlength="13" maxlength="13"  required>
                    <div class="invalid-feedback">
                        Please make sure beneficiary CNIC number is correct.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label> If you've acheived any position of board level, please provide detail </label>
                    <input type="text" class="form-control rounded " id="position_board_detail"
                        name="position_board_detail" placeholder="Enter Position Board Details"
                        value="{{ old('position_board_detail') }}"  required>
                    <div class="invalid-feedback">
                        Please make sure position board details is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label> What do you want to be in future? </label>
                    <input type="text" class="form-control rounded" id="career_path_details"
                        name="career_path_details" placeholder="Enter Career Path Details"
                        value="{{ old('career_path_details') }}"  required>
                    <div class="invalid-feedback">
                        Please make sure career path details is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="preferred_test_location">Preferred Test Location<span class="required-class">*</span></label>
                    <select class="form-control rounded" name="preferred_test_location" required>
                        <option selected disabled value=""> -- Select -- </option>
                        Lahore
                        <option value="Sukkur">Sukkur</option>
                        <option value="Peshawar">Peshawar</option>
                        <option value="Rawalpindi">Rawalpindi</option>
                        <option value="Karachi">Karachi</option>
                        <option value="Swat">Swat</option>
                        <option value="DG Khan">DG Khan</option> 
                        <option value="Hyderabad">Hyderabad</option>
                        <option value="Multan">Multan</option>
                        <option value="Bahawalpur">Bahawalpur</option>
                        <option value="Quetta">Quetta</option>
                        <option value="Skurdu">Skurdu</option>
                        <option value="Muzaffarabad">Muzaffarabad</option>
                        <option value="Rawal Akot">Rawal Akot</option> 
                        <option value="Mirpur">Mirpur</option>
                        <option value="Loralai">Loralai</option>
                        <option value="Sargodha">Sargodha</option>
                        <option value="D.I Khan">D.I Khan</option>
                        <option value="Larkana">Larkana</option>
                        <option value="Faisalabad">Faisalabad</option>
                        <option value="Gujranwala">Gujranwala</option>
                        <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                        <option value="Abbottabad">Abbottabad</option>
                        <option value="Jhelum">Jhelum</option>
                        <option value="Gilgit">Gilgit</option>
                        <option value="Chakwal">Chakwal</option>
                        <option value="Sahiwal">Sahiwal</option>
                        <option value="Mardan">Mardan</option>
                        <option value="Gwadar">Gwadar</option>
                        <option value="Sialkot">Sialkot</option>  
                        <option value="Lahore">Lahore</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a test location.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="intermediate_studies">What subject did you choose for your intermediate studies</label>
                    <!-- <input type="text" class="form-control rounded" id="intermediate_studies"
                        name="intermediate_studies" placeholder="What subject did you choose for your intermediate studies" value="{{ old('intermediate_studies') }}"> -->
                    <select id="intermediate_studies" class="form-control rounded" name="intermediate_studies" required>
                        <option selected disabled value=""> -- Select -- </option>
                        <option value="Pre-medical">Pre-medical</option>
                        <option value="Pre-Engineering">Pre-Engineering</option>
                        <option value="General Science">General Science</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Geography">Geography</option>
                        <option value="Economics">Economics</option>
                        <option value="ICS">ICS</option>
                        <option value="Arts">Arts</option>
                        <option value="DAE (Electronics, Plumbing, Civil, Chemical, Mechanical, Other)">DAE (Electronics, Plumbing, Civil, Chemical, Mechanical, Other)</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="invalid-feedback">
                        Please make sure your intermediate studies is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="another_intermediate_group">Another Intermediate Studies</label>
                    <input type="text" class="form-control rounded" id="another_intermediate_group"
                        name="another_intermediate_group" placeholder="Another Intermediate Studies" value="{{ old('another_intermediate_group') }}">
                    <div class="invalid-feedback">
                        Please make sure your other intermediate studies is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="residential_address">Student Address</label>
                    <input type="text" class="form-control rounded" id="residential_address"
                        name="residential_address" placeholder="Student Address" value="{{ old('residential_address') }}">
                    <div class="invalid-feedback">
                        Please make sure your residential address is correct.
                    </div>
                </div>

                
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="relatives_detail">Relatives Detail</label>
                    <input type="text" class="form-control rounded" id="relatives_detail"
                        name="relatives_detail" placeholder="Relatives Details" value="{{ old('relatives_detail') }}">
                    <div class="invalid-feedback">
                        Please make sure your relatives detail is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="student_email">Student Email</label>
                    <input type="text" class="form-control rounded" id="student_email"
                        name="student_email" placeholder="Student Email" value="{{ old('student_email') }}" required>
                    <div class="invalid-feedback">
                        Please make sure student email detail is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="intermediate_board">Intermediate Board</label>
                    <input type="text" class="form-control rounded" id="intermediate_board"
                        name="intermediate_board" placeholder="Intermediate Board" value="{{ old('intermediate_board') }}" required>
                    <div class="invalid-feedback">
                        Please make sure intermediate board detail is correct.
                    </div>
                </div>
                <div class="form-group form-check col-md-6">
                    <label for="contact">Gender <span class="required-class">*</span></label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" class="custom-control-input"
                            id="male" value="male"
                            {{ old('gender') == 'male' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                            for="male">male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" class="custom-control-input"
                            id="famale" value="female"
                            {{ old('gender') == 'female' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                            for="famale">female</label>
                    </div>
                    <div class="invalid-feedback">
                        Please choose one of the option.
                    </div>
                </div>
            </div>

            <!-- <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="relatives_name">Relatives Name</label>
                    <input type="text" class="form-control rounded" id="relatives_name"
                        name="relatives_name" placeholder="Relatives Name" value="{{ old('relatives_name') }}">
                    <div class="invalid-feedback">
                        Please make sure your relatives name is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="relatives_email">Relatives Email</label>
                    <input type="text" class="form-control rounded" id="relatives_email"
                        name="relatives_email" placeholder="Relatives Email" value="{{ old('relatives_email') }}">
                    <div class="invalid-feedback">
                        Please make sure your relatives email is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="relatives_contact">Relatives Contact</label>
                    <input type="text" class="form-control rounded" id="relatives_contact"
                        name="relatives_contact" placeholder="Relatives Contact" value="{{ old('relatives_contact') }}">
                    <div class="invalid-feedback">
                        Please make sure your relatives contact is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="relatives_address">Relatives Address</label>
                    <input type="text" class="form-control rounded" id="relatives_address"
                        name="relatives_address" placeholder="Relatives Address" value="{{ old('relatives_address') }}">
                    <div class="invalid-feedback">
                        Please make sure your relatives address is correct.
                    </div>
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
                        name="madrasa_name" placeholder="Name" value="{{ old('madrasa_name') }}">
                    <div class="invalid-feedback">
                        Please make sure your name is correct.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="madrasa_address">Address</label>
                    <input type="text" class="form-control rounded" id="madrasa_address"
                        name="madrasa_address" placeholder="Address" value="{{ old('madrasa_address') }}">
                    <div class="invalid-feedback">
                        Please make sure your address is correct.
                    </div>
                </div>
            </div>

            <hr>
            <h5 class="card-title">College Information</h5>
            <hr>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name_of_college">Name Of College<span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded" id="name_of_college" name="name_of_college"
                        placeholder="Enter Name Of College" value="{{ old('name_of_college') }}" required>
                    <div class="invalid-feedback">
                        Please enter name of college.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="postal_address_of_college">Postal Address Of College<span
                            class="required-class">*</span></label>
                    <input type="text" class="form-control rounded" id="postal_address_of_college"
                        name="postal_address_of_college" placeholder="Enter Postal Address Of College"
                        value="{{ old('postal_address_of_college') }}" required>
                    <div class="invalid-feedback">
                        Please enter postal address of college.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="telephone_of_college">Telephone Number Of College<span
                            class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="telephone_of_college"
                        name="telephone_of_college" placeholder="Enter Telephone Number Of College"
                        value="{{ old('telephone_of_college') }}" minlength="11" maxlength="13" required>
                    <div class="invalid-feedback">
                        Please enter telephone number of college.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="principal_name">Principal Name<span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded" id="principal_name" name="principal_name"
                        placeholder="Enter Principal Name" value="{{ old('principal_name') }}" required>
                    <div class="invalid-feedback">
                        Please enter principal name.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="principal_number">Principal Number<span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="principal_number"
                        name="principal_number" placeholder="Enter Principal Number"
                        value="{{ old('principal_number') }}"  minlength="11" maxlength="13" required>
                    <div class="invalid-feedback">
                        Please enter principal number.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="college_email">College Email Address<span class="required-class">*</span></label>
                    <input type="email" class="form-control rounded" id="college_email" name="college_email"
                        placeholder="Enter College Email" value="{{ old('college_email') }}" required>
                    <div class="invalid-feedback" >
                        Please enter valid email address.
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="card-title">References</h5>
            <hr>

            <div class="label">
                <span class="font-weight-bold">If the above information is incorrect, the form will be declined</span>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">How many family members do you have?<span
                            class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="family_members"
                        name="family_members" placeholder="How many family members do you have?"
                        value="{{ old('family_members') }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid input.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">How much monthly income?<span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="monthly_income"
                        name="monthly_income" placeholder="How much monthly income?"
                        value="{{ old('monthly_income') }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid input.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">How much sqr yards of your home/flat?<span
                            class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="home_in_sqr_yards"
                        name="home_in_sqr_yards" placeholder="How much sqr yards of your home/flat?"
                        value="{{ old('home_in_sqr_yards') }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid input.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">What is source of income of your father/guardian?<span
                            class="required-class">*</span></label>
                    <input type="text" class="form-control rounded" id="source_of_income" name="source_of_income"
                        placeholder="What is source of income of your father/guardian?"
                        value="{{ old('source_of_income') }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid input.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Have you ever received any scholarships?<span
                            class="required-class">*</span></label>
                    <input type="text" class="form-control rounded" id="any_scholarship" name="any_scholarship"
                        placeholder="Have you ever received any scholarships?" value="{{ old('any_scholarship') }}"
                        required>
                    <div class="invalid-feedback">
                        Please enter a valid input.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cnic_number">Your CNIC Number / Form 'B' <span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="cnic_number"
                        name="cnic_number" placeholder="Enter Your CNIC Number / Form 'B'"
                        value="{{ old('cnic_number') }}" maxlength="13" minlength="13" required>
                    <div class="invalid-feedback">
                        Please enteryour CNIC no/ form 'b'.
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="mobile_number">Your Mobile Number <span class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="mobile_number"
                        name="mobile_number" placeholder="Enter Your Mobile Number"
                        value="{{ old('mobile_number') }}" minlength="11" maxlength="13"  required>
                    <div class="invalid-feedback">
                        Please enter your mobile number.
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="whatsapp_number">Your WhatsApp Number </label>
                    <input type="text" class="form-control rounded allowNumberOnly" id="whatsapp_number"
                        name="whatsapp_number" placeholder="Enter Your WhatsApp Number"
                        value="{{ old('whatsapp_number') }}" minlength="11" maxlength="13">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-check col-md-6">
                    <label for="contact">Are you interested in achieving international
                        scholarships with the help of Dalda
                        Foundation Trust ? <span class="required-class">*</span></label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="international_scolarship" class="custom-control-input"
                            id="international_scolarship_yes" value="yes"
                            {{ old('international_scolarship') == 'yes' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                            for="international_scolarship_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="international_scolarship" class="custom-control-input"
                            id="international_scolarship_no" value="no"
                            {{ old('international_scolarship') == 'no' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                            for="international_scolarship_no">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="international_scolarship" class="custom-control-input"
                            id="international_scolarship_may" value="maybe"
                            {{ old('international_scolarship') == 'maybe' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                            for="international_scolarship_may">May be</label>
                    </div>
                    <div class="invalid-feedback">
                        Please choose one of the option.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="cnic">Are you ready to take standardized tests such as
                        GRE/GMAT/LSAT ? <span class="required-class">*</span></label>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="standarized_test" id="standarized_test_yes"
                            class="custom-control-input" id="standarized_test_yes" value="yes"
                            {{ old('standarized_test') == 'yes' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                            for="standarized_test_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="standarized_test" id="standarized_test_no"
                            class="custom-control-input" id="standarized_test_no" value="no"
                            {{ old('standarized_test') == 'no' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                            for="standarized_test_no">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="standarized_test" id="standarized_test_may"
                            class="custom-control-input" id="standarized_test_may" value="maybe"
                            {{ old('standarized_test') == 'maybe' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline" for="standarized_test_may">May
                            be</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Student Photo <span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="student_photo" name="student_photo" class="form-control"
                            accept=".jpg, .jpeg, .pdf" value="{{ old('student_photo') }}" required>
                        <div class="invalid-feedback">
                            Please choose a photo.
                        </div>

                    </div>

                    <div class="student_photo_error text-dark">Supported formats are jpg, jpeg and png</div>
                </div>
                <div class="form-group col-md-6">
                    <label>Matric Mark Sheet Photo <span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="marksheet_photo" name="marksheet_photo" class="form-control"
                            accept=".jpg, .jpeg, .pdf" value="{{ old('marksheet_photo') }}" required>
                        <div class="invalid-feedback">
                            Please choose a photo.
                        </div>

                    </div>

                    <div class="marksheet_photo_error text-dark">Supported formats are jpg, jpeg and pdf</div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label>Beneficiary CNIC Photo <span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="beneficary_cnic_photo" name="beneficary_cnic_photo"
                            class="form-control" accept=".jpg, .jpeg, .pdf"
                            value="{{ old('beneficary_cnic_photo') }}" required>
                        <div class="invalid-feedback">
                            Please choose a photo.
                        </div>

                    </div>

                    <div class="beneficary_cnic_photo_error text-dark">Supported formats are jpg, jpeg and pdf</div>
                </div>
                <div class="form-group col-md-6">
                    <label>Father/Mother or Guardian CNIC Photo <span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="parent_cnic_photo" name="father_mother_or_guardian_cnic_photo"
                            class="form-control" accept=".jpg, .jpeg, .pdf"
                            value="{{ old('father_mother_or_guardian_cnic_photo') }}" required>
                        <div class="invalid-feedback">
                            Please choose a photo.
                        </div>

                    </div>

                    <div class="parent_cnic_photo_error text-dark">Supported formats are jpg, jpeg and pdf</div>
                </div>
            </div>

            <input type="button" class="btn btn-primary float-right"
            onclick="submitFormData()" value="Save"/>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        $('.allowAlphabetOnly').keydown(function (e) {
            let key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                return false;
            }
        });

        $(".allowNumberOnly").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $(".allowSlash").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 47) {
                return false;
            }
        });

        $(".marksFormat").keyup(function () {
            let pattern = new RegExp("^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$");
            if (pattern.test($(this).val()) === false) {
                $(".error").text("Please enter the text in given format for e.g: 990/1050.");
                return false;
            } else {
                $(".error").text('');
            }
        });

        function submitFormData() {
            const exts = ['jpeg', 'jpg', 'pdf', 'png','JPG','JPEG','PDF','PNG'];

            let student_photo = document.getElementById
            ('student_photo');
            let marksheet_photo = document.getElementById
            ("marksheet_photo");
            let beneficary_cnic_photo = document.getElementById
            ("beneficary_cnic_photo");
            let parent_cnic_photo = document.getElementById
            ("parent_cnic_photo");
            let marks_in_matric = $("#marks_in_matric").val();

            var errorCheck = false;

            if (student_photo.files.length != 0) {
                student_photo = student_photo.files[0].name;
                let ext_student_photo = student_photo.substr(student_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_student_photo)) {
                    $(".student_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".student_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (marksheet_photo.files.length != 0) {
                marksheet_photo = marksheet_photo.files[0].name;
                let ext_marksheet_photo = marksheet_photo.substr(marksheet_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_marksheet_photo)) {
                    $(".marksheet_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".marksheet_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (beneficary_cnic_photo.files.length != 0) {
                beneficary_cnic_photo = beneficary_cnic_photo.files[0].name;
                let ext_beneficary_cnic_photo = beneficary_cnic_photo.substr(beneficary_cnic_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_beneficary_cnic_photo)) {
                    $(".beneficary_cnic_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".beneficary_cnic_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (parent_cnic_photo.files.length != 0) {
                parent_cnic_photo = parent_cnic_photo.files[0].name;
                let ext_parent_cnic_photo = parent_cnic_photo.substr(parent_cnic_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_parent_cnic_photo)) {
                    $(".parent_cnic_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".parent_cnic_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if(marks_in_matric.length != 0) {
                const marks = marks_in_matric.split('/');
                let obtainMarks = marks[0];
                let totalMarks = marks[1];
                if(parseInt(totalMarks) < parseInt(obtainMarks))
                {
                    $(".error").text("Obtained marks should be less than total marks.");
                    $('html,body').animate({
                            scrollTop: $(".content").offset().top
                        },
                        'slow');
                    errorCheck = true;
                }
            }

            if (errorCheck === true) {
                return false;
            }

            $("input[type='button']").prop('disabled', true);
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axios({
                method: 'post',
                url: '/student/add-apply-for-scholarship',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data'}
            })
                .then(function (response) {
                    if (response) {
                        $("input[type='button']").prop('disabled', false);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href = "/student/apply-for-scholarship";
                            }
                        }).catch(error => {
                            swal({
                                title: error.response.data.msg,
                                icon: "error",
                                dangerMode: true,
                                closeOnClickOutside: false
                            });
                        });
                    }
                })
                .catch(function (error) {
                    $("input[type='button']").prop('disabled', false);
                    $(".alert-danger").remove();
                    var html = `<div class="alert alert-danger"><strong>Whoops!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                            </button><ul>`;
                    if (error.response.data.error !== undefined) {
                        html += `<li>${error.response.data.error}</li>`;
                    }
                    $.each(error.response.data.errors, function (k, v) {
                        var splitKey = k.split('.');
                        $(`input[name="data[${splitKey[1]}][${splitKey[2]}]"]`).addClass('has-error');
                        html += `<li>${v[0]}</li>`;
                    });
                    html += `</ul></div>`;
                    $('#applyForm').addClass('was-validated');
                    $(".form-errors").append(html);
                    $('html,body').animate({
                            scrollTop: $(".content").offset().top
                        },
                        'slow');
                });

        };
    </script>
@endpush
