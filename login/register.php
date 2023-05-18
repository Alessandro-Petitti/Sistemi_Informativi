<?php
require_once 'funzionilogin.php';

// Verifica se è stato inviato il form di registrazione
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica la correttezza della password
  $check_pass = password_is_same($_POST['password'], $_POST['re_password']);
  if ($check_pass === false) {
    $error = "Le password inserite non sono uguali";
  } else {
    $user_reg = registra_utente($_POST['username'], $_POST['password']);
    // Se l'utente è stato inserito nel database, reindirizza alla pagina di login
    if ($user_reg === true) {
      // Rimuovi tutte le variabili di sessione
      session_unset();

      // Distruggi la sessione
      session_destroy();
      header('Location: login.php');
      exit;
    } else {
      $error = "Errore del server";
    }
  }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
  <table Width="100%">
<tr>
  <td colspan="2 "align="center"> <h1>Portale Registrazione</h1>
    <p> Sei già registrato? Effettua il <a href="login.php">Login</a></p>
  </td>
</tr>
<form action="login.php" method="post">

<tr>
  <td colspan="2" align="center">
    <label for="nome">Nome*:</label> <br>
    <input type="text" name="nome"  placeholder="Nome" required>
    <input type="text" name="cognome" placeholder="Cognome" required>
  </td>

</tr>
<tr>
  <td colspan="2" align="center">
    <br>
    <label for="start">Data di nascita*:</label>

    <input type="date" id="start" name="trip-start"
           value="2023-05-18"
           min="1901-01-01" max="2099-12-31" required>
  </td>
</tr>
<tr>
  <td width="50%"; align="center">
    <?php if(isset($error)): ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username*:</label>
        <input type="text" id="username" name="username" required><br><br></td>
        <td width="50%"; align="center">
        <label for="email">E-mail*: </label>
        <input type"email" id="email" name="email" required></td>
</tr>
<tr>
  <td width="50%"; align="center">
    <label for="password">Password*:</label>
    <input type="password" id="password" name="password" required><br><br>
  </td>
  <td Width="50%"; align="center">
    <label for="re_password">Password-Re*:</label>
    <input type="password" id="re_password" name="re_password" required><br><br>
  </td>
</tr>
<tr>
  <td Width="50%" align="center">
    <label for="phone">Numero di Telefono:</label>
  <input type="tel" id="phone" name="phone"  value="+39" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"></td>
</tr>

<tr>
  <td colspan="2" align="center">
    <label for="nazione">Nazionalità*:</label>
    <select name="nazione">
       <option value="US">United States</option>
       <option value="CA">Canada</option>
       <option value="AF">Afghanistan</option>
       <option value="AL">Albania</option>
       <option value="DZ">Algeria</option>
       <option value="AS">American Samoa</option>
       <option value="AD">Andorra</option>
       <option value="AO">Angola</option>
       <option value="AI">Anguilla</option>
       <option value="AQ">Antarctica</option>
       <option value="AG">Antigua and Barbuda</option>
       <option value="AR">Argentina</option>
       <option value="AM">Armenia</option>
       <option value="AW">Aruba</option>
       <option value="AU">Australia</option>
       <option value="AT">Austria</option>
       <option value="AZ">Azerbaijan</option>
       <option value="BS">Bahamas</option>
       <option value="BH">Bahrain</option>
       <option value="BD">Bangladesh</option>
       <option value="BB">Barbados</option>
       <option value="BY">Belarus</option>
       <option value="BE">Belgium</option>
       <option value="BZ">Belize</option>
       <option value="BJ">Benin</option>
       <option value="BM">Bermuda</option>
       <option value="BT">Bhutan</option>
       <option value="BO">Bolivia</option>
       <option value="BA">Bosnia and Herzegovina</option>
       <option value="BW">Botswana</option>
       <option value="BV">Bouvet Island</option>
       <option value="BR">Brazil</option>
       <option value="IO">British Indian Ocean Territory</option>
       <option value="BN">Brunei Darussalam</option>
       <option value="BG">Bulgaria</option>
       <option value="BF">Burkina Faso</option>
       <option value="BI">Burundi</option>
       <option value="KH">Cambodia</option>
       <option value="CM">Cameroon</option>
       <option value="CV">Cape Verde</option>
       <option value="KY">Cayman Islands</option>
       <option value="CF">Central African Republic</option>
       <option value="TD">Chad</option>
       <option value="CL">Chile</option>
       <option value="CN">China</option>
       <option value="CX">Christmas Island</option>
       <option value="CC">Cocos (Keeling) Islands</option>
       <option value="CO">Colombia</option>
       <option value="KM">Comoros</option>
       <option value="CG">Congo</option>
       <option value="CD">Congo (Democratic Republic)</option>
       <option value="CK">Cook Islands</option>
       <option value="CR">Costa Rica</option>
       <option value="HR">Croatia</option>
       <option value="CU">Cuba</option>
       <option value="CY">Cyprus</option>
       <option value="CZ">Czech Republic</option>
       <option value="DK">Denmark</option>
       <option value="DJ">Djibouti</option>
       <option value="DM">Dominica</option>
       <option value="DO">Dominican Republic</option>
       <option value="TP">East Timor</option>
       <option value="EC">Ecuador</option>
       <option value="EG">Egypt</option>
       <option value="SV">El Salvador</option>
       <option value="GQ">Equatorial Guinea</option>
       <option value="ER">Eritrea</option>
       <option value="EE">Estonia</option>
       <option value="ET">Ethiopia</option>
       <option value="FK">Falkland Islands</option>
       <option value="FO">Faroe Islands</option>
       <option value="FJ">Fiji</option>
       <option value="FI">Finland</option>
       <option value="FR">France</option>
       <option value="FX">France (European Territory)</option>
       <option value="GF">French Guiana</option>
       <option value="TF">French Southern Territories</option>
       <option value="GA">Gabon</option>
       <option value="GM">Gambia</option>
       <option value="GE">Georgia</option>
       <option value="DE">Germany</option>
       <option value="GH">Ghana</option>
       <option value="GI">Gibraltar</option>
       <option value="GR">Greece</option>
       <option value="GL">Greenland</option>
       <option value="GD">Grenada</option>
       <option value="GP">Guadeloupe</option>
       <option value="GU">Guam</option>
       <option value="GT">Guatemala</option>
       <option value="GN">Guinea</option>
       <option value="GW">Guinea Bissau</option>
       <option value="GY">Guyana</option>
       <option value="HT">Haiti</option>
       <option value="HM">Heard and McDonald Islands</option>
       <option value="VA">Holy See (Vatican)</option>
       <option value="HN">Honduras</option>
       <option value="HK">Hong Kong</option>
       <option value="HU">Hungary</option>
       <option value="IS">Iceland</option>
       <option value="IN">India</option>
       <option value="ID">Indonesia</option>
       <option value="IR">Iran</option>
       <option value="IQ">Iraq</option>
       <option value="IE">Ireland</option>
       <option value="IL">Israel</option>
       <option value="IT"selected="selected">Italy</option>
       <option value="CI">Cote D&rsquo;Ivoire</option>
       <option value="JM">Jamaica</option>
       <option value="JP">Japan</option>
       <option value="JO">Jordan</option>
       <option value="KZ">Kazakhstan</option>
       <option value="KE">Kenya</option>
       <option value="KI">Kiribati</option>
       <option value="KW">Kuwait</option>
       <option value="KG">Kyrgyzstan</option>
       <option value="LA">Laos</option>
       <option value="LV">Latvia</option>
       <option value="LB">Lebanon</option>
       <option value="LS">Lesotho</option>
       <option value="LR">Liberia</option>
       <option value="LY">Libya</option>
       <option value="LI">Liechtenstein</option>
       <option value="LT">Lithuania</option>
       <option value="LU">Luxembourg</option>
       <option value="MO">Macau</option>
       <option value="MK">Macedonia</option>
       <option value="MG">Madagascar</option>
       <option value="MW">Malawi</option>
       <option value="MY">Malaysia</option>
       <option value="MV">Maldives</option>
       <option value="ML">Mali</option>
       <option value="MT">Malta</option>
       <option value="MH">Marshall Islands</option>
       <option value="MQ">Martinique</option>
       <option value="MR">Mauritania</option>
       <option value="MU">Mauritius</option>
       <option value="YT">Mayotte</option>
       <option value="MX">Mexico</option>
       <option value="FM">Micronesia</option>
       <option value="MD">Moldova</option>
       <option value="MC">Monaco</option>
       <option value="MN">Mongolia</option>
       <option value="ME">Montenegro</option>
       <option value="MS">Montserrat</option>
       <option value="MA">Morocco</option>
       <option value="MZ">Mozambique</option>
       <option value="MM">Myanmar</option>
       <option value="NA">Namibia</option>
       <option value="NR">Nauru</option>
       <option value="NP">Nepal</option>
       <option value="NL">Netherlands</option>
       <option value="AN">Netherlands Antilles</option>
       <option value="NC">New Caledonia</option>
       <option value="NZ">New Zealand</option>
       <option value="NI">Nicaragua</option>
       <option value="NE">Niger</option>
       <option value="NG">Nigeria</option>
       <option value="NU">Niue</option>
       <option value="NF">Norfolk Island</option>
       <option value="KP">North Korea</option>
       <option value="MP">Northern Mariana Islands</option>
       <option value="NO">Norway</option>
       <option value="OM">Oman</option>
       <option value="PK">Pakistan</option>
       <option value="PW">Palau</option>
       <option value="PS">Palestinian Territory</option>
       <option value="PA">Panama</option>
       <option value="PG">Papua New Guinea</option>
       <option value="PY">Paraguay</option>
       <option value="PE">Peru</option>
       <option value="PH">Philippines</option>
       <option value="PN">Pitcairn</option>
       <option value="PL">Poland</option>
       <option value="PF">Polynesia</option>
       <option value="PT">Portugal</option>
       <option value="PR">Puerto Rico</option>
       <option value="QA">Qatar</option>
       <option value="RE">Reunion</option>
       <option value="RO">Romania</option>
       <option value="RU">Russian Federation</option>
       <option value="RW">Rwanda</option>
       <option value="GS">S. Georgia &amp; S. Sandwich Isls.</option>
       <option value="SH">Saint Helena</option>
       <option value="KN">Saint Kitts &amp; Nevis Anguilla</option>
       <option value="LC">Saint Lucia</option>
       <option value="PM">Saint Pierre and Miquelon</option>
       <option value="VC">Saint Vincent &amp; Grenadines</option>
       <option value="WS">Samoa</option>
       <option value="SM">San Marino</option>
       <option value="ST">Sao Tome and Principe</option>
       <option value="SA">Saudi Arabia</option>
       <option value="SN">Senegal</option>
       <option value="RS">Serbia</option>
       <option value="SC">Seychelles</option>
       <option value="SL">Sierra Leone</option>
       <option value="SG">Singapore</option>
       <option value="SK">Slovakia</option>
       <option value="SI">Slovenia</option>
       <option value="SB">Solomon Islands</option>
       <option value="SO">Somalia</option>
       <option value="ZA">South Africa</option>
       <option value="KR">South Korea</option>
       <option value="ES">Spain</option>
       <option value="LK">Sri Lanka</option>
       <option value="SD">Sudan</option>
       <option value="SR">Suriname</option>
       <option value="SZ">Swaziland</option>
       <option value="SE">Sweden</option>
       <option value="CH">Switzerland</option>
       <option value="SY">Syrian Arab Republic</option>
       <option value="TW">Taiwan</option>
       <option value="TJ">Tajikistan</option>
       <option value="TZ">Tanzania</option>
       <option value="TH">Thailand</option>
       <option value="TG">Togo</option>
       <option value="TK">Tokelau</option>
       <option value="TO">Tonga</option>
       <option value="TT">Trinidad and Tobago</option>
       <option value="TN">Tunisia</option>
       <option value="TR">Turkey</option>
       <option value="TM">Turkmenistan</option>
       <option value="TC">Turks and Caicos Islands</option>
       <option value="TV">Tuvalu</option>
       <option value="UG">Uganda</option>
       <option value="UA">Ukraine</option>
       <option value="AE">United Arab Emirates</option>
       <option value="GB">United Kingdom</option>
       <option value="UY">Uruguay</option>
       <option value="UM">USA Minor Outlying Islands</option>
       <option value="UZ">Uzbekistan</option>
       <option value="VU">Vanuatu</option>
       <option value="VE">Venezuela</option>
       <option value="VN">Vietnam</option>
       <option value="VG">Virgin Islands (British)</option>
       <option value="VI">Virgin Islands (USA)</option>
       <option value="WF">Wallis and Futuna Islands</option>
       <option value="EH">Western Sahara</option>
       <option value="YE">Yemen</option>
       <option value="ZR">Zaire</option>
       <option value="ZM">Zambia</option>
       <option value="ZW">Zimbabwe</option>
       </select>
  </td>
</tr>

<tr>
  <td Width="50%" align="center">
    <br>
    <label for="comuni">Seleziona comune di nascita*:</label>
    <?php
    include ("./comuni_class.php"); // to include the class file
    $obj = new Comuni;              // instance new object
    $obj ->drop_down('Province_of');     // print the drop down menu with the input name
    ?> </td>
  <td Width="50%" align="center">
    <br>
  <label for="province">Seleziona la provincia*:</label>
  <input type="text" name="province" placeholder="menù per province">
</td>
</tr>
<tr>
  <td Width="50%" align="center"> <br>
<label for="indirizzo">Indirizzo:</label>
<input type="text" name="indirizzo" value="Via/le">
  </td>
  <td Width="50%" align="center"> <br>
    <label for="cap">CAP:</label>
    <input type="text" name="cap" placeholder="XXXXX">
  </td>
</tr>
<tr>
  <td colspan="2" align="center">
    <form action="submit.php" method="post">
      <p><img src="/Applications/MAMP/htdocs/captcha.php"></p>
    <label>CAPTCHA: <input type="text" name="captcha" /><br><br</td>
        </form>
  </tr>
<tr>
  <td colspan="2" align="center"> <br>
    <p style="color: red">I campi contrassegnati da "*" devono essere obbligatoriamente compilati</p>
      <input type="submit" value="Registrati"> <br>
  </td>
</tr>
</form>
    </table>
</body>
</html>
