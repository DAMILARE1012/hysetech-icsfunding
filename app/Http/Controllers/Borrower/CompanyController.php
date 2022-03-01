<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Borrower;
use App\Models\Business;
use App\Models\Document;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    private $countries = array(
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas the',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island (Bouvetoya)',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
        'VG' => 'British Virgin Islands',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros the',
        'CD' => 'Congo',
        'CG' => 'Congo the',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote d\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FO' => 'Faroe Islands',
        'FK' => 'Falkland Islands (Malvinas)',
        'FJ' => 'Fiji the Fiji Islands',
        'FI' => 'Finland',
        'FR' => 'France, French Republic',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia the',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and McDonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KP' => 'Korea',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyz Republic',
        'LA' => 'Lao',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'AN' => 'Netherlands Antilles',
        'NL' => 'Netherlands the',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn Islands',
        'PL' => 'Poland',
        'PT' => 'Portugal, Portuguese Republic',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia (Slovak Republic)',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia, Somali Republic',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard & Jan Mayen Islands',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland, Swiss Confederation',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States of America',
        'UM' => 'United States Minor Outlying Islands',
        'VI' => 'United States Virgin Islands',
        'UY' => 'Uruguay, Eastern Republic of',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Vietnam',
        'WF' => 'Wallis and Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe'
    );

    public function index()
    {
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        return view('borrower.sections.company.index', [
            'title' => 'Company Profile',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'borrower' => $borrower
        ]);
    }

    public function personnel()
    {
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        return view('borrower.sections.company.personnel', [
            'title' => 'Company Profile',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'borrower' => $borrower
        ]);
    }

    public function documents()
    {
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        return view('borrower.sections.company.documents', [
            'title' => 'Company Profile',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'borrower' => $borrower
        ]);
    }

    public function uploadDocument()
    {
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        return view('borrower.sections.company.upload-document', [
            'title' => 'Company Profile',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'borrower' => $borrower
        ]);
    }

    public function storeDocument(Request $request)
    {
        $request->validate([
            'borrower_id' => 'required',
            'document_type' => 'required',
            'attachment' => 'required',
        ], [
            'borrower_id.required' => 'Please select a borrower',
        ]);
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        $document = new Document();
        $document->business_id = $borrower->business->id;
        $document->borrower_id = $request->borrower_id;
        $document->document_type = $request->document_type;
        $document->attachment = $request->attachment->store('borrower/' . $request->borrower_id . 'documents/', 'public');
        $document->save();

        return redirect()->route('borrower.company.documents')->with('success', 'Document uploaded');

    }

    public function destroyDocument(Document $document)
    {
        $document->delete();
        return redirect()->route('borrower.company.documents')->with('success', 'Document deleted');

    }

    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('borrower.company')->with('success', 'Company deleted');

    }

    public function newPersonnel()
    {
        return view('borrower.sections.company.add-personnel', [
            'title' => 'Company Profile',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'countries' => $this->countries,
        ]);
    }

    public function deletePersonnel(Borrower $borrower)
    {
        $borrower->delete();
        return redirect()->back()->with('success', 'Personnel deleted successfully');
    }

    public function personnelDetail(Borrower $borrower)
    {
        $borrower->loadMissing('documents');
        return view('borrower.sections.company.personnel-details', [
            'title' => 'Company',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'borrower' => $borrower,
        ]);
    }

    public function storePersonnel(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:borrowers,email',
            'mobile_number' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $loggedInBorrower = auth('borrower')->user();
        $loggedInBorrower->loadMissing('business');
        $borrower = new Borrower();
        $borrower->business_id = $loggedInBorrower->business->id;
        $borrower->first_name = $request->first_name;
        $borrower->last_name = $request->last_name;
        $borrower->email = $request->email;
        $borrower->password = Hash::make($request->password);
        $borrower->mobile_number = $request->mobile_number;
        $borrower->home_phone = $request->home_phone;
        $borrower->sms_phone = $request->sms_phone;
        $borrower->office_phone = $request->office_phone;
        $borrower->alternate_email = $request->alternate_email;
        $borrower->designation = $request->designation;
        $borrower->appointment_date = $request->appointment_date;
        $borrower->resignation_date = $request->resignation_date;
        $borrower->gender = $request->gender;
        $borrower->dob = $request->dob;
        if ($request->monthly_salary)
            $borrower->monthly_salary = $request->monthly_salary;
        $borrower->country = $request->country;
        $borrower->primary_account = $request->primary_account;
        if ($request->photo)
            $borrower->photo = $request->photo->store('borrowers/photos', 'public');
        $borrower->save();

        return redirect()->route('borrower.company.personnel')->with('success', 'Personnel added');
    }

    public function create()
    {
        $industries = Industry::whereActive(true)->get();
        $subIndustries = $industries->first()->subIndustries()->get();
        return view('borrower.sections.company.create', [
            'title' => 'New Company',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'industries' => $industries,
            'subIndustries' => $subIndustries,
            'countries' => $this->countries
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|unique:businesses,name',
            'registration_type' => 'required',
            'registration_number' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'country' => 'required',
            'incorporation_type' => 'required',
            'industry_id' => 'required',
            'sub_industry_id' => 'required',
            'email' => 'required',
            'office_phone' => 'required',
        ], [
            'business_name.required' => 'required*',
            'business_name.unique' => 'A business with this name has already been registered in the system',
            'registration_type.required' => 'required*',
            'registration_number.required' => 'required*',
            'address.required' => 'required*',
            'pincode.required' => 'required*',
            'country.required' => 'required*',
            'incorporation_type.required' => 'required*',
            'industry_id.required' => 'required*',
            'sub_industry_id.required' => 'required*',
            'email.required' => 'required*',
            'office_phone.required' => 'required*',
        ]);

        $business = new Business();
        $business->name = $request->business_name;
        $business->registration_type = $request->registration_type;
        $business->registration_number = $request->registration_number;
        $business->website = $request->website;
        $business->country = $request->country;
        $business->address = $request->address;
        $business->pincode = $request->pincode;
        $business->incorporation_type = $request->incorporation_type;
        $business->industry_id = $request->industry_id;
        $business->sub_industry_id = $request->sub_industry_id;
        $business->email = $request->email;
        $business->alternate_email = $request->alternate_email;
        $business->office_phone = $request->office_phone;
        $business->hand_phone = $request->hand_phone;
        $business->sms_phone = $request->sms_phone;
        $business->save();
        $borrower = auth('borrower')->user();
        $borrower->business_id = $business->id;
        $borrower->save();
        return redirect()->route('borrower.company');
    }

    public function edit(Business $business)
    {

        $industries = Industry::whereActive(true)->get();
        $subIndustries = $industries->first()->subIndustries()->get();
        return view('borrower.sections.company.edit', [
            'title' => 'Edit Company',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'industries' => $industries,
            'subIndustries' => $subIndustries,
            'countries' => $this->countries,
            'business' => $business
        ]);

    }

    public function update(Request $request, Business $business)
    {
        $request->validate([
            'business_name' => 'required',
            'registration_type' => 'required',
            'registration_number' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'country' => 'required',
            'incorporation_type' => 'required',
            'industry_id' => 'required',
            'sub_industry_id' => 'required',
            'email' => 'required',
            'office_phone' => 'required',
        ], [
            'business_name.required' => 'required*',
            'registration_type.required' => 'required*',
            'registration_number.required' => 'required*',
            'address.required' => 'required*',
            'pincode.required' => 'required*',
            'country.required' => 'required*',
            'incorporation_type.required' => 'required*',
            'industry_id.required' => 'required*',
            'sub_industry_id.required' => 'required*',
            'email.required' => 'required*',
            'office_phone.required' => 'required*',
        ]);
        $business->name = $request->business_name;
        $business->registration_type = $request->registration_type;
        $business->registration_number = $request->registration_number;
        $business->website = $request->website;
        $business->country = $request->country;
        $business->address = $request->address;
        $business->pincode = $request->pincode;
        $business->incorporation_type = $request->incorporation_type;
        $business->industry_id = $request->industry_id;
        $business->sub_industry_id = $request->sub_industry_id;
        $business->email = $request->email;
        $business->alternate_email = $request->alternate_email;
        $business->office_phone = $request->office_phone;
        $business->hand_phone = $request->hand_phone;
        $business->sms_phone = $request->sms_phone;
        $business->save();
        return redirect()->route('borrower.company');

    }

    public function createBankAccount(Business $business)
    {
        return view('borrower.sections.company.bank-account.create', [
            'title' => 'Company Profile',
            'nav_active' => 'company',
            'sub_nav_active' => 'company',
            'business' => $business,
        ]);
    }

    public function storeBankAccount(Request $request, Business $business)
    {
        $request->validate([
            'old_giro_bank' => 'required',
            'giro_bank_id' => 'required',
            'account_number' => 'required',
            'giro_branch' => 'required',
            'giro_account_number' => 'required',
            'giro_approval_date' => 'required',
            'dda_number' => 'required',
            'batch_number' => 'required',
            'credit_limit' => 'required'
        ]);
        $bankAccount = new BankAccount();
        $bankAccount->owner_type = Business::class;
        $bankAccount->owner_id = $business->id;
        $bankAccount->old_giro_bank = $request->old_giro_bank;
        $bankAccount->giro_bank_id = $request->giro_bank_id;
        $bankAccount->account_number = $request->account_number;
        $bankAccount->giro_branch = $request->giro_branch;
        $bankAccount->giro_account_number = $request->giro_account_number;
        $bankAccount->giro_approval_date = $request->giro_approval_date;
        $bankAccount->dda_number = $request->dda_number;
        $bankAccount->batch_number = $request->batch_number;
        $bankAccount->credit_limit = $request->credit_limit;
        $bankAccount->giro_remarks = $request->giro_remarks;
        $bankAccount->save();
        return redirect()->route('borrower.company')->with('success', 'Bank details added');
    }

}
