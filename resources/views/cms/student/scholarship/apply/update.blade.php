@extends('cms.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon" style="margin: 0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.326" height="25.568"
                            viewBox="0 0 28.326 25.568">
                            <g id="education" transform="translate(-2.25 -3.233)">
                                <path  fill="#2b8540" class="cls-3" id="Path_1660" data-name="Path 1660"
                                    d="M24.061,24.057,16.98,28.041,9.9,24.057V19.849L7.875,18.725v6.516l9.1,5.121,9.1-5.121V18.724l-2.023,1.124v4.208Z"
                                    transform="translate(-0.567 -1.561)" fill="#fff" />
                                <path fill="#2b8540" class="cls-3" id="Path_1661" data-name="Path 1661"
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
            {{-- <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a id="tableToExcel" class="btn-shadow btn btn-success ml-2"
                    href="/admin/apply-for-scoloarships/pdf/{{ $apply->id }}" data-toggle="tooltip"
                    data-placement="bottom" title="" data-original-title="Export to Excel">
                    <span class="btn-icon-wrapper pr-2 opacity-7 text-white">
                        <i class="fas fa-file-excel fa-w-20"></i>
                    </span>
                    <span class="text-white"> Download PDF </span>
                </a>
            </div>
        </div> --}}
        </div>

    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Update Scholarship</h5>

            <form id="applyForm" class="needs-validation" novalidate>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 form-errors"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="scholarship_as_per_education">Please select a scholarship according to your education<span class="required-class">*</span></label>
                        <select class="form-control rounded allowAlphabetOnly" name="scholarship_as_per_education" required>
                            <option selected disabled value=""> -- Select -- </option>
                            <option <?= ($apply->scholarship_as_per_education === 'Scholorship for immediate studies') ? 'selected' : '' ?> value="Scholorship for immediate studies ">Scholorship for immediate studies</option>
                            <option <?= ($apply->scholarship_as_per_education === 'Scholorship for vocational option') ? 'selected' : '' ?> value="Scholorship for vocational option">Scholorship for vocational option</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a student name.
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    
                    <div class="col-md-6 mb-3">
                        <label for="student_name">Student Name<span class="required-class">*</span></label>
                        <input type="text" value="{{ $apply->fullname }}" disabled class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="father_name">Father Name<span class="required-class">*</span></label>
                        <input type="text" class="form-control" id="father_name" name="father_name"
                            placeholder="Father Name" value="{{ $apply->father_name }}" required>
                        <div class="invalid-feedback">
                            Please select a father name.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="year">Year<span class="required-class">*</span></label>
                        <select class="form-control rounded" name="year" required>
                            <option value="">Select</option>
                            @foreach ($years as $val)
                                <option value="{{ $val }}"
                                    {{ old('year', $apply->year) === $val ? 'selected' : '' }}>
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
                            placeholder="Enter Matric Board" value="{{ $apply->matric_board }}" maxlength="100" required>
                        <div class="invalid-feedback">
                            Invalid matric board input.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="matriculation_year">Matriculation Year <span class="required-class">*</span></label>
                        <input type="text" class="form-control" id="matriculation_year" name="matriculation_year"
                            placeholder="Enter Matriculation Year" value="{{ $apply->matriculation_year }}" required maxlength="100">
                        <div class="invalid-feedback">
                            Invalid matriculation year input.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="group">Matric Group <span class="required-class">*</span></label>
                        <input type="text" class="form-control" id="group" name="group" placeholder="Enter Group"
                            value="{{ $apply->group }}" maxlength="100"required>
                        <div class="invalid-feedback">
                            Invalid group input.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="marks_in_matric">Marks in Matric <span class="small">( Write in this format:
                                600/1050 ) </span><span class="required-class">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control rounded allowSlash marksFormat" id="marks_in_matric"
                                name="marks_in_matric" placeholder="Enter Marks in Matric"
                                value="{{ $apply->marks_in_matric }}" maxlength="9"required>
                            <div class="invalid-feedback">
                                Please enter matric marks.
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="current_city">Your Current City Name <span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowAlphabetOnly" id="current_city"
                            name="current_city" placeholder="Enter Current City Name" value="{{ $apply->current_city }}"
                            maxlength="55" required>
                        <div class="invalid-feedback">
                            Please enter a city name.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="beneficary_name">Your Beneficiary Name <span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowAlphabetOnly" id="beneficary_name"
                            name="beneficary_name" placeholder="Enter Your Beneficiary Name"
                            value="{{ $apply->beneficary_name }}" maxlength="55" required>
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
                            value="{{ $apply->beneficary_iban_number }}" minlength="24" maxlength="24"required>
                        <div class="invalid-feedback">
                            Please make sure IBAN number is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="beneficary_bank">Your Beneficiary's Bank Name <span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="beneficary_bank" name="beneficary_bank"
                            placeholder="Enter Your Beneficiary Bank Name" value="{{ $apply->beneficary_bank }}"
                            maxlength="100"required>
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
                            value="{{ $apply->beneficary_cnic }}" minlength="13" maxlength="13" required>
                        <div class="invalid-feedback">
                            Please make sure beneficiary CNIC number is correct.
                        </div>
                    </div>
                    <!-- <div class="col-md-6 mb-3">
                        <label for="beneficary_bank_address">Your Beneficiary's Bank Address <span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="beneficary_bank_address"
                            name="beneficary_bank_address" placeholder="Enter Your Beneficiary's CNIC Number"
                            value="{{ $apply->beneficary_bank_address }}"   required>
                        <div class="invalid-feedback">
                            Please enter a bank address.
                        </div>
                    </div> -->
                </div>



                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label> If you've acheived any position of board level, please provide detail </label>
                        <input type="text" class="form-control rounded " id="position_board_detail"
                            name="position_board_detail" placeholder="Enter Position Board Details"
                            value="{{ $apply->position_board_detail }}"  required>
                        <div class="invalid-feedback">
                            Please make sure position board details is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label> What do you want to be in future? </label>
                        <input type="text" class="form-control rounded" id="career_path_details"
                            name="career_path_details" placeholder="Enter Career Path Details"
                            value="{{ $apply->career_path_details }}"  required>
                        <div class="invalid-feedback">
                            Please make sure career path details is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="preferred_test_location">Preferred Test Location<span class="required-class">*</span></label>
                        <select class="form-control rounded" name="preferred_test_location" required>
                            <option disabled value=""> -- Select -- </option>
                            <option <?= ($apply->preferred_test_location === 'Sukkur') ? 'selected' : '' ?> value="Sukkur">Sukkur</option>
                            <option <?= ($apply->preferred_test_location === 'Peshawar') ? 'selected' : '' ?> value="Peshawar">Peshawar</option>
                            <option <?= ($apply->preferred_test_location === 'Rawalpindi') ? 'selected' : '' ?> value="Rawalpindi">Rawalpindi</option>
                            <option <?= ($apply->preferred_test_location === 'Karachi') ? 'selected' : '' ?> value="Karachi">Karachi</option>
                            <option <?= ($apply->preferred_test_location === 'Swat') ? 'selected' : '' ?> value="Swat">Swat</option>
                            <option <?= ($apply->preferred_test_location === 'DG Khan') ? 'selected' : '' ?> value="DG Khan">DG Khan</option> 
                            <option <?= ($apply->preferred_test_location === 'Hyderabad') ? 'selected' : '' ?> value="Hyderabad">Hyderabad</option>
                            <option <?= ($apply->preferred_test_location === 'Multan') ? 'selected' : '' ?> value="Multan">Multan</option>
                            <option <?= ($apply->preferred_test_location === 'Bahawalpur') ? 'selected' : '' ?> value="Bahawalpur">Bahawalpur</option>
                            <option <?= ($apply->preferred_test_location === 'Quetta') ? 'selected' : '' ?> value="Quetta">Quetta</option>
                            <option <?= ($apply->preferred_test_location === 'Skurdu') ? 'selected' : '' ?> value="Skurdu">Skurdu</option>
                            <option <?= ($apply->preferred_test_location === 'Muzaffarabad') ? 'selected' : '' ?> value="Muzaffarabad">Muzaffarabad</option>
                            <option <?= ($apply->preferred_test_location === 'Rawal Akot') ? 'selected' : '' ?> value="Rawal Akot">Rawal Akot</option> 
                            <option <?= ($apply->preferred_test_location === 'Mirpur') ? 'selected' : '' ?> value="Mirpur">Mirpur</option>
                            <option <?= ($apply->preferred_test_location === 'Loralai') ? 'selected' : '' ?> value="Loralai">Loralai</option>
                            <option <?= ($apply->preferred_test_location === 'Sargodha') ? 'selected' : '' ?> value="Sargodha">Sargodha</option>
                            <option <?= ($apply->preferred_test_location === 'D.I Khan') ? 'selected' : '' ?> value="D.I Khan">D.I Khan</option>
                            <option <?= ($apply->preferred_test_location === 'Larkana') ? 'selected' : '' ?> value="Larkana">Larkana</option>
                            <option <?= ($apply->preferred_test_location === 'Faisalabad') ? 'selected' : '' ?> value="Faisalabad">Faisalabad</option>
                            <option <?= ($apply->preferred_test_location === 'Gujranwala') ? 'selected' : '' ?> value="Gujranwala">Gujranwala</option>
                            <option <?= ($apply->preferred_test_location === 'Rahim Yar Khan') ? 'selected' : '' ?> value="Rahim Yar Khan">Rahim Yar Khan</option>
                            <option <?= ($apply->preferred_test_location === 'Abbottabad') ? 'selected' : '' ?> value="Abbottabad">Abbottabad</option>
                            <option <?= ($apply->preferred_test_location === 'Jhelum') ? 'selected' : '' ?> value="Jhelum">Jhelum</option>
                            <option <?= ($apply->preferred_test_location === 'Gilgit') ? 'selected' : '' ?> value="Gilgit">Gilgit</option>
                            <option <?= ($apply->preferred_test_location === 'Chakwal') ? 'selected' : '' ?> value="Chakwal">Chakwal</option>
                            <option <?= ($apply->preferred_test_location === 'Sahiwal') ? 'selected' : '' ?> value="Sahiwal">Sahiwal</option>
                            <option <?= ($apply->preferred_test_location === 'Mardan') ? 'selected' : '' ?> value="Mardan">Mardan</option>
                            <option <?= ($apply->preferred_test_location === 'Gwadar') ? 'selected' : '' ?> value="Gwadar">Gwadar</option>
                            <option <?= ($apply->preferred_test_location === 'Sialkot') ? 'selected' : '' ?> value="Sialkot">Sialkot</option>  
                            <option <?= ($apply->preferred_test_location === 'Lahore') ? 'selected' : '' ?> value="Lahore">Lahore</option>  
                        </select>
                        <div class="invalid-feedback">
                            Please select a test location.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="intermediate_studies">What subject did you choose for your intermediate studies</label>
                        <!-- <input type="text" class="form-control rounded" id="intermediate_studies"
                            name="intermediate_studies" placeholder="What subject did you choose for your intermediate studies" value="{{ $apply->intermediate_studies }}"> -->
                        <select id="intermediate_studies" class="form-control rounded" name="group" required>
                            <option selected disabled value=""> -- Select -- </option>
                            <option value="Pre-medical" <?= ($apply->intermediate_studies === 'Pre-medical') ? 'selected' : '' ?>>Pre-medical</option>
                            <option value="Pre-Engineering" <?= ($apply->intermediate_studies === 'Pre-Engineering') ? 'selected' : '' ?>>Pre-Engineering</option>
                            <option value="General Science" <?= ($apply->intermediate_studies === 'General Science') ? 'selected' : '' ?>>General Science</option>
                            <option value="Commerce" <?= ($apply->intermediate_studies === 'Commerce') ? 'selected' : '' ?>>Commerce</option>
                            <option value="Geography" <?= ($apply->intermediate_studies === 'Geography') ? 'selected' : '' ?>>Geography</option>
                            <option value="Economics" <?= ($apply->intermediate_studies === 'Economics') ? 'selected' : '' ?>>Economics</option>
                            <option value="ICS" <?= ($apply->intermediate_studies === 'ICS') ? 'selected' : '' ?>>ICS</option>
                            <option value="Arts" <?= ($apply->intermediate_studies === 'Arts') ? 'selected' : '' ?>>Arts</option>
                            <option value="DAE (Electronics, Plumbing, Civil, Chemical, Mechanical, Other)" <?= ($apply->intermediate_studies === 'DAE (Electronics, Plumbing, Civil, Chemical, Mechanical, Other)') ? 'selected' : '' ?>>DAE (Electronics, Plumbing, Civil, Chemical, Mechanical, Other)</option>
                            <option value="Other" <?= ($apply->intermediate_studies === 'Other') ? 'selected' : '' ?>>Other</option>
                        </select>
                        <div class="invalid-feedback">
                            Please make sure your intermediate studies is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="residential_address">Student Address</label>
                        <input type="text" class="form-control rounded" id="residential_address"
                            name="residential_address" placeholder="Student Address" value="{{ $apply->residential_address }}">
                        <div class="invalid-feedback">
                            Please make sure your residential address is correct.
                        </div>
                    </div>

                    
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="relatives_detail">Relatives Detail</label>
                        <input type="text" class="form-control rounded" id="relatives_detail"
                            name="relatives_detail" placeholder="Relatives Details" value="{{ $apply->relatives_detail }}">
                        <div class="invalid-feedback">
                            Please make sure your relatives detail is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="student_email">Student Email</label>
                        <input type="text" class="form-control rounded" id="student_email"
                            name="student_email" placeholder="Student Email" value="{{ $apply->student_email }}">
                        <div class="invalid-feedback">
                            Please make sure student email detail is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="intermediate_board">Intermediate Board</label>
                        <input type="text" class="form-control rounded" id="intermediate_board"
                            name="intermediate_board" placeholder="Intermediate Board" value="{{ $apply->intermediate_board }}">
                        <div class="invalid-feedback">
                            Please make sure intermediate board detail is correct.
                        </div>
                    </div>
                    <div class="form-group form-check col-md-6">
                        <label for="contact">Gender <span class="required-class">*</span></label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="gender" class="custom-control-input"
                                id="male" value="male"
                                {{ $apply->gender == 'male' ? 'checked' : '' }} required>
                            <label class="custom-control-label checkbox-primary outline"
                                for="male">male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="gender" class="custom-control-input"
                                id="famale" value="female"
                                {{ $apply->gender == 'female' ? 'checked' : '' }} required>
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
                            name="relatives_name" placeholder="Relatives Name" value="{{ $apply->relatives_name }}">
                        <div class="invalid-feedback">
                            Please make sure your relatives name is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="relatives_email">Relatives Email</label>
                        <input type="text" class="form-control rounded" id="relatives_email"
                            name="relatives_email" placeholder="Relatives Email" value="{{ $apply->relatives_email }}">
                        <div class="invalid-feedback">
                            Please make sure your relatives email is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="relatives_contact">Relatives Contact</label>
                        <input type="text" class="form-control rounded" id="relatives_contact"
                            name="relatives_contact" placeholder="Relatives Contact" value="{{ $apply->relatives_contact }}">
                        <div class="invalid-feedback">
                            Please make sure your relatives contact is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="relatives_address">Relatives Address</label>
                        <input type="text" class="form-control rounded" id="relatives_address"
                            name="relatives_address" placeholder="Relatives Address" value="{{ $apply->relatives_address }}">
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
                            name="madrasa_name" placeholder="Name" value="{{ $apply->madrasa_name }}">
                        <div class="invalid-feedback">
                            Please make sure your name is correct.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="madrasa_address">Address</label>
                        <input type="text" class="form-control rounded" id="madrasa_address"
                            name="madrasa_address" placeholder="Address" value="{{ $apply->madrasa_address }}">
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
                            placeholder="Enter Name Of College" value="{{ $apply->name_of_college }}" required>
                        <div class="invalid-feedback">
                            Please enter name of college.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="postal_address_of_college">Postal Address Of College<span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="postal_address_of_college"
                            name="postal_address_of_college" placeholder="Enter Postal Address Of College"
                            value="{{ $apply->postal_address_of_college }}" required>
                        <div class="invalid-feedback">
                            Please enter postal address of college.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone_of_college">Telephone Number Of College<span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly " id="telephone_of_college"
                            name="telephone_of_college" placeholder="Enter Telephone Number Of College"
                            value="{{ $apply->telephone_of_college }}" minlength="11" maxlength="13" required>
                        <div class="invalid-feedback">
                            Please enter telephone number of college.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="principal_name">Principal Name<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="principal_name" name="principal_name"
                            placeholder="Enter Principal Name" value="{{ $apply->principal_name }}" required>
                        <div class="invalid-feedback">
                            Please enter principal name.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="principal_number">Principal Number<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="principal_number" name="principal_number"
                            placeholder="Enter Principal Number" value="{{ $apply->principal_number }}" required minlength="11" maxlength="13">
                        <div class="invalid-feedback">
                            Please enter principal number.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="college_email">College Email Address<span class="required-class">*</span></label>
                        <input type="email" class="form-control rounded" id="college_email" name="college_email"
                            placeholder="Enter College Email" value="{{ $apply->college_email }}" required>
                        <div class="invalid-feedback">
                            Please enter college email address.
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="card-title">References</h5>
                <hr>
                <!-- <div class="label">
                    <span class="font-weight-bold">Please give your teacher or neighbor reference which are not your
                        relatives </span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="password">Name<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="teacher_name1" name="teacher_name1"
                            placeholder="Enter Name" value="{{ $apply->teacher_name1 }}"required>
                        <div class="invalid-feedback">
                            Please enter a name.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Cell No<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="teach_cell_no1" name="teach_cell_no1"
                            placeholder="Enter Cell No" value="{{ $apply->teach_cell_no1 }}" minlength="11" maxlength="13" required>
                        <div class="invalid-feedback">
                            Please enter a cell no.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Address<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="teacher_address1" name="teacher_address1"
                            placeholder="Enter Address" value="{{ $apply->teacher_address1 }}"required>
                        <div class="invalid-feedback">
                            Please enter a address.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Name<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="teacher_name2" name="teacher_name2"
                            placeholder="Enter Name" value="{{ $apply->teacher_name2 }}"required>
                        <div class="invalid-feedback">
                            Please enter a name.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Cell No<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="teach_cell_no2" name="teach_cell_no2"
                            placeholder="Enter Cell No" value="{{ $apply->teach_cell_no2 }}"required minlength="11" maxlength="13">
                        <div class="invalid-feedback">
                            Please enter a cell no.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Address<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="teacher_address2" name="teacher_address2"
                            placeholder="Enter Address" value="{{ $apply->teacher_address2 }}"required>
                        <div class="invalid-feedback">
                            Please enter a address.
                        </div>
                    </div>
                </div> -->
                <div class="label">
                    <span class="font-weight-bold">If the above information is incorrect, the form will be declined</span>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">How many family members do you have?<span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="family_members" name="family_members"
                            placeholder="How many family members do you have?" value="{{ $apply->family_members }}"required>
                        <div class="invalid-feedback">
                            Please enter a valid input.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">How much monthly income?<span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="monthly_income" name="monthly_income"
                            placeholder="How much monthly income?" value="{{ $apply->monthly_income }}"required>
                        <div class="invalid-feedback">
                            Please enter a valid input.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">How much sqr yards of your home/flat?<span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="home_in_sqr_yards"
                            name="home_in_sqr_yards" placeholder="How much sqr yards of your home/flat?"
                            value="{{ $apply->home_in_sqr_yards }}"required>
                        <div class="invalid-feedback">
                            Please enter a valid input.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">What is source of income of your father/guardian?<span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="source_of_income" name="source_of_income"
                            placeholder="What is source of income of your father/guardian?"
                            value="{{ $apply->source_of_income }}"required>
                        <div class="invalid-feedback">
                            Please enter a valid input.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Have you ever received any scholarships?<span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control rounded" id="any_scholarship" name="any_scholarship"
                            placeholder="Have you ever received any scholarships?" value="{{ $apply->any_scholarship }}"required>
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
                            value="{{ $apply->cnic_number }}" minlength="13" maxlength="13" required>
                        <div class="invalid-feedback">
                            Please enteryour CNIC no/ form 'b'.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile_number">Your Mobile Number <span class="required-class">*</span></label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="mobile_number"
                            name="mobile_number" placeholder="Enter Your Mobile Number"
                            value="{{ $apply->mobile_number }}" minlength="11" maxlength="13"required>
                        <div class="invalid-feedback">
                            Please enter your mobile number.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="whatsapp_number">Your WhatsApp Number </label>
                        <input type="text" class="form-control rounded allowNumberOnly" id="whatsapp_number"
                            name="whatsapp_number" placeholder="Enter Your WhatsApp Number"
                            value="{{ $apply->whatsapp_number }}" minlength="11" maxlength="13"required>
                    </div>
                </div>
                <!-- <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="goals">Short & Long Term Goals and how you will pay back/serve Dalda
                            Foundation after completing your degree ? <span class="required-class">*</span></label>
                        <textarea name="goals" class="form-control" placeholder="Enter Short & Long Term Goals" rows="2"
                            maxlength="250" required>{{ $apply->goals }}</textarea>
                        <div class="invalid-feedback">
                            Please enter valid input.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="suggestion">Your Suggestions, how we together can develop Dalda Foundation Community to
                            serve
                            mankind ? <span class="required-class">*</span></label>
                        <textarea name="suggestion" class="form-control" placeholder="Enter Your Suggestions" rows="2"
                            maxlength="250" required>{{ $apply->suggestion }}</textarea>
                        <div class="invalid-feedback">
                            Please enter valid input.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="your_contribution">What role you will play for Dalda
                            Foundation Community ? <span class="required-class">*</span></label>
                        <textarea name="your_contribution" class="form-control" placeholder="Enter Your Role For Dalda Foundation"
                            rows="2" maxlength="250" required>{{ $apply->your_contribution }}</textarea>
                        <div class="invalid-feedback">
                            Please enter valid input.
                        </div>
                    </div>
                </div> -->
                <div class="form-row">
                    <div class="form-group form-check col-md-6">
                        <label for="contact">Are you interested in achieving international
                            scholarships with the help of Dalda
                            Foundation Trust ? <span class="required-class">*</span></label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="international_scolarship" class="custom-control-input"
                                id="international_scolarship_yes" value="yes"
                                {{ $apply->international_scolarship == 'yes' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="international_scolarship_yes">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="international_scolarship" class="custom-control-input"
                                id="international_scolarship_no" value="no"
                                {{ $apply->international_scolarship == 'no' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="international_scolarship_no">No</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="international_scolarship" class="custom-control-input"
                                id="international_scolarship_may" value="maybe"
                                {{ $apply->international_scolarship == 'maybe' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="international_scolarship_may">May be</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cnic">Are you ready to take standardized tests such as
                            GRE/GMAT/LSAT ? <span class="required-class">*</span></label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="standarized_test" id="standarized_test_yes"
                                class="custom-control-input" id="standarized_test_yes" value="yes"
                                {{ $apply->standarized_test == 'yes' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="standarized_test_yes">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="standarized_test" id="standarized_test_no"
                                class="custom-control-input" id="standarized_test_no" value="no"
                                {{ $apply->standarized_test == 'no' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="standarized_test_no">No</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="standarized_test" id="standarized_test_may"
                                class="custom-control-input" id="standarized_test_may" value="maybe"
                                {{ $apply->standarized_test == 'maybe' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline" for="standarized_test_may">May
                                be</label>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="contact">Are you ready to take English ability test such
                            as IELTS/TOEFL/PTE/PVT/ITEP/DUOLINGO ? <span class="required-class">*</span></label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="english_ability_test" class="custom-control-input"
                                id="english_ability_test_yes" value="yes"
                                {{ $apply->english_ability_test == 'yes' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="english_ability_test_yes">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="english_ability_test" class="custom-control-input"
                                id="english_ability_test_no" value="no"
                                {{ $apply->english_ability_test == 'no' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="english_ability_test_no">No</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="english_ability_test" class="custom-control-input"
                                id="english_ability_test_may" value="maybe"
                                {{ $apply->english_ability_test == 'maybe' ? 'checked' : '' }}>
                            <label class="custom-control-label checkbox-primary outline"
                                for="english_ability_test_may">May
                                be</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="share_any">Anything you want to share with Dalda
                            Foundation Trust ?</label>
                        <textarea name="share_any" class="form-control" placeholder="Enter Your Suggestions" rows="2"
                            maxlength="250">{{ $apply->share_any }}</textarea>

                    </div>
                </div> -->
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Student Photo <span class="required-class">*</span></label>
                        @if (!empty($apply->student_photo) && Storage::disk('public')->exists('uploads/' . $apply->student_photo))
                            <div class="d-flex">
                                <div class="hovereffect">
                                    <a href="{{ Storage::url('uploads/' . $apply->student_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                        <img src="{{ Storage::url('uploads/' . $apply->student_photo ?? '') }}" class="img-fluid rounded" height="200" width="350">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <input type="file" id="student_photo" name="student_photo" class="form-control"
                            accept=".jpg, .jpeg, .png" value="{{ old('student_photo', $apply->student_photo) }}">
                        <div class="student_photo_error text-dark">Supported formats are
                            jpg, jpeg and png
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Matric Mark Sheet Photo <span class="required-class">*</span></label>
                        @if (!empty($apply->marksheet_photo) && Storage::disk('public')->exists('uploads/' . $apply->marksheet_photo))
                            @if (in_array('pdf', explode('.', $apply->marksheet_photo)))
                                <div class="custom-file-alert custom-file-alert-secondary alert-dismissible"
                                    role="alert">
                                    <a href="{{ Storage::url('uploads/' . $apply->marksheet_photo) }}" target="_blank">
                                        Matric Mark Sheet </a>
                                </div>
                            @else
                            <div class="input-group">
                                <a href="{{ Storage::url('uploads/' . $apply->marksheet_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ Storage::url('uploads/' . $apply->marksheet_photo ?? '') }}" class="img-fluid rounded">
                                </a>
                            </div>
                            @endif
                        @endif
                        <input type="file" id="marksheet_photo" name="marksheet_photo" class="form-control"
                            accept=".jpg, .jpeg, .pdf" value="{{ old('marksheet_photo', $apply->marksheet_photo) }}">
                        <div class="marksheet_photo_error text-dark">Supported formats are
                            jpg, jpeg and pdf
                        </div>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label>Beneficiary CNIC Photo <span class="required-class">*</span></label>
                        @if (!empty($apply->beneficary_cnic_photo) && Storage::disk('public')->exists('uploads/' . $apply->beneficary_cnic_photo))
                            @if (in_array('pdf', explode('.', $apply->beneficary_cnic_photo)))
                                <div class="custom-file-alert custom-file-alert-secondary alert-dismissible"
                                    role="alert">
                                    <a href="{{ Storage::url('uploads/' . $apply->beneficary_cnic_photo) }}"
                                        target="_blank">
                                        Beneficiary CNIC </a>
                                </div>
                            @else
                            <div class="input-group">
                                <a href="{{ Storage::url('uploads/' . $apply->beneficary_cnic_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ Storage::url('uploads/' . $apply->beneficary_cnic_photo ?? '') }}" class="img-fluid rounded">
                                </a>
                            </div>
                            @endif
                        @endif
                        <input type="file" id="beneficary_cnic_photo" name="beneficary_cnic_photo"
                            class="form-control" accept=".jpg, .jpeg, .pdf"
                            value="{{ old('beneficary_cnic_photo', $apply->beneficary_cnic_photo) }}">
                        <div class="beneficary_cnic_photo_error text-dark">Supported formats
                            are jpg, jpeg and pdf
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Father/Mother or Guardian CNIC Photo <span class="required-class">*</span></label>
                        @if (!empty($apply->parent_cnic_photo) && Storage::disk('public')->exists('uploads/' . $apply->parent_cnic_photo))
                            @if (in_array('pdf', explode('.', $apply->parent_cnic_photo)))
                                <div class="custom-file-alert custom-file-alert-secondary alert-dismissible"
                                    role="alert">
                                    <a href="{{ Storage::url('uploads/' . $apply->parent_cnic_photo) }}" target="_blank">
                                        Father/Mother or Guardian CNIC </a>
                                </div>
                            @else
                            <div class="input-group">
                                <a href="{{ Storage::url('uploads/' . $apply->parent_cnic_photo ?? '') }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ Storage::url('uploads/' . $apply->parent_cnic_photo ?? '') }}" class="img-fluid rounded">
                                </a>
                            </div>
                            @endif
                        @endif
                        <input type="file" id="parent_cnic_photo" name="father_mother_or_guardian_cnic_photo"
                            class="form-control" accept=".jpg, .jpeg, .pdf"
                            value="{{ old('father_mother_or_guardian_cnic_photo', $apply->parent_cnic_photo) }}">
                        <div class="parent_cnic_photo_error text-dark">Supported formats are
                            jpg, jpeg and pdf
                        </div>
                    </div>
                </div>
                <input type="button" class="btn btn-primary float-right" onclick="submitFormData()" value="Save" />
            </form>
        </div>
    </div>
    {{-- <main class="content">
        <div class="container-fluid site-width">
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Update Scholarship</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/apply-for-scoloarships" class="btn btn-primary float-right">←
                                        Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12">
                                        <form id="applyForm">
                                            <div class="row">
                                                <div class="col-md-12 form-errors"></div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="year">Year <span
                                                                class="required-class">*</span></label>
                                                    <select class="form-control rounded" name="year">
                                                        <option value="">Select</option>
                                                        @foreach ($years as $val)
                                                            <option value="{{$val}}" {{old('year',$apply->year) === $val ? "selected" : ""}}>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="fullname">Student Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           value="{{$apply->fullname}}" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="matric_board">Matric Board <span
                                                                class="required-class">*</span></label>
                                                    <input type="matric_board" class="form-control rounded"
                                                           id="matric_board"
                                                           name="matric_board" placeholder="Enter Matric Board"
                                                           value="{{ old('matric_board',$apply->matric_board) }}"
                                                           maxlength="100">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="group">Matric Group <span
                                                                class="required-class">*</span></label>
                                                    <!-- <input type="text" class="form-control rounded"
                                                           id="group"
                                                           name="group" placeholder="Enter Group"
                                                           value="{{ old('group',$apply->group) }}" maxlength="100"> -->
                                                        <select class="form-control rounded" name="group" required>
                                                            <option selected disabled value=""> -- Select -- </option>
                                                            <option value="Science" <?= $apply->group === 'Science' ? 'selected' : '' ?>>Science</option>
                                                            <option value="Arts" <?= $apply->group === 'Arts' ? 'selected' : '' ?>>Arts</option>
                                                            <option value="Other" <?= $apply->group === 'Other' ? 'selected' : '' ?>>Other</option>
                                                        </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_matric">Marks in Matric ( Write in this format:
                                                        600/1050 ) <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowSlash marksFormat"
                                                           id="marks_in_matric" name="marks_in_matric"
                                                           placeholder="Enter Marks in Matric"
                                                           value="{{ old('marks_in_matric',$apply->marks_in_matric) }}"
                                                           maxlength="9">
                                                    <span class="text-danger font-weight-light error"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="current_city">Your Current City Name <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowAlphabetOnly"
                                                           id="current_city" name="current_city"
                                                           placeholder="Enter Current City Name"
                                                           value="{{ old('current_city',$apply->current_city) }}"
                                                           maxlength="55">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_name">Your Beneficiary Name <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowAlphabetOnly"
                                                           id="beneficary_name" name="beneficary_name"
                                                           placeholder="Enter Your Beneficiary Name"
                                                           value="{{ old('beneficary_name',$apply->beneficary_name) }}"
                                                           maxlength="55">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_iban_number">Your Beneficiary's 24 Digits
                                                        IBAN number <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           id="beneficary_iban_number" name="beneficary_iban_number"
                                                           placeholder="Enter Your Beneficiary's 24 Digits IBAN number"
                                                           value="{{ old('beneficary_iban_number',$apply->beneficary_iban_number) }}"
                                                           maxlength="34">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_bank">Your Beneficiary's Bank Name <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           id="beneficary_bank" name="beneficary_bank"
                                                           placeholder="Enter Your Beneficiary Bank Name"
                                                           value="{{ old('beneficary_bank',$apply->beneficary_bank) }}"
                                                           maxlength="55">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_cnic">Your Beneficiary's CNIC Number <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="beneficary_cnic" name="beneficary_cnic"
                                                           placeholder="Enter Your Beneficiary's CNIC Number"
                                                           value="{{ old('beneficary_cnic',$apply->beneficary_cnic) }}"
                                                           maxlength="14">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_bank_address">Your Beneficiary's Bank Address <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           id="beneficary_bank_address" name="beneficary_bank_address"
                                                           placeholder="Enter Your Beneficiary's CNIC Number"
                                                           value="{{ old('beneficary_bank_address',$apply->beneficary_bank_address) }}">
                                                </div>
                                            </div>

                                            <h4>College Information</h4>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name_of_college">Name Of College<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="name_of_college"
                                                           name="name_of_college" placeholder="Enter Name Of College"
                                                           value="{{ old('name_of_college',$apply->name_of_college) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="postal_address_of_college">Postal Address Of College<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="postal_address_of_college"
                                                           name="postal_address_of_college" placeholder="Enter Postal Address Of College"
                                                           value="{{ old('postal_address_of_college',$apply->postal_address_of_college) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="telephone_of_college">Telephone Number Of College<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="telephone_of_college"
                                                           name="telephone_of_college" placeholder="Enter Telephone Number Of College"
                                                           value="{{ old('telephone_of_college',$apply->telephone_of_college) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="principal_name">Principal Name<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="principal_name"
                                                           name="principal_name" placeholder="Enter Principal Name"
                                                           value="{{ old('principal_name',$apply->principal_name) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="principal_number">Principal Number<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="principal_number"
                                                           name="principal_number" placeholder="Enter Principal Number"
                                                           value="{{ old('principal_number',$apply->principal_number) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="college_email">College Email Address<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="college_email"
                                                           name="college_email" placeholder="Enter College Email"
                                                           value="{{ old('college_email',$apply->college_email) }}">
                                                </div>
                                            </div>

                                            <h4>References</h4>

                                            <div class="label">
                                                <span class="font-weight-bold">Please give your teacher or neighbor reference which are not your relatives </span>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="password">Name<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="teacher_name1"
                                                           name="teacher_name1" placeholder="Enter Name"
                                                           value="{{ old('teacher_name1',$apply->teacher_name1) }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="password">Cell No<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="teach_cell_no1"
                                                           name="teach_cell_no1" placeholder="Enter Cell No"
                                                           value="{{ old('teach_cell_no1',$apply->teach_cell_no1) }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="password">Address<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="teacher_address1"
                                                           name="teacher_address1" placeholder="Enter Address"
                                                           value="{{ old('teacher_address1',$apply->teacher_address1) }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="password">Name<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="teacher_name2"
                                                           name="teacher_name2" placeholder="Enter Name"
                                                           value="{{ old('teacher_name2',$apply->teacher_name2) }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="password">Cell No<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="teach_cell_no2"
                                                           name="teach_cell_no2" placeholder="Enter Cell No"
                                                           value="{{ old('teach_cell_no2',$apply->teach_cell_no2) }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="password">Address<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="teacher_address2"
                                                           name="teacher_address2" placeholder="Enter Address"
                                                           value="{{ old('teacher_address2',$apply->teacher_address2) }}">
                                                </div>
                                            </div>

                                            <div class="label">
                                                <span class="font-weight-bold">If the above information is incorrect from the form will be declined</span>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="password">How many family members do you have?<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="family_members"
                                                           name="family_members" placeholder="How many family members do you have?"
                                                           value="{{ old('family_members',$apply->family_members) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">How much monthly income?<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="monthly_income"
                                                           name="monthly_income" placeholder="How much monthly income?"
                                                           value="{{ old('monthly_income',$apply->monthly_income) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">How much sqr yards of your home/flat?<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="home_in_sqr_yards"
                                                           name="home_in_sqr_yards" placeholder="How much sqr yards of your home/flat?"
                                                           value="{{ old('home_in_sqr_yards',$apply->home_in_sqr_yards) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">What is source of income of your father/guardian?<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="source_of_income"
                                                           name="source_of_income" placeholder="What is source of income of your father/guardian?"
                                                           value="{{ old('source_of_income',$apply->source_of_income) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">Have you ever received any scholarships?<span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="any_scholarship"
                                                           name="any_scholarship" placeholder="Have you ever received any scholarships?"
                                                           value="{{ old('any_scholarship',$apply->any_scholarship) }}">
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="cnic_number">Your CNIC Number / Form 'B' <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="cnic_number" name="cnic_number"
                                                           placeholder="Enter Your CNIC Number / Form 'B'"
                                                           value="{{ old('cnic_number',$apply->cnic_number) }}"
                                                           maxlength="14">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="mobile_number">Your Mobile Number <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="mobile_number" name="mobile_number"
                                                           placeholder="Enter Your Mobile Number"
                                                           value="{{ old('mobile_number',$apply->mobile_number) }}"
                                                           maxlength="13">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="whatsapp_number">Your WhatsApp Number </label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="whatsapp_number" name="whatsapp_number"
                                                           placeholder="Enter Your WhatsApp Number"
                                                           value="{{ old('whatsapp_number',$apply->whatsapp_number) }}"
                                                           maxlength="13">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="goals">Short & Long Term Goals and how you will pay back/serve Dalda
                                                        Foundation after completing your degree ? <span class="required-class">*</span></label>
                                                    <textarea name="goals" class="form-control"
                                                              placeholder="Enter Short & Long Term Goals"
                                                              rows="2"
                                                              maxlength="250">{{ old('goals',$apply->goals) }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="suggestion">Your Suggestions, how we together can develop Dalda Foundation Community to serve
                                                        mankind ? <span class="required-class">*</span></label>
                                                    <textarea name="suggestion" class="form-control"
                                                              placeholder="Enter Your Suggestions"
                                                              rows="2"
                                                              maxlength="250">{{ old('suggestion',$apply->suggestion) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="your_contribution">What role you will play for Dalda
                                                        Foundation Community ? <span class="required-class">*</span></label>
                                                    <textarea name="your_contribution" class="form-control"
                                                              placeholder="Enter Your Role For Dalda Foundation"
                                                              rows="2"
                                                              maxlength="250">{{ old('your_contribution',$apply->your_contribution) }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="contact">Are you interested in achieving international
                                                        scholarships with the help of Dalda
                                                        Foundation Trust? <span
                                                                class="required-class">*</span></label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="international_scolarship"
                                                               class="custom-control-input"
                                                               id="international_scolarship_yes"
                                                               value="yes" {{ old("international_scolarship",$apply->international_scolarship) == 'yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="international_scolarship_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="international_scolarship"
                                                               class="custom-control-input"
                                                               id="international_scolarship_no"
                                                               value="no" {{ old("international_scolarship",$apply->international_scolarship) == 'no' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="international_scolarship_no">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="international_scolarship"
                                                               class="custom-control-input"
                                                               id="international_scolarship_may"
                                                               value="maybe" {{ old("international_scolarship",$apply->international_scolarship) == 'maybe' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="international_scolarship_may">May be</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="cnic">Are you ready to take standardized tests such as
                                                        GRE/GMAT/LSAT ? <span
                                                                class="required-class">*</span></label>
                                                    <br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="standarized_test"
                                                               id="standarized_test_yes"
                                                               class="custom-control-input" id="standarized_test_yes"
                                                               value="yes" {{ old("standarized_test",$apply->standarized_test) == 'yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="standarized_test_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="standarized_test"
                                                               id="standarized_test_no"
                                                               class="custom-control-input" id="standarized_test_no"
                                                               value="no" {{ old("standarized_test",$apply->standarized_test) == 'no' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="standarized_test_no">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="standarized_test"
                                                               id="standarized_test_may"
                                                               class="custom-control-input" id="standarized_test_may"
                                                               value="maybe" {{ old("standarized_test",$apply->standarized_test) == 'maybe' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="standarized_test_may">May be</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="contact">Are you ready to take English ability test such
                                                        as IELTS/TOEFL/PTE/PVT/ITEP/DUOLINGO ? <span
                                                                class="required-class">*</span></label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="english_ability_test"
                                                               class="custom-control-input"
                                                               id="english_ability_test_yes"
                                                               value="yes" {{ old("english_ability_test",$apply->english_ability_test) == 'yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="english_ability_test_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="english_ability_test"
                                                               class="custom-control-input"
                                                               id="english_ability_test_no"
                                                               value="no" {{ old("english_ability_test",$apply->english_ability_test) == 'no' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="english_ability_test_no">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="english_ability_test"
                                                               class="custom-control-input"
                                                               id="english_ability_test_may"
                                                               value="maybe" {{ old("english_ability_test",$apply->english_ability_test) == 'maybe' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="english_ability_test_may">May be</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="share_any">Anything you want to share with Dalda
                                                        Foundation Trust ?</label>
                                                    <textarea name="share_any" class="form-control"
                                                              placeholder="Enter Your Suggestions"
                                                              rows="2"
                                                              maxlength="250">{{ old('share_any',$apply->share_any) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Student Photo <span class="required-class">*</span></label>
                                                    @if (!empty($apply->student_photo))
                                                        <div class="d-flex">
                                                            <div class="hovereffect">
                                                                <img src="{{Storage::url('uploads/'.$apply->student_photo ?? '')}}">
                                                                <div class="overlay">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <input type="file" id="student_photo" name="student_photo"
                                                           class="form-control"
                                                           accept=".jpg, .jpeg, .png"
                                                           value="{{ old('student_photo',$apply->student_photo) }}">
                                                    <div class="student_photo_error text-dark">Supported formats are
                                                        jpg, jpeg and png
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Matric Mark Sheet Photo <span class="required-class">*</span></label>
                                                    @if (!empty($apply->marksheet_photo))
                                                        @if (in_array('pdf', explode('.', $apply->marksheet_photo)))
                                                            <div class="custom-file-alert custom-file-alert-secondary alert-dismissible"
                                                                 role="alert">
                                                                <a href="{{ Storage::url('uploads/'.$apply->marksheet_photo)}}"
                                                                   target="_blank">
                                                                    Matric Mark Sheet </a>
                                                            </div>
                                                        @else
                                                            <div class="d-flex">
                                                                <div class="hovereffect">
                                                                    <img src="{{Storage::url('uploads/'.$apply->marksheet_photo ?? '')}}">
                                                                    <div class="overlay">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    <input type="file" id="marksheet_photo" name="marksheet_photo"
                                                           class="form-control"
                                                           accept=".jpg, .jpeg, .pdf"
                                                           value="{{ old('marksheet_photo',$apply->marksheet_photo) }}">
                                                    <div class="marksheet_photo_error text-dark">Supported formats are
                                                        jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Beneficiary CNIC Photo <span class="required-class">*</span></label>
                                                    @if (!empty($apply->beneficary_cnic_photo))
                                                        @if (in_array('pdf', explode('.', $apply->beneficary_cnic_photo)))
                                                            <div class="custom-file-alert custom-file-alert-secondary alert-dismissible"
                                                                 role="alert">
                                                                <a href="{{ Storage::url('uploads/'.$apply->beneficary_cnic_photo)}}"
                                                                   target="_blank">
                                                                    Beneficiary CNIC </a>
                                                            </div>
                                                        @else
                                                            <div class="d-flex">
                                                                <div class="hovereffect">
                                                                    <img src="{{Storage::url('uploads/'.$apply->beneficary_cnic_photo ?? '')}}">
                                                                    <div class="overlay">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    <input type="file" id="beneficary_cnic_photo"
                                                           name="beneficary_cnic_photo" class="form-control"
                                                           accept=".jpg, .jpeg, .pdf"
                                                           value="{{ old('beneficary_cnic_photo',$apply->beneficary_cnic_photo) }}">
                                                    <div class="beneficary_cnic_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Father/Mother or Guardian CNIC Photo <span class="required-class">*</span></label>
                                                    @if (!empty($apply->parent_cnic_photo))
                                                        @if (in_array('pdf', explode('.', $apply->parent_cnic_photo)))
                                                            <div class="custom-file-alert custom-file-alert-secondary alert-dismissible"
                                                                 role="alert">
                                                                <a href="{{ Storage::url('uploads/'.$apply->parent_cnic_photo)}}"
                                                                   target="_blank">
                                                                    Father/Mother or Guardian CNIC </a>
                                                            </div>
                                                        @else
                                                            <div class="d-flex">
                                                                <div class="hovereffect">
                                                                    <img src="{{Storage::url('uploads/'.$apply->parent_cnic_photo ?? '')}}">
                                                                    <div class="overlay">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    <input type="file" id="parent_cnic_photo" name="father_mother_or_guardian_cnic_photo"
                                                           class="form-control"
                                                           accept=".jpg, .jpeg, .pdf"
                                                           value="{{ old('father_mother_or_guardian_cnic_photo',$apply->parent_cnic_photo) }}">
                                                    <div class="parent_cnic_photo_error text-dark">Supported formats are
                                                        jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="button" class="btn btn-primary"
                                                   onclick="submitFormData()" value="Save"/>
                                        </form>
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

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.allowAlphabetOnly').keydown(function(e) {
                let key = e.keyCode;
                if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 &&
                        key <= 90))) {
                    return false;
                }
            });

            $(".allowNumberOnly").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            $(".allowSlash").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 47) {
                    return false;
                }
            });

            $(".marksFormat").keyup(function(e) {
                let pattern = new RegExp("^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$");
                if (pattern.test($(this).val()) === false) {
                    $(".error").text("Please enter the text in given format for e.g: 600/1050.");
                    return false;
                } else {
                    $(".error").text('');
                }
            });
        });

        function submitFormData() {
            const exts = ['jpeg', 'jpg', 'pdf', 'png', 'JPG', 'JPEG', 'PDF', 'PNG'];

            let student_photo = document.getElementById('student_photo');
            let marksheet_photo = document.getElementById("marksheet_photo");
            let beneficary_cnic_photo = document.getElementById("beneficary_cnic_photo");
            let parent_cnic_photo = document.getElementById("parent_cnic_photo");
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
            if (marks_in_matric.length != 0) {
                const marks = marks_in_matric.split('/');
                let obtainMarks = marks[0];
                let totalMarks = marks[1];
                if (parseInt(totalMarks) < parseInt(obtainMarks)) {

                    $(".error").text("obtained marks should be less than total marks.");
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
                    url: '/admin/update-apply-for-scoloarship/' + '{{ $apply->id }}',
                    data: bodyFormData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    if (response) {
                        $("input[type='button']").prop('disabled', false);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href = "/admin/apply-for-scoloarships";
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
                .catch(function(error) {
                    $("input[type='button']").prop('disabled', false);
                    $(".alert-danger").remove();
                    var html = `<div class="alert alert-danger"><strong>Whoops!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                            </button><ul>`;
                    if (error.response.data.error !== undefined) {
                        html += `<li>${error.response.data.error}</li>`;
                    }
                    $.each(error.response.data.errors, function(k, v) {
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

        }
    </script>
@endpush
