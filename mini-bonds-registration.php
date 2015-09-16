<?php

function minibond_registration($atts) {
    $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
    $step = isset( $segments[1] ) && $segments[1] != '' ? $segments[1] : '1';
    if( $step == '1' ) {
        minibond_registration_step1();
    } else if( $step == '2' ) {
        minibond_registration_step2();
    } else if( $step == '3' ) {
        minibond_registration_step3();
    } else if( $step == '4' ) {
        minibond_registration_step4();
    } else {
        minibond_registration_step1();
    }
}

function minibond_registration_step1() {
    ?>
    <div class="row registration-container step1">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">REGISTER YOUR ACCOUNT</h1>
                <p class="reg_desc"><strong>To register for your account follow these 3 easy steps.</strong></p>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <img src="<?php echo plugins_url( 'img/step1.png', __FILE__ ) ?>" alt="Registration Steps 1" class="register-steps pull-right" />
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title">PERSONAL DETAILS</h2>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" name="registrationForm" id="registrationForm" role="form" novalidate="">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="seltitle">Title:</label>
                            <select id="seltitle" name="settitle" class="form-control" data-parsley-required="" data-parsley-error-message="Missing title" data-parsley-errors-container="#titleerror" data-parsley-id="2476">
                                <option value="">Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms">Ms</option>
                                <option value="Dr">Dr</option>
                            </select>
                            <div id="titleerror"><ul class="parsley-errors-list" id="parsley-id-2476"></ul></div>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="" data-parsley-required="true" data-parsley-error-message="Please enter your first name" data-parsley-id="9218"><ul class="parsley-errors-list" id="parsley-id-9218"></ul>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname:</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="" data-parsley-required="true" data-parsley-error-message="Please enter your surname" data-parsley-id="8326"><ul class="parsley-errors-list" id="parsley-id-8326"></ul>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Date of Birth:</label>
                            <table border="0" class="multiselect"><tbody>
                                <tr>
                                    <td>
                                        <input class="form-control" id="birthdayday" name="birthdayday" style="height: 30px;" size="2" maxlength="2" minlength="2" data-parsley-minlength="1" data-parsley-min="1" data-parsley-type="integer" type="text" data-parsley-max="31" data-parsley-required="true" data-parsley-errors-container="#birthdayerror" data-parsley-error-message="Please enter a valid day" value="" data-parsley-id="0019">
                                    </td>
                                    <td>
                                        <select id="selmonth" name="setmonth" class="form-control" data-parsley-dobvalidation="" data-parsley-validate-if-empty="" data-parsley-errors-container="#birthdayerror" data-parsley-id="5824" >
                                            <option value="">Month</option>
                                            <option value="1">January</option>
                                            <option value="2">Febuary</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="birthdayyear" name="birthdayyear" style="height: 30px;" size="4" maxlength="4" data-parsley-minlength="4" data-parsley-required="true" data-parsley-type="integer" data-parsley-errors-container="#birthdayerror" data-parsley-error-message="Please enter a valid year (YYYY)" value="" data-parsley-id="1947">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><div id=""></div></td>
                                </tr>
                            </tbody></table>
                            <div id="birthdayerror"><ul class="parsley-errors-list" id="parsley-id-0019"></ul><ul class="parsley-errors-list" id="parsley-id-5824"></ul><ul class="parsley-errors-list" id="parsley-id-1947"></ul></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="" data-parsley-required="true" data-parsley-error-message="Please enter your email address" data-parsley-id="5722"><ul class="parsley-errors-list" id="parsley-id-5722"></ul>
                        </div>
                        <div class="form-group">
                            <label for="emailconfirm">Confirm Email Address:</label>
                            <input type="email" class="form-control" id="emailconfirm" name="emailconfirm" value="" data-parsley-required="true" data-parsley-error-message="Please confirm your email address" data-parsley-id="0373"><ul class="parsley-errors-list" id="parsley-id-0373"></ul>
                        </div>
                        <div class="form-group">
                            <label for="homephone">Home Phone:</label>
                            <input type="text" maxlength="20" class="form-control" id="homephone" name="homephone" value="" data-parsley-required="true" data-parsley-error-message="Please enter a UK landline number" data-parsley-id="3750"><ul class="parsley-errors-list" id="parsley-id-3750"></ul>
                        </div>
                        <div class="form-group">
                            <label for="mobilephone">Mobile Phone:</label>
                            <input type="text" maxlength="20" class="form-control" id="mobilephone" name="mobilephone" value="" data-parsley-required="true" data-parsley-error-message="Please enter your mobile telephone number" data-parsley-id="2165"><ul class="parsley-errors-list" id="parsley-id-2165"></ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6"><br /><br />
                        <a href="#" target="_blank">Applying in the name of a company?</a>
                    </div>
                    <div class="col-xs-12 col-md-6"><input type="submit" class="continue" value="" /></div>
                </div>
            </form>
        </div>
    </div>
    <?php
}

function minibond_registration_step2() {
    ?>
    <div class="row registration-container step2">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">REGISTER YOUR ACCOUNT</h1>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <img src="<?php echo plugins_url( 'img/step2.png', __FILE__ ) ?>" alt="Registration Steps 2" class="register-steps pull-right" />
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title" style="padding:12px 0px;">YOUR ADDRESS</h2>
            <span>Please provide us with your address so that we may electronically verify your identity.</span>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
        <form method="post" data-parsley-validate="" role="form" novalidate="" class="step2-form">
            <div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="form-group">
					<label for="housenumber">House Name/Number:</label>
					<input type="text" class="form-control" id="housenumber" name="housenumber" data-parsley-required="true" data-parsley-error-message="Please enter a house number" value="" data-parsley-id="5351"><ul class="parsley-errors-list" id="parsley-id-5351"></ul>
				</div>
				<div class="form-group">
					<label for="postcode">Postcode:</label>
					<div class="controls form-inline postcodelookup">
				    	<input type="text" class="form-control" id="postcode" name="postcode" data-parsley-required="true" data-parsley-error-message="Please enter your postcode" data-parsley-errors-container="#postcodeerror" value="" data-parsley-id="8805">
				    	<input type="button" id="findaddress" class="btn btn-default" value="Find Address">
				    </div>
				    <div id="postcodeerror"><ul class="parsley-errors-list" id="parsley-id-8805"></ul></div>
				</div>
				<div class="form-group">
					<label for="street">Street Name:</label>
				    <input type="text" class="form-control" id="street" name="street" data-parsley-required="true" data-parsley-error-message="Please enter a street name" value="" data-parsley-id="9340"><ul class="parsley-errors-list" id="parsley-id-9340"></ul>
				</div>
				<div class="form-group">
					<label for="city">Town/City:</label>
				    <input type="text" class="form-control" id="city" name="city" data-parsley-required="true" data-parsley-error-message="Please enter a town/city" value="" data-parsley-id="0316"><ul class="parsley-errors-list" id="parsley-id-0316"></ul>
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="form-group">
					<label for="county">County:</label>
					<input type="text" class="form-control" id="county" name="county" data-parsley-required="true" data-parsley-error-message="Please enter a county" value="" data-parsley-id="6266"><ul class="parsley-errors-list" id="parsley-id-6266"></ul>
				</div>
				<div class="form-group">
					<label for="addresscountry">Country:</label>
				    	<select id="addresscountry" data-parsley-required="true" class="form-control" name="addresscountry" data-parsley-id="2038">
				    	<option value="305">Afghanistan</option>
				    	<option value="436">Aland Islands</option>
				    	<option value="327">Albania</option>
				    	<option value="353">Algeria</option>
				    	<option value="476">American Samoa</option>
				    	<option value="437">Andorra</option>
				    	<option value="357">Angola</option>
				    	<option value="451">Anguilla</option>
				    	<option value="449">Antarctica</option>
				    	<option value="425">Antigua and Barbuda</option>
				    	<option value="298">Argentina</option>
				    	<option value="317">Armenia</option>
				    	<option value="450">Aruba</option>
				    	<option value="484">Asia/Pacific Region</option>
				    	<option value="248">Australia</option>
				    	<option value="266">Austria</option>
				    	<option value="343">Azerbaijan</option>
				    	<option value="293">Bahamas</option>
				    	<option value="379">Bahrain</option>
				    	<option value="300">Bangladesh</option>
				    	<option value="410">Barbados</option>
				    	<option value="332">Belarus</option>
				    	<option value="322">Belgium</option>
				    	<option value="422">Belize</option>
				    	<option value="401">Benin</option>
				    	<option value="283">Bermuda</option>
				    	<option value="423">Bhutan</option>
				    	<option value="286">Bolivia</option>
				    	<option value="340">Bosnia and Herzegovina</option>
				    	<option value="439">Botswana</option>
				    	<option value="477">Bouvet Island</option>
				    	<option value="347">Brazil</option>
				    	<option value="465">British Indian Ocean Territory</option>
				    	<option value="391">Brunei Darussalam</option>
				    	<option value="325">Bulgaria</option>
				    	<option value="396">Burkina Faso</option>
				    	<option value="421">Burundi</option>
				    	<option value="302">Cambodia</option>
				    	<option value="377">Cameroon</option>
				    	<option value="281">Canada</option>
				    	<option value="420">Cape Verde</option>
				    	<option value="446">Cayman Islands</option>
				    	<option value="418">Central African Republic</option>
				    	<option value="399">Chad</option>
				    	<option value="296">Chile</option>
				    	<option value="249">China</option>
				    	<option value="463">Christmas Island</option>
				    	<option value="478">Cocos (Keeling) Islands</option>
				    	<option value="351">Colombia</option>
				    	<option value="443">Comoros</option>
				    	<option value="392">Congo</option>
				    	<option value="389">Congo, The Democratic Republic of the</option>
				    	<option value="468">Cook Islands</option>
				    	<option value="370">Costa Rica</option>
				    	<option value="376">Cote D'Ivoire</option>
				    	<option value="339">Croatia</option>
				    	<option value="445">Cuba</option>
				    	<option value="328">Cyprus</option>
				    	<option value="272">Czech Republic</option>
				    	<option value="277">Denmark</option>
				    	<option value="424">Djibouti</option>
				    	<option value="299">Dominica</option>
				    	<option value="362">Dominican Republic</option>
				    	<option value="360">Ecuador</option>
				    	<option value="352">Egypt</option>
				    	<option value="378">El Salvador</option>
				    	<option value="386">Equatorial Guinea</option>
				    	<option value="416">Eritrea</option>
				    	<option value="331">Estonia</option>
				    	<option value="372">Ethiopia</option>
				    	<option value="260">Europe</option>
				    	<option value="479">Falkland Islands (Malvinas)</option>
				    	<option value="429">Faroe Islands</option>
				    	<option value="306">Fiji</option>
				    	<option value="315">Finland</option>
				    	<option value="259">France</option>
				    	<option value="480">French Guiana</option>
				    	<option value="457">French Polynesia</option>
				    	<option value="472">French Southern Territories</option>
				    	<option value="390">Gabon</option>
				    	<option value="426">Gambia</option>
				    	<option value="342">Georgia</option>
				    	<option value="261">Germany</option>
				    	<option value="381">Ghana</option>
				    	<option value="430">Gibraltar</option>
				    	<option value="264">Greece</option>
				    	<option value="431">Greenland</option>
				    	<option value="453">Grenada</option>
				    	<option value="481">Guadeloupe</option>
				    	<option value="466">Guam</option>
				    	<option value="365">Guatemala</option>
				    	<option value="432">Guernsey</option>
				    	<option value="409">Guinea</option>
				    	<option value="483">Guinea-Bissau</option>
				    	<option value="417">Guyana</option>
				    	<option value="400">Haiti</option>
				    	<option value="433">Holy See (Vatican City State)</option>
				    	<option value="385">Honduras</option>
				    	<option value="255">Hong Kong</option>
				    	<option value="330">Hungary</option>
				    	<option value="326">Iceland</option>
				    	<option value="252">India</option>
				    	<option value="289">Indonesia</option>
				    	<option value="278">Iran, Islamic Republic of</option>
				    	<option value="334">Iraq</option>
				    	<option value="316">Ireland</option>
				    	<option value="344">Isle of Man</option>
				    	<option value="270">Israel</option>
				    	<option value="263">Italy</option>
				    	<option value="387">Jamaica</option>
				    	<option value="250">Japan</option>
				    	<option value="345">Jersey</option>
				    	<option value="374">Jordan</option>
				    	<option value="274">Kazakhstan</option>
				    	<option value="371">Kenya</option>
				    	<option value="469">Kiribati</option>
				    	<option value="488">Korea, Democratic People's Republic of</option>
				    	<option value="254">Korea, Republic of</option>
				    	<option value="355">Kuwait</option>
				    	<option value="335">Kyrgyzstan</option>
				    	<option value="464">Lao People's Democratic Republic</option>
				    	<option value="333">Latvia</option>
				    	<option value="367">Lebanon</option>
				    	<option value="403">Lesotho</option>
				    	<option value="427">Liberia</option>
				    	<option value="358">Libyan Arab Jamahiriya</option>
				    	<option value="320">Liechtenstein</option>
				    	<option value="338">Lithuania</option>
				    	<option value="329">Luxembourg</option>
				    	<option value="303">Macau</option>
				    	<option value="313">Macedonia</option>
				    	<option value="397">Madagascar</option>
				    	<option value="408">Malawi</option>
				    	<option value="253">Malaysia</option>
				    	<option value="304">Maldives</option>
				    	<option value="395">Mali</option>
				    	<option value="398">Malta</option>
				    	<option value="448">Marshall Islands</option>
				    	<option value="473">Martinique</option>
				    	<option value="412">Mauritania</option>
				    	<option value="394">Mauritius</option>
				    	<option value="474">Mayotte</option>
				    	<option value="282">Mexico</option>
				    	<option value="461">Micronesia, Federated States of</option>
				    	<option value="336">Moldova, Republic of</option>
				    	<option value="434">Monaco</option>
				    	<option value="307">Mongolia</option>
				    	<option value="411">Montenegro</option>
				    	<option value="454">Montserrat</option>
				    	<option value="356">Morocco</option>
				    	<option value="440">Mozambique</option>
				    	<option value="369">Myanmar</option>
				    	<option value="393">Namibia</option>
				    	<option value="493">Nauru</option>
				    	<option value="290">Nepal</option>
				    	<option value="268">Netherlands</option>
				    	<option value="438">Netherlands Antilles</option>
				    	<option value="297">New Caledonia</option>
				    	<option value="287">New Zealand</option>
				    	<option value="402">Nicaragua</option>
				    	<option value="405">Niger</option>
				    	<option value="323">Nigeria</option>
				    	<option value="470">Niue</option>
				    	<option value="475">Norfolk Island</option>
				    	<option value="486">Northern Mariana Islands</option>
				    	<option value="279">Norway</option>
				    	<option value="361">Oman</option>
				    	<option value="292">Pakistan</option>
				    	<option value="487">Palau</option>
				    	<option value="324">Palestinian Territory, Occupied</option>
				    	<option value="373">Panama</option>
				    	<option value="291">Papua New Guinea</option>
				    	<option value="382">Paraguay</option>
				    	<option value="354">Peru</option>
				    	<option value="257">Philippines</option>
				    	<option value="309">Poland</option>
				    	<option value="275">Portugal</option>
				    	<option value="284">Puerto Rico</option>
				    	<option value="321">Qatar</option>
				    	<option value="444">Reunion</option>
				    	<option value="310">Romania</option>
				    	<option value="273">Russian Federation</option>
				    	<option value="404">Rwanda</option>
				    	<option value="460">Saint Helena</option>
				    	<option value="452">Saint Kitts and Nevis</option>
				    	<option value="294">Saint Lucia</option>
				    	<option value="490">Saint Martin</option>
				    	<option value="489">Saint Pierre and Miquelon</option>
				    	<option value="295">Saint Vincent and the Grenadines</option>
				    	<option value="467">Samoa</option>
				    	<option value="346">San Marino</option>
				    	<option value="492">Sao Tome and Principe</option>
				    	<option value="442">Satellite Provider</option>
				    	<option value="276">Saudi Arabia</option>
				    	<option value="388">Senegal</option>
				    	<option value="368">Serbia</option>
				    	<option value="428">Seychelles</option>
				    	<option value="419">Sierra Leone</option>
				    	<option value="288">Singapore</option>
				    	<option value="312">Slovakia</option>
				    	<option value="318">Slovenia</option>
				    	<option value="458">Solomon Islands</option>
				    	<option value="441">Somalia</option>
				    	<option value="349">South Africa</option>
				    	<option value="482">South Georgia and the South Sandwich Islands</option>
				    	<option value="265">Spain</option>
				    	<option value="363">Sri Lanka</option>
				    	<option value="359">Sudan</option>
				    	<option value="413">Suriname</option>
				    	<option value="348">Svalbard and Jan Mayen</option>
				    	<option value="414">Swaziland</option>
				    	<option value="262">Sweden</option>
				    	<option value="314">Switzerland</option>
				    	<option value="319">Syrian Arab Republic</option>
				    	<option value="256">Taiwan</option>
				    	<option value="406">Tajikistan</option>
				    	<option value="375">Tanzania, United Republic of</option>
				    	<option value="251">Thailand</option>
				    	<option value="491">Timor-Leste</option>
				    	<option value="415">Togo</option>
				    	<option value="301">Tokelau</option>
				    	<option value="471">Tonga</option>
				    	<option value="380">Trinidad and Tobago</option>
				    	<option value="364">Tunisia</option>
				    	<option value="311">Turkey</option>
				    	<option value="435">Turkmenistan</option>
				    	<option value="455">Turks and Caicos Islands</option>
				    	<option value="456">Tuvalu</option>
				    	<option value="383">Uganda</option>
				    	<option value="271">Ukraine</option>
				    	<option value="269">United Arab Emirates</option>
				    	<option value="267" selected="selected">United Kingdom</option>
				    	<option value="280">United States</option>
				    	<option value="485">United States Minor Outlying Islands</option>
				    	<option value="366">Uruguay</option>
				    	<option value="341">Uzbekistan</option>
				    	<option value="459">Vanuatu</option>
				    	<option value="350">Venezuela</option>
				    	<option value="258">Vietnam</option>
				    	<option value="447">Virgin Islands, British</option>
				    	<option value="285">Virgin Islands, U.S.</option>
				    	<option value="308">Wallis and Futuna</option>
				    	<option value="462">Western Sahara</option>
				    	<option value="337">Yemen</option>
				    	<option value="384">Zambia</option>
				    	<option value="407">Zimbabwe</option>
			    	</select><ul class="parsley-errors-list" id="parsley-id-2038"></ul>
				</div>
				<div class="form-group">
					<label for="addressyears">How Long Have You Lived Here:</label>
					<table border="0" class="multiselect">
					<tbody><tr><td>
					    <select id="addressyears" name="addressyears" class="form-control" data-parsley-required="true" data-parsley-error-message="Please enter how long you have lived at this address" data-parsley-errors-container="#timeerror" data-parsley-id="0883">
					    	<option value="">Years</option>
					    	<option value="0">0 Years</option>
					    	<option value="1">1 Year</option>
					    	<option value="2">2 Years</option>
					    	<option value="3">3 Years</option>
					    	<option value="4">4 Years</option>
					    	<option value="5">5 Years</option>
					    	<option value="6">6 Years</option>
					    	<option value="7">7 Years</option>
					    	<option value="8">8 Years</option>
					    	<option value="9">9 Years</option>
					    	<option value="10">10+ Years</option>
					    </select>
					</td><td>
					    <select id="addressmonths" name="addressmonths" class="form-control" data-parsley-id="5957">
					    	<option value="0">0 Months</option>
					    	<option value="1">1 Month</option>
					    	<option value="2">2 Months</option>
					    	<option value="3">3 Months</option>
					    	<option value="4">4 Months</option>
					    	<option value="5">5 Months</option>
					    	<option value="6">6 Months</option>
					    	<option value="7">7 Months</option>
					    	<option value="8">8 Months</option>
					    	<option value="9">9 Months</option>
					    	<option value="10">11 Months</option>
					    </select><ul class="parsley-errors-list" id="parsley-id-5957"></ul>
					</td></tr>
					<tr><td colspan="2">
					</td></tr></tbody></table>
					<div id="timeerror"><ul class="parsley-errors-list" id="parsley-id-0883"></ul></div>
				</div>
			</div>
		</div>
		<input type="submit" class="continue" value="" />
		</form>
        </div>
    </div>
    <?php
}

function minibond_registration_step3() {
    ?>
    <div class="row registration-container step3">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">REGISTER YOUR ACCOUNT</h1>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <img src="<?php echo plugins_url( 'img/step3.png', __FILE__ ) ?>" alt="Registration Steps 3" class="register-steps pull-right" />
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title" style="padding:12px 0px;">ACCOUNT SECURITY</h2>
            <span>We'll ask for this information every time you sign in, to be sure it's you.</span>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" data-parsley-validate="" role="form" novalidate="" class="step3-form">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="" data-parsley-minlength="6" data-parsley-pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$" data-parsley-error-message="Your password must: <br>
                            Be atleast 6 characters<br>
                            Contain upper and lowercase characters<br>
                            Contain characters and numbers" required="" maxlength="150" data-parsley-id="3242"><ul class="parsley-errors-list" id="parsley-id-3242"></ul>
                        </div>
                        <div class="form-group">
                            <label for="passwordconfirm">Confirm Password:</label>
                            <input type="password" class="form-control" id="passwordconfirm" size="2" value="" name="passwordconfirm" data-parsley-equalto="#password" data-parsley-error-message="Passwords do not match" required="" maxlength="150" data-parsley-id="1634"><ul class="parsley-errors-list" id="parsley-id-1634"></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="securityquestion">Security Question:</label>
                            <input type="text" class="form-control" id="securityquestion" name="securityquestion" value="" data-parsley-required="true" data-parsley-error-message="Please enter a security question" maxlength="250" data-parsley-id="6793"><ul class="parsley-errors-list" id="parsley-id-6793"></ul>
                        </div>
                        <div class="form-group">
                            <label for="securityanswer">Security Answer:</label>
                            <input type="text" class="form-control" id="securityanswer" name="securityanswer" value="" data-parsley-required="true" data-parsley-error-message="Please enter an answer to your security question" maxlength="250" data-parsley-id="5797"><ul class="parsley-errors-list" id="parsley-id-5797"></ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 agreeterms">
                        <h2 class="smaller form-title">CUSTOMER AGREEMENT</h2>
                        <table border="0" class="agreeterms">
                            <tbody><tr><td><input type="checkbox" id="agreelender" data-parsley-required="true" data-parsley-error-message="Please agree to the terms of the Lender Agreement" data-parsley-errors-container="#agreelendererror" data-parsley-multiple="agreelender" data-parsley-id="5504"></td><td>I confirm that I agree to the <a href="#" target="_blank">Lender Agreement</a>.</td></tr>
                            <tr><td colspan="2"><div id="agreelendererror"><ul class="parsley-errors-list" id="parsley-id-multiple-agreelender"></ul></div></td></tr>
                            <tr><td><input type="checkbox" id="agreeother" data-parsley-required="true" data-parsley-error-message="Please agree to the Privacy Policy, Website Terms of Use" data-parsley-errors-container="#agreeothererror" data-parsley-multiple="agreeother" data-parsley-id="5471"></td><td>I confirm that I have read the <a href="#" target="_blank">Privacy Policy</a>, <a href="#" target="_blank">Website Terms of Use</a> and <a href="#" target="_blank">Cookie Policy</a>.</td></tr>
                            <tr><td colspan="2"><div id="agreeothererror"><ul class="parsley-errors-list" id="parsley-id-multiple-agreeother"></ul></div></td></tr>
                        </tbody></table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 financiainformation">
                        <h2 class="smaller form-title" style="padding:12px 0px;">FINANCIAL INFORMATION</h2>
                        <span>We are required to understand your financial situation for the purposes of financial crime prevention.</span>
                        <table border="0" class="agreeterms">
                            <tbody><tr>
                            <td style="width: 350px;">
                            <span>Please confirm your approximate net worth</span>
                            <span style="display: block; font-size: 12px;">(excluding your primary residence)</span>
                            </td>
                            <td>
                            <select name="networth" class="form-control" id="networth" data-parsley-required="true" data-parsley-error-message="Please select a valid approximate net worth" data-parsley-errors-container="#networtherror" style="display: none;" data-parsley-id="9018">
                                <option value="">Select</option>
                                <option value="1">Under £35,000</option>
                                <option value="2">£35,000 - £100,000</option>
                                <option value="3">£100,000 - £250,000</option>
                                <option value="4">£250,000 - £500,000</option>
                                <option value="5">£500,000 +</option>
                            </select></td>
                            </tr>
                            <tr><td><div id="networtherror"><ul class="parsley-errors-list" id="parsley-id-9018"></ul></div></td></tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            <td>
                            <span>Please confirm the source of the funds that</span>
                            <span style="display: block;">you wish to invest</span>
                            </td>
                            <td>
                            
                            <select name="fundsource" class="form-control" id="fundsource" data-parsley-required="true" data-parsley-error-message="Please select a valid fund source" data-parsley-errors-container="#fundsourceerror" data-parsley-id="4768">
                                <option value="">Select</option>
                                <option value="1" displayother="0">Savings from employment income</option>
                                <option value="2" displayother="0">Profits from your business</option>
                                <option value="3" displayother="0">Retirement income</option>
                                <option value="4" displayother="0">Pension fund encashment</option>
                                <option value="5" displayother="0">Maturing investments / sale of investments</option>
                                <option value="6" displayother="0">Fixed deposit savings</option>
                                <option value="7" displayother="0">Property sale</option>
                                <option value="8" displayother="0">Company sale or sale of an interest in company </option>
                                <option value="9" displayother="0">Inheritance</option>
                                <option value="10" displayother="0">Loan</option>
                                <option value="11" displayother="0">Divorce settlement</option>
                                <option value="12" displayother="0">Gift</option>
                                <option value="13" displayother="1">Other income sources (please state)</option>
                            </select>
                            
                            </td>
                            </tr>
                            <tr><td><div id="fundsourceerror"><ul class="parsley-errors-list" id="parsley-id-4768"></ul></div></td></tr>
                            <tr style="display: none;" class="otherfundsourcerows"><td>&nbsp;</td></tr>
                            <tr style="display: none;" class="otherfundsourcerows">
                            <td>Other Fund Source</td>
                            <td><input type="text" name="otherfundsource" id="otherfundsource" class="form-control" style="width: 350px;" data-parsley-otherfundsourceconditional="" data-parsley-validate-if-empty="" data-parsley-otherfundsourceconditional-message="Please enter a valid other fund source" data-parsley-errors-container="#otherfundsourceerror" data-parsley-id="0848"></td>
                            </tr>
                            <tr><td><div id="otherfundsourceerror"><ul class="parsley-errors-list" id="parsley-id-0848"></ul></div></td></tr>
                        </tbody></table>
                    </div>
                </div>
                <input type="submit" class="continue" value="" />
                </form>
        </div>
    </div>
    <?php
}

function minibond_registration_step4() {
    ?>
    <div class="row registration-container step4">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">REGISTER YOUR ACCOUNT</h1>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <img src="<?php echo plugins_url( 'img/step4.png', __FILE__ ) ?>" alt="Registration Steps 4" class="register-steps pull-right" />
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title" style="padding:12px 0px;">Registration Complete</h2>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" data-parsley-validate="" role="form" novalidate="" class="step4-form">
                <h2 class="smaller form-title">Thank you, your registration was successful. Please login into your account.</h2>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Username / Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="" data-parsley-required="true" data-parsley-error-message="Please enter your email address" data-parsley-id="5722"><ul class="parsley-errors-list" id="parsley-id-5722"></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="" data-parsley-minlength="6" data-parsley-pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$" data-parsley-error-message="Your password must: <br>
                            Be atleast 6 characters<br>
                            Contain upper and lowercase characters<br>
                            Contain characters and numbers" required="" maxlength="150" data-parsley-id="3242"><ul class="parsley-errors-list" id="parsley-id-3242"></ul>
                        </div>
                    </div>
                </div>
                <input type="submit" class="continue" value="" />
            </form>
        </div>
    </div>
    <?php
}