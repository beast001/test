@extends('layouts.dashboardApplicantTemp')

@section('style_push')

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">

@endsection

@section('content')

    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>New Clearance Letter Application</h5>
            </div>
            <div class="ibox-content">
                <h2>
                    ICT New Clearance Wizard Form
                </h2>
                <p>
                    This form is only for those applying for a first time.
                </p>

                <form id="form" method="POST" action="new_application" enctype="multipart/form-data" class="wizard-big">
                    @csrf
                    <h1>Personal</h1>
                    <fieldset>
                        <h2>Personal Information</h2>
                        <div class="row">
                            <div class="col-lg-8">

                                <div class="form-group">
                                    <label>Username *</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control required"/>
                                    @error('name') <span class="error text-red-500 text-xs"
                                                         style="color:red">{{ $message }}</span> @enderror <br>
                                </div>

                                <div class="form-group">
                                    <label>Passport Number: *</label>
                                    <input type="text" name="passport_no" placeholder="Passport No."
                                           class="form-control required"/>
                                    @error('passport_no') <span class="error text-red-500 text-xs"
                                                                style="color:red">{{ $message }}</span> @enderror <br>
                                </div>


                                <div class="form-group">
                                    <label class="fieldlabels">Attach a Copy of your Passport:*</label>
                                    <input type="file" name="passport_pic" accept=".pdf" class="form-control required">
                                    @error('passport_pic') <span class="error text-red-500 text-xs"
                                                                 style="color:red">{{ $message }}</span> @enderror <br>
                                </div>


                                <div class="form-group">
                                    <label>Nationality *</label>
                                    <select name="nationality" class="form-control required">
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    @error('nationality') <span class="error text-red-500 text-xs"
                                                                style="color:red">{{ $message }}</span> @enderror <br>
                                </div>


                                <div class="form-group">
                                    <label class="fieldlabels">Gender: *</label>
                                    <select name="gender" class="form-control required">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('gender') <span class="error text-red-500 text-xs"
                                                           style="color:red">{{ $message }}</span> @enderror <br>
                                </div>


                            </div>
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <div style="margin-top: 20px">
                                        <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <h1>Company</h1>
                    <fieldset>
                        <h2>Company Information</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Company Name: *</label>
                                    <input type="text" name="company_name" placeholder="Company Name"
                                           class="form-control required"/>
                                    @error('company_name') <span class="error text-red-500 text-xs"
                                                                 style="color:red">{{ $message }}</span> @enderror <br>
                                </div>
                                <div class="form-group">
                                    <label>Company Website: *</label>
                                    <input type="text" name="website" placeholder="website/social media page"
                                           class="form-control required"/>
                                    @error('website') <span class="error text-red-500 text-xs"
                                                            style="color:red">{{ $message }}</span> @enderror <br>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Total Number Of Employees: *</label>
                                    <input type="number" name="employee_no"
                                           placeholder="Total number of company employees"
                                           class="form-control required"/>
                                    @error('employee_no') <span class="error text-red-500 text-xs"
                                                                style="color:red">{{ $message }}</span> @enderror <br>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Core Area of Business: *</label>
                                    <input type="test" name="core_business"
                                           placeholder="e.g. Networking, Telecommunications e.t.c"
                                           class="form-control required"/>
                                    @error('core_business') <span class="error text-red-500 text-xs"
                                                                  style="color:red">{{ $message }}</span> @enderror <br>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Company Registration Certificate:*</label>
                                    <input type="file" name="company_reg_cert" accept=".pdf"
                                           class="form-control required">
                                    @error('company_reg_cert') <span class="error text-red-500 text-xs"
                                                                     style="color:red">{{ $message }}</span> @enderror
                                    <br>
                                </div>

                            </div>
                        </div>
                    </fieldset>

                    <h1>Job Description</h1>
                    <fieldset>
                        <h2>Provide Detailed Information On The Applied Job</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="fieldlabels">Job Title: *</label>
                                    <input type="text" name="job_title" placeholder="Title of the job"
                                           class="form-control required"/>
                                    @error('job_title') <span class="error text-red-500 text-xs"
                                                              style="color:red">{{ $message }}</span> @enderror <br>
                                </div>
                                <div class="form-group">
                                    <label class="fieldlabels">Job Description: *</label>
                                    <textarea name="job_description"
                                              placeholder="Briefly give a job description of the title above"
                                              class="form-control required" rows="5"></textarea>
                                    @error('job_description') <span class="error text-red-500 text-xs"
                                                                    style="color:red">{{ $message }}</span> @enderror
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Employment Terms: *</label>
                                    <input type="text" name="employment_term" placeholder="Permanent/Contract e.t.c"
                                           class="form-control required"/>
                                    @error('employment_term') <span class="error text-red-500 text-xs"
                                                                    style="color:red">{{ $message }}</span> @enderror
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Job Advert & Platform Used:*</label>
                                    <input type="file" name="advert_lt" accept=".pdf" class="form-control required">
                                    @error('advert_lt') <span class="error text-red-500 text-xs"
                                                              style="color:red">{{ $message }}</span> @enderror <br>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Company Registration Certificate:*</label>
                                    <input type="file" name="company_reg_cert" accept=".pdf"
                                           class="form-control required">
                                    @error('company_reg_cert') <span class="error text-red-500 text-xs"
                                                                     style="color:red">{{ $message }}</span> @enderror
                                    <br>
                                </div>

                            </div>
                        </div>

                    </fieldset>

                    <h1>Attachments</h1>
                    <fieldset>
                        <h2>Upload only PDF FILE formats</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="fieldlabels">Attach Formal Letter Requesting Clearance Addressed to
                                        ICTA:*</label>
                                    <input type="file" name="formal_lt" accept=".pdf" class="form-control required">
                                    @error('formal_lt') <span class="error text-red-500 text-xs"
                                                              style="color:red">{{ $message }}</span> @enderror <br>

                                </div>
                                <div class="form-group">
                                    <label class="fieldlabels">Attach Referral Letter From Department Of Immigration
                                        :*</label>
                                    <input type="file" name="immigration_lt" accept=".pdf" class="form-control required">
                                    @error('immigration_lt') <span class="error text-red-500 text-xs"
                                                                   style="color:red">{{ $message }}</span> @enderror <br>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Justification The Job Cannot Be Done By A Kenyan:*</label>
                                    <input type="file" name="justification_lt" accept=".pdf" class="form-control required">
                                    @error('justification_lt') <span class="error text-red-500 text-xs"
                                                                     style="color:red">{{ $message }}</span> @enderror <br>
                                </div>
                                <div class="form-group">
                                    <label class="fieldlabels">Info/CV Of The Kenyan Understudy:*</label>
                                    <input type="file" name="understudy_lt" accept=".pdf" class="form-control required">
                                    @error('understudy_lt') <span class="error text-red-500 text-xs"
                                                                  style="color:red">{{ $message }}</span> @enderror <br>
                                </div>
                                <div class="form-group">
                                    <label class="fieldlabels">Copy Of Permits Of Other Employees With Work Permit in The
                                        Organization:*</label>
                                    <input type="file" name="permit_copies" accept=".pdf" class="form-control required">
                                    @error('permit_copies') <span class="error text-red-500 text-xs"
                                                                  style="color:red">{{ $message }}</span> @enderror <br>

                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script_push')

    <!-- Steps -->
    <script src="js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element) {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>

@endsection
