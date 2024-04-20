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
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Claim Scholarship</h5>
        <form id="claimForm" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="student_id">Student Id <span
                                class="required-class">*</span></label>
                    <select class="form-control" name="student_id" id="student_id" required>
                        <option selected disabled value=""> -- Select -- </option>
                        @foreach($students as $val)
                            <option value="{{$val->student_id}}"
                                    data-full-name="{{ $val->full_name }}" {{ old('student_id') === $val->student_id ? "selected" : ""}}>{{$val->student_id}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a student id.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           name="fullname" id="fullname_id"
                           placeholder="Student Full Name"
                           value="{{ old('fullname') }}" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="board_intermediate">Board Of Intermediate <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           id="board_intermediate" name="board_intermediate"
                           placeholder="Enter Board Of Intermediate"
                           value="{{ old('board_intermediate') }}" maxlength="55" required>
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
                           value="{{ old('marks_in_xi') }}" maxlength="7" required>
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
                           value="{{ old('marks_in_xii') }}" maxlength="9" required>
                    <span class="text-danger font-weight-light marks_in_xii"></span>
                    <div class="invalid-feedback">
                        Please enter your marks.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_one">Marks in Bachelor's Year
                        1 </label>
                    <input type="text" class="form-control rounded cgpa"
                           id="marks_in_bachelor_one" name="marks_in_bachelor_one"
                           placeholder="Enter Marks in Bachelor's Year 1"
                           value="{{ old('marks_in_bachelor_one') }}" maxlength="4" >
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_two">Marks in Bachelor's Year
                        2 </label>
                    <input type="text" class="form-control rounded cgpa"
                           id="marks_in_bachelor_two" name="marks_in_bachelor_two"
                           placeholder="Enter Marks in Bachelor's Year 2"
                           value="{{ old('marks_in_bachelor_two') }}" maxlength="4" >
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_three">Marks in Bachelor's Year
                        3 </label>
                    <input type="text" class="form-control rounded cgpa"
                           id="marks_in_bachelor_three" name="marks_in_bachelor_three"
                           placeholder="Enter Marks in Bachelor's Year 3"
                           value="{{ old('marks_in_bachelor_three') }}" maxlength="4" >
                        <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_four">Marks in Bachelor's Year
                        4 </label>
                    <input type="text" class="form-control rounded cgpa"
                           id="marks_in_bachelor_four" name="marks_in_bachelor_four"
                           placeholder="Enter Marks in Bachelor's Year 4"
                           value="{{ old('marks_in_bachelor_four') }}" maxlength="4" >
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="marks_in_bachelor_five">Marks in Bachelor's Year
                        5 </label>
                    <input type="text" class="form-control rounded cgpa"
                           id="marks_in_bachelor_five" name="marks_in_bachelor_five"
                           placeholder="Enter Marks in Bachelor's Year 5"
                           value="{{ old('marks_in_bachelor_five') }}" maxlength="4" >
                           <div class="invalid-feedback">
                            Please enter your marks.
                        </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="degree_name">Your Degree Full Name </label>
                    <select class="form-control" id="degree_name" name="degree_name">
                        <option value="mbbs">MBBS</option>
                        <option value="bos/bcs">BOS/BCS</option>
                        <option value="bs/bls">BS/BLS</option>
                        <option value="ba/bsc">BA/BSC</option>
                        <option value="ba-llb">BA-LLB</option>
                        <option value="dpt">DPT</option>
                        <option value="ba/bsc(H)">BA/BSC(H)</option>
                        <option value="BArch">BARCH</option>
                        <option value="BE">BE</option>
                        <option value="BTech">BTech</option>
                        <option value="bs(n)">BS(N)</option>
                        <option value="bcom">B.COM</option>
                        <option value="pharm-d">Pharm-D</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="current_city">Your Current City Name <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           id="current_city" name="current_city"
                           placeholder="Enter Current City Name"
                           value="{{ old('current_city') }}" maxlength="55" required>
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
                               value="yes" {{ empty(old("intermediate_repeated")) || old("intermediate_repeated") == 'yes' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="intermediate_repeated_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="intermediate_repeated"
                               class="custom-control-input"
                               id="intermediate_repeated_no"
                               value="no" {{ old("intermediate_repeated") == 'no' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="intermediate_repeated_no">No</label>
                    </div>
                </div>
            </div>
            <hr style="margin-top: -10px">
            <h5 class="card-title">Past Installments</h5>
            <hr>
            @for($i = 1; $i <= 7; $i++)
                <h6>Installments {{$i}}</h6>
                <input type="hidden" name="installments[{{$i}}]" value="{{$i}}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="year_of_receiving{{$i}}">Year Of Receiving</label>
                        <input type="text" class="form-control rounded"
                               id="year_of_receiving{{$i}}"
                               name="year_of_receiving[{{$i}}]"
                               placeholder="Enter Year Of Receiving"
                               value="{{ old('year_of_receiving'.$i) }}">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="received_yes{{$i}}">Receieved Yes Or No</label>
                        <input type="text" class="form-control rounded "
                               id="received_yes{{$i}}" name="received_yes[{{$i}}]"
                               placeholder="Enter Receieved Yes Or No"
                               value="{{ old('received_yes'.$i) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="if_no_reason{{$i}}">If No Then Give Reason Why?</label>
                        <input type="text" class="form-control rounded"
                               id="if_no_reason{{$i}}" name="if_no_reason[{{$i}}]"
                               placeholder="Enter If No Then Give Reason Why?"
                               value="{{ old('if_no_reason'.$i) }}">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="amount_received{{$i}}">Amount Received</label>
                        <input type="text" class="form-control rounded"
                               id="amount_received{{$i}}" name="amount_received[{{$i}}]"
                               placeholder="Enter Amount Received"
                               value="{{ old('amount_received'.$i) }}">

                    </div>
                </div>
            @endfor

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="beneficary_name">Your Beneficiary Name <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded allowAlphabetOnly"
                           id="beneficary_name" name="beneficary_name"
                           placeholder="Enter Your Beneficiary Name"
                           value="{{ old('beneficary_name') }}" maxlength="55" required>
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
                           value="{{ old('beneficary_iban_number') }}" minlength="24" maxlength="24" required>
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
                           value="{{ old('beneficary_bank') }}" maxlength="55" required>
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
                           value="{{ old('beneficary_cnic') }}" minlength="13" maxlength="13" required>
                           <div class="invalid-feedback">
                            Please enter your beneficiary's CNIC number.
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="beneficary_bank_address">Your Beneficiary's Bank Address <span
                                class="required-class">*</span></label>
                    <input type="text" class="form-control rounded"
                           id="beneficary_bank_address" name="beneficary_bank_address"
                           placeholder="Enter Your Beneficiary's Bank Address"
                           value="{{ old('beneficary_bank_address') }}" required>
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
                           value="{{ old('cnic_number') }}" minlength="13" maxlength="13" required>
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
                           value="{{ old('mobile_number') }}" minlength="13" maxlength="13" required>
                           <div class="invalid-feedback">
                            Please enter your mobile number.
                        </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="whatsapp_number">Your WhatsApp Number </label>
                    <input type="text" class="form-control rounded allowNumberOnly"
                           id="whatsapp_number" name="whatsapp_number"
                           placeholder="Enter Your WhatsApp Number" minlength="13" maxlength="13"
                           value="{{ old('whatsapp_number') }}" >
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
                              rows="2" maxlength="250" required>{{ old('goals') }}</textarea>
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
                              maxlength="250" required>{{ old('suggestion') }}</textarea>
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
                              maxlength="250" required>{{ old('your_contribution') }}</textarea>
                              <div class="invalid-feedback">
                                Please enter valid input.
                            </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="contact">Are you interested in achieving international
                        scholarships with the help of Dalda
                        Foundation Trust ? <span
                                class="required-class">*</span></label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="international_scolarship"
                               class="custom-control-input"
                               id="international_scolarship_yes"
                               value="yes" {{ old("international_scolarship") == 'yes' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="international_scolarship_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="international_scolarship"
                               class="custom-control-input"
                               id="international_scolarship_no"
                               value="no" {{ old("international_scolarship") == 'no' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="international_scolarship_no">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="international_scolarship"
                               class="custom-control-input"
                               id="international_scolarship_may"
                               value="maybe" {{ old("international_scolarship") == 'maybe' ? 'checked' : '' }} required>
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
                               value="yes" {{ old("standarized_test") == 'yes' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="standarized_test_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="standarized_test"
                               id="standarized_test_no"
                               class="custom-control-input" id="standarized_test_no"
                               value="no" {{ old("standarized_test") == 'no' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="standarized_test_no">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="standarized_test"
                               id="standarized_test_may"
                               class="custom-control-input" id="standarized_test_may"
                               value="maybe" {{ old("standarized_test") == 'maybe' ? 'checked' : '' }} required>
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
                               value="yes" {{ old("english_ability_test") == 'yes' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="english_ability_test_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="english_ability_test"
                               class="custom-control-input"
                               id="english_ability_test_no"
                               value="no" {{ old("english_ability_test") == 'no' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="english_ability_test_no">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="english_ability_test"
                               class="custom-control-input"
                               id="english_ability_test_may"
                               value="maybe" {{ old("english_ability_test") == 'maybe' ? 'checked' : '' }} required>
                        <label class="custom-control-label checkbox-primary outline"
                               for="english_ability_test_may">May be</label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="share_any">Anything you want to share with Dalda
                        Foundation Trust ?</label>
                    <textarea name="share_any" class="form-control"
                              placeholder="Enter Your Suggestions"
                              rows="2" maxlength="250">{{ old('share_any') }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>Your Photo <span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="student_photo" name="student_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('student_photo') }}" required>
                               <div class="invalid-feedback">
                                Please choose you photo.
                            </div>
                    </div>
                    <div class="student_photo_error text-dark">Supported formats are
                        jpg, jpeg and png
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Matric Mark Sheet Photo <span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="matric_photo" name="matric_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('matric_photo') }}" required>
                               <div class="invalid-feedback">
                                Please choose matric mark sheet photo.
                            </div>
                    </div>
                    <div class="matric_photo_error text-dark">Supported formats are jpg,
                        jpeg and pdf
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Intermediate Mark Sheet Photo <span
                                class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="intermediate_photo"
                               name="intermediate_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('intermediate_photo') }}" required>
                               <div class="invalid-feedback">
                                Please choose inter mark sheet photo.
                            </div>
                    </div>
                    <div class="intermediate_photo_error text-dark">Supported formats
                        are jpg, jpeg and pdf
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Bachelor's Year 1 Mark Sheet Photo </label>
                    <div class="input-group">
                        <input type="file" id="bachelor_one_photo"
                               name="bachelor_one_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('bachelor_one_photo') }}">
                    </div>
                    <div class="bachelor_one_photo_error text-dark">Supported formats
                        are jpg, jpeg and pdf
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Bachelor's Year 2 Mark Sheet Photo </label>
                    <div class="input-group">
                        <input type="file" id="bachelor_two_photo"
                               name="bachelor_two_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('bachelor_two_photo') }}">
                    </div>
                    <div class="bachelor_two_photo_error text-dark">Supported formats
                        are jpg, jpeg and pdf
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Bachelor's Year 3 Mark Sheet Photo </label>
                    <div class="input-group">
                        <input type="file" id="bachelor_three_photo"
                               name="bachelor_three_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('bachelor_three_photo') }}" >
                    </div>
                    <div class="bachelor_three_photo_error text-dark">Supported formats
                        are jpg, jpeg and pdf
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Bachelor's Year 4 Mark Sheet Photo </label>
                    <div class="input-group">
                        <input type="file" id="bachelor_four_photo"
                               name="bachelor_four_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('bachelor_four_photo') }}">
                    </div>
                    <div class="bachelor_four_photo_error text-dark">Supported formats
                        are jpg, jpeg and pdf
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Bachelor's Year 5 Mark Sheet Photo </label>
                    <div class="input-group">
                        <input type="file" id="bachelor_five_photo"
                               name="bachelor_five_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('bachelor_five_photo') }}">
                    </div>
                    <div class="bachelor_five_photo_error text-dark">Supported formats
                        are jpg, jpeg and pdf
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Beneficiary CNIC Photo <span class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="beneficary_cnic_photo"
                               name="beneficary_cnic_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('beneficary_cnic_photo') }}" required>
                               <div class="invalid-feedback">
                                Please choose beneficiary CNIC photo.
                            </div>
                    </div>
                    <div class="beneficary_cnic_photo_error text-dark">Supported formats
                        are jpg, jpeg and pdf
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Father/Mother or Guardian CNIC Photo <span
                                class="required-class">*</span></label>
                    <div class="input-group">
                        <input type="file" id="parent_cnic_photo"
                               name="father_mother_or_guardian_cnic_photo"
                               class="form-control"
                               accept=".jpg, .jpeg, .pdf"
                               value="{{ old('father_mother_or_guardian_cnic_photo') }}" required>
                               <div class="invalid-feedback">
                                Please choose father/mother or guardian CNIC photo.
                            </div>
                    </div>
                    <div class="parent_cnic_photo_error text-dark">Supported formats are
                        jpg, jpeg and pdf
                    </div>
                </div>
            </div>
            <button class="btn btn-primary float-right" type="button"  onclick="submitFormData()">Submit form</button>
        </form>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
        </script>
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
                                    <h4 class="card-title">Claim Scholarship</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/claim-for-scoloarships" class="btn btn-primary float-right">←
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
                                        <form id="claimForm">
                                            <div class="row">
                                                <div class="col-md-12 form-errors"></div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="student_id">Student Id <span
                                                                class="required-class">*</span></label>
                                                    <select class="form-control" name="student_id" id="student_id">
                                                        <option value="">Select</option>
                                                        @foreach($students as $val)
                                                            <option value="{{$val->student_id}}"
                                                                    data-full-name="{{ $val->full_name }}" {{ old('student_id') === $val->student_id ? "selected" : ""}}>{{$val->student_id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="fullname">Full Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowAlphabetOnly"
                                                           name="fullname" id="fullname_id"
                                                           placeholder="Student Full Name"
                                                           value="{{ old('fullname') }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="board_intermediate">Board Of Intermediate <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowAlphabetOnly"
                                                           id="board_intermediate" name="board_intermediate"
                                                           placeholder="Enter Board Of Intermediate"
                                                           value="{{ old('board_intermediate') }}" maxlength="55">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_xi">Marks in XI ( Write in this format:
                                                        440/550 ) <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowSlash marksFormat" id="marks_in_xi" name="marks_in_xi"
                                                           placeholder="Enter Marks in XI"
                                                           value="{{ old('marks_in_xi') }}" maxlength="7">
                                                    <span class="text-danger font-weight-light marks_in_xi"></span>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_xii">Marks in XII ( Write in this
                                                        format: 800/1100 ) </label>
                                                    <input type="text" class="form-control rounded allowSlash marksFormat" id="marks_in_xii" name="marks_in_xii"
                                                           placeholder="Enter Marks in XII"
                                                           value="{{ old('marks_in_xii') }}" maxlength="9">
                                                    <span class="text-danger font-weight-light marks_in_xii"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_bachelor_one">Marks in Bachelor's Year
                                                        1 </label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="marks_in_bachelor_one" name="marks_in_bachelor_one"
                                                           placeholder="Enter Marks in Bachelor's Year 1"
                                                           value="{{ old('marks_in_bachelor_one') }}" maxlength="3">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_bachelor_two">Marks in Bachelor's Year
                                                        2 </label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="marks_in_bachelor_two" name="marks_in_bachelor_two"
                                                           placeholder="Enter Marks in Bachelor's Year 2"
                                                           value="{{ old('marks_in_bachelor_two') }}" maxlength="3">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_bachelor_three">Marks in Bachelor's Year
                                                        3 </label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="marks_in_bachelor_three" name="marks_in_bachelor_three"
                                                           placeholder="Enter Marks in Bachelor's Year 3"
                                                           value="{{ old('marks_in_bachelor_three') }}" maxlength="3">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_bachelor_four">Marks in Bachelor's Year
                                                        4 </label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="marks_in_bachelor_four" name="marks_in_bachelor_four"
                                                           placeholder="Enter Marks in Bachelor's Year 4"
                                                           value="{{ old('marks_in_bachelor_four') }}" maxlength="3">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="marks_in_bachelor_five">Marks in Bachelor's Year
                                                        5 </label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="marks_in_bachelor_five" name="marks_in_bachelor_five"
                                                           placeholder="Enter Marks in Bachelor's Year 5"
                                                           value="{{ old('marks_in_bachelor_five') }}" maxlength="3">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="degree_name">Your Degree Full Name </label>
                                                    <select class="form-control" id="degree_name" name="degree_name">
                                                        <option value="mbbs">MBBS</option>
                                                        <option value="bos/bcs">BOS/BCS</option>
                                                        <option value="bs/bls">BS/BLS</option>
                                                        <option value="ba/bsc">BA/BSC</option>
                                                        <option value="ba-llb">BA-LLB</option>
                                                        <option value="dpt">DPT</option>
                                                        <option value="ba/bsc(H)">BA/BSC(H)</option>
                                                        <option value="BArch">BARCH</option>
                                                        <option value="BE">BE</option>
                                                        <option value="BTech">BTech</option>
                                                        <option value="bs(n)">BS(N)</option>
                                                        <option value="bcom">B.COM</option>
                                                        <option value="pharm-d">Pharm-D</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="current_city">Your Current City Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowAlphabetOnly"
                                                           id="current_city" name="current_city"
                                                           placeholder="Enter Current City Name"
                                                           value="{{ old('current_city') }}" maxlength="55">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Intermediate Repeated:<span
                                                                class="required-class">*</span></label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="intermediate_repeated"
                                                               class="custom-control-input"
                                                               id="intermediate_repeated_yes"
                                                               value="yes" {{ empty(old("intermediate_repeated")) || old("intermediate_repeated") == 'yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="intermediate_repeated_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="intermediate_repeated"
                                                               class="custom-control-input"
                                                               id="intermediate_repeated_no"
                                                               value="no" {{ old("intermediate_repeated") == 'no' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="intermediate_repeated_no">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4>Past Installments</h4>

                                            @for($i = 1; $i <= 7; $i++)
                                                <h6>Installments {{$i}}</h6>
                                                <input type="hidden" name="installments[{{$i}}]" value="{{$i}}">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="year_of_receiving{{$i}}">Year Of Receiving<span
                                                                    class="required-class">*</span></label>
                                                        <input type="text" class="form-control rounded"
                                                               id="year_of_receiving{{$i}}"
                                                               name="year_of_receiving[{{$i}}]"
                                                               placeholder="Enter Year Of Receiving"
                                                               value="{{ old('year_of_receiving'.$i) }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="received_yes{{$i}}">Receieved Yes Or No<span
                                                                    class="required-class">*</span></label>
                                                        <input type="text" class="form-control rounded "
                                                               id="received_yes{{$i}}" name="received_yes[{{$i}}]"
                                                               placeholder="Enter Receieved Yes Or No"
                                                               value="{{ old('received_yes'.$i) }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="if_no_reason{{$i}}">If No Then Give Reason Why?<span
                                                                    class="required-class">*</span></label>
                                                        <input type="text" class="form-control rounded"
                                                               id="if_no_reason{{$i}}" name="if_no_reason[{{$i}}]"
                                                               placeholder="Enter If No Then Give Reason Why?"
                                                               value="{{ old('if_no_reason'.$i) }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="amount_received{{$i}}">Amount Received<span
                                                                    class="required-class">*</span></label>
                                                        <input type="text" class="form-control rounded"
                                                               id="amount_received{{$i}}" name="amount_received[{{$i}}]"
                                                               placeholder="Enter Amount Received"
                                                               value="{{ old('amount_received'.$i) }}">
                                                    </div>
                                                </div>
                                            @endfor

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_name">Your Beneficiary Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowAlphabetOnly"
                                                           id="beneficary_name" name="beneficary_name"
                                                           placeholder="Enter Your Beneficiary Name"
                                                           value="{{ old('beneficary_name') }}" maxlength="55">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_iban_number">Your Beneficiary's 24 Digits
                                                        IBAN number <span class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           id="beneficary_iban_number" name="beneficary_iban_number"
                                                           placeholder="Enter Your Beneficiary's 24 Digits IBAN number"
                                                           value="{{ old('beneficary_iban_number') }}" maxlength="34">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_bank">Your Beneficiary's Bank Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           id="beneficary_bank" name="beneficary_bank"
                                                           placeholder="Enter Your Beneficiary Bank Name"
                                                           value="{{ old('beneficary_bank') }}" maxlength="55">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_cnic">Your Beneficiary's CNIC Number <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="beneficary_cnic" name="beneficary_cnic"
                                                           placeholder="Enter Your Beneficiary's CNIC Number"
                                                           value="{{ old('beneficary_cnic') }}" maxlength="14">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="beneficary_bank_address">Your Beneficiary's Bank Address <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           id="beneficary_bank_address" name="beneficary_bank_address"
                                                           placeholder="Enter Your Beneficiary's CNIC Number"
                                                           value="{{ old('beneficary_bank_address') }}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="cnic_number">Your CNIC Number / Form 'B' <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="cnic_number" name="cnic_number"
                                                           placeholder="Enter Your CNIC Number / Form 'B'"
                                                           value="{{ old('cnic_number') }}" maxlength="14">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="mobile_number">Your Mobile Number <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="mobile_number" name="mobile_number"
                                                           placeholder="Enter Your Mobile Number"
                                                           value="{{ old('mobile_number') }}" maxlength="13">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="whatsapp_number">Your WhatsApp Number </label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="whatsapp_number" name="whatsapp_number"
                                                           placeholder="Enter Your WhatsApp Number"
                                                           value="{{ old('whatsapp_number') }}" maxlength="13">
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
                                                              rows="2" maxlength="250">{{ old('goals') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="suggestion">Your Suggestions, how we together can
                                                        develop Dalda Foundation Community to serve
                                                        mankind ? <span class="required-class">*</span></label>
                                                    <textarea name="suggestion" class="form-control"
                                                              placeholder="Enter Your Suggestions"
                                                              rows="2"
                                                              maxlength="250">{{ old('suggestion') }}</textarea>
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
                                                              maxlength="250">{{ old('your_contribution') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="contact">Are you interested in achieving international
                                                        scholarships with the help of Dalda
                                                        Foundation Trust ? <span
                                                                class="required-class">*</span></label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="international_scolarship"
                                                               class="custom-control-input"
                                                               id="international_scolarship_yes"
                                                               value="yes" {{ old("international_scolarship") == 'yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="international_scolarship_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="international_scolarship"
                                                               class="custom-control-input"
                                                               id="international_scolarship_no"
                                                               value="no" {{ old("international_scolarship") == 'no' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="international_scolarship_no">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="international_scolarship"
                                                               class="custom-control-input"
                                                               id="international_scolarship_may"
                                                               value="maybe" {{ old("international_scolarship") == 'maybe' ? 'checked' : '' }}>
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
                                                               value="yes" {{ old("standarized_test") == 'yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="standarized_test_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="standarized_test"
                                                               id="standarized_test_no"
                                                               class="custom-control-input" id="standarized_test_no"
                                                               value="no" {{ old("standarized_test") == 'no' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="standarized_test_no">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="standarized_test"
                                                               id="standarized_test_may"
                                                               class="custom-control-input" id="standarized_test_may"
                                                               value="maybe" {{ old("standarized_test") == 'maybe' ? 'checked' : '' }}>
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
                                                               value="yes" {{ old("english_ability_test") == 'yes' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="english_ability_test_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="english_ability_test"
                                                               class="custom-control-input"
                                                               id="english_ability_test_no"
                                                               value="no" {{ old("english_ability_test") == 'no' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="english_ability_test_no">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="english_ability_test"
                                                               class="custom-control-input"
                                                               id="english_ability_test_may"
                                                               value="maybe" {{ old("english_ability_test") == 'maybe' ? 'checked' : '' }}>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="english_ability_test_may">May be</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="share_any">Anything you want to share with Dalda
                                                        Foundation Trust ?</label>
                                                    <textarea name="share_any" class="form-control"
                                                              placeholder="Enter Your Suggestions"
                                                              rows="2" maxlength="250">{{ old('share_any') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Your Photo <span class="required-class">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file" id="student_photo" name="student_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('student_photo') }}">
                                                    </div>
                                                    <div class="student_photo_error text-dark">Supported formats are
                                                        jpg, jpeg and png
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Matric Mark Sheet Photo <span class="required-class">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file" id="matric_photo" name="matric_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('matric_photo') }}">
                                                    </div>
                                                    <div class="matric_photo_error text-dark">Supported formats are jpg,
                                                        jpeg and pdf
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Intermediate Mark Sheet Photo <span
                                                                class="required-class">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file" id="intermediate_photo"
                                                               name="intermediate_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('intermediate_photo') }}">
                                                    </div>
                                                    <div class="intermediate_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Bachelor's Year 1 Mark Sheet Photo </label>
                                                    <div class="input-group">
                                                        <input type="file" id="bachelor_one_photo"
                                                               name="bachelor_one_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('bachelor_one_photo') }}">
                                                    </div>
                                                    <div class="bachelor_one_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Bachelor's Year 2 Mark Sheet Photo </label>
                                                    <div class="input-group">
                                                        <input type="file" id="bachelor_two_photo"
                                                               name="bachelor_two_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('bachelor_two_photo') }}">
                                                    </div>
                                                    <div class="bachelor_two_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Bachelor's Year 3 Mark Sheet Photo </label>
                                                    <div class="input-group">
                                                        <input type="file" id="bachelor_three_photo"
                                                               name="bachelor_three_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('bachelor_three_photo') }}">
                                                    </div>
                                                    <div class="bachelor_three_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Bachelor's Year 4 Mark Sheet Photo </label>
                                                    <div class="input-group">
                                                        <input type="file" id="bachelor_four_photo"
                                                               name="bachelor_four_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('bachelor_four_photo') }}">
                                                    </div>
                                                    <div class="bachelor_four_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Bachelor's Year 5 Mark Sheet Photo </label>
                                                    <div class="input-group">
                                                        <input type="file" id="bachelor_five_photo"
                                                               name="bachelor_five_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('bachelor_five_photo') }}">
                                                    </div>
                                                    <div class="bachelor_five_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Beneficiary CNIC Photo <span class="required-class">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file" id="beneficary_cnic_photo"
                                                               name="beneficary_cnic_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('beneficary_cnic_photo') }}">
                                                    </div>
                                                    <div class="beneficary_cnic_photo_error text-dark">Supported formats
                                                        are jpg, jpeg and pdf
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Father/Mother or Guardian CNIC Photo <span
                                                                class="required-class">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file" id="parent_cnic_photo"
                                                               name="father_mother_or_guardian_cnic_photo"
                                                               class="form-control"
                                                               accept=".jpg, .jpeg, .pdf"
                                                               value="{{ old('father_mother_or_guardian_cnic_photo') }}">
                                                    </div>
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
        $('.cgpa').keypress(function(event) {
            if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
                    $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        }).on('paste', function(event) {
            event.preventDefault();
        });
        $(".allowSlash").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 47) {
                return false;
            }
        });

        $(".marksFormat").keyup(function (e) {

            let pattern = new RegExp("^[1-5]{1}[0-9]{2}\/[0-9]{3}$");
            if ($(this).attr('name') === 'marks_in_xi') {
                if (pattern.test($(this).val()) === false) {
                    $(".marks_in_xi").text("Please enter the text in given format for e.g: 440/550.");
                    return false;
                }
            } else if ($(this).attr('name') === 'marks_in_xii') {
                pattern = new RegExp("^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$");
                if (pattern.test($(this).val()) === false) {
                    $(".marks_in_xii").text("Please enter the text in given format for e.g: 800/1100.");
                    return false;
                }
            }
            $(".marks_in_xi").text('');
            $(".marks_in_xii").text('');
        });

        $("#student_id").change(function () {
            $("#fullname_id").val($(this).find(":selected").data("fullName"));
        });

        function submitFormData() {
            const exts = ['jpeg', 'jpg', 'pdf', 'png','JPG','JPEG','PDF','PNG'];

            let student_photo = document.getElementById
            ('student_photo');
            let marksheet_photo = document.getElementById
            ("matric_photo");
            let intermediate_photo = document.getElementById
            ("intermediate_photo");
            let bachelor_one_photo = document.getElementById
            ("bachelor_one_photo");
            let bachelor_two_photo = document.getElementById
            ("bachelor_two_photo");
            let bachelor_three_photo = document.getElementById
            ("bachelor_three_photo");
            let bachelor_four_photo = document.getElementById
            ("bachelor_four_photo");
            let bachelor_five_photo = document.getElementById
            ("bachelor_five_photo");
            let beneficary_cnic_photo = document.getElementById
            ("beneficary_cnic_photo");
            let parent_cnic_photo = document.getElementById
            ("parent_cnic_photo");
            let marks_in_xi = $("#marks_in_xi").val();
            let marks_in_xii = $("#marks_in_xii").val();
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
                    $(".matric_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".matric_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (intermediate_photo.files.length != 0) {
                intermediate_photo = intermediate_photo.files[0].name;
                let ext_intermediate_photo = intermediate_photo.substr(intermediate_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_intermediate_photo)) {
                    $(".intermediate_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".intermediate_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (bachelor_one_photo.files.length != 0) {
                bachelor_one_photo = bachelor_one_photo.files[0].name;
                let ext_bachelor_one_photo = bachelor_one_photo.substr(bachelor_one_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_bachelor_one_photo)) {
                    $(".bachelor_one_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".bachelor_one_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (bachelor_two_photo.files.length != 0) {
                bachelor_two_photo = bachelor_two_photo.files[0].name;
                let ext_bachelor_two_photo = bachelor_two_photo.substr(bachelor_two_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_bachelor_two_photo)) {
                    $(".bachelor_two_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".bachelor_two_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (bachelor_three_photo.files.length != 0) {
                bachelor_three_photo = bachelor_three_photo.files[0].name;
                let ext_bachelor_three_photo = bachelor_three_photo.substr(bachelor_three_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_bachelor_three_photo)) {
                    $(".bachelor_three_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".bachelor_three_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (bachelor_four_photo.files.length != 0) {
                bachelor_four_photo = bachelor_four_photo.files[0].name;
                let ext_bachelor_four_photo = bachelor_four_photo.substr(bachelor_four_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_bachelor_four_photo)) {
                    $(".bachelor_four_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".bachelor_four_photo_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (bachelor_five_photo.files.length != 0) {
                bachelor_five_photo = bachelor_five_photo.files[0].name;
                let ext_bachelor_five_photo = bachelor_five_photo.substr(bachelor_five_photo.lastIndexOf('.') + 1);
                if (!exts.includes(ext_bachelor_five_photo)) {
                    $(".bachelor_five_photo_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".bachelor_five_photo_error").removeClass('text-danger').addClass('text-dark');
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
            if (marks_in_xi.length != 0) {
                const marks = marks_in_xi.split('/');
                let obtainMarks = marks[0];
                let totalMarks = marks[1];
                if(parseInt(totalMarks) < parseInt(obtainMarks))
                {
                    $(".marks_in_xi").text("Obtained marks should be less than total marks.");
                    $('html,body').animate({
                            scrollTop: $(".content").offset().top
                        },
                        'slow');
                    errorCheck = true;
                }
            }
            if (marks_in_xii.length != 0) {
                const marks = marks_in_xii.split('/');
                let obtainMarks = marks[0];
                let totalMarks = marks[1];
                if(parseInt(totalMarks) < parseInt(obtainMarks))
                {
                    $(".marks_in_xii").text("Obtained marks should be less than total marks.");
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
            let form = document.querySelector('#claimForm');
            let bodyFormData = new FormData(form);
            axios({
                method: 'post',
                url: '/admin/add-claim-for-scoloarship',
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
                                window.location.href = "/admin/claim-for-scoloarships";
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
                    } else {
                        $.each(error.response.data.errors, function (k, v) {
                            var splitKey = k.split('.');
                            $(`input[name="data[${splitKey[1]}][${splitKey[2]}]"]`).addClass('has-error');
                            html += `<li>${v[0]}</li>`;
                        });
                    }
                    html += `</ul></div>`;
                    $('#claimForm').addClass('was-validated');
                    $(".form-errors").append(html);
                    $('html,body').animate({
                            scrollTop: $(".content").offset().top
                        },
                        'slow');
                });

        }
    </script>
@endpush
