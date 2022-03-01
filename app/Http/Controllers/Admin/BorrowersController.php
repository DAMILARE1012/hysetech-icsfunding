<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\BankAccount;
use App\Models\Borrower;
use App\Models\Business;
use App\Models\Document;
use App\Models\Industry;
use App\Models\Loan;
use App\Models\LoanLimit;
use App\Models\LoanType;
use App\Models\Payment;
use App\Models\SubIndustry;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BorrowersController extends Controller
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

    public function index(Request $request)
    {
        $query = Business::query();
        if ($request->q) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }
        if ($request->industry_id) {
            $query->whereIndustryId($request->industry_id);
        }
        if ($request->incorporation_type) {
            $query->whereIncorporationType($request->incorporation_type);
        }
        if ($request->loan_limit) {
            $loanLimit = LoanLimit::whereId($request->loan_limit)->first();
            $query->where('loan_limit', '>=', $loanLimit->value_start);
            $query->where('loan_limit', '<=', $loanLimit->value_end);
        }
        if ($request->sort == 'Oldest Update') {
            $query->orderBy('created_at', 'DESC');
        } else {
            $query->orderBy('created_at', 'ASC');
        }
        if ($request->order == 'This Week') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($request->order == 'This Month') {
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        } elseif ($request->order == 'This Year') {
            $query->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
        }


        $businesses = $query->get();
        $industries = Industry::all();
        $loan_limits = LoanLimit::all();
        $applicationStatuses = ApplicationStatus::all();
        return view('admin.sections.borrowers.all', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'businesses' => $businesses,
            'industries' => $industries,
            'loanLimits' => $loan_limits,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function corporate(Request $request)
    {
        $query = Business::query();
        $query->whereCorporate(true);
        if ($request->q) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }
        if ($request->industry_id) {
            $query->whereIndustryId($request->industry_id);
        }
        if ($request->incorporation_type) {
            $query->whereIncorporationType($request->incorporation_type);
        }
        if ($request->loan_limit) {
            $loanLimit = LoanLimit::whereId($request->loan_limit)->first();
            $query->where('loan_limit', '>=', $loanLimit->value_start);
            $query->where('loan_limit', '<=', $loanLimit->value_end);
        }
        if ($request->sort == 'Oldest Update') {
            $query->orderBy('created_at', 'DESC');
        } else {
            $query->orderBy('created_at', 'ASC');

        }
        $businesses = $query->get();
        $industries = Industry::all();
        $applicationStatuses = ApplicationStatus::all();
        $loanLimits = LoanLimit::all();
        return view('admin.sections.borrowers.corporate', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'businesses' => $businesses,
            'industries' => $industries,
            'loanLimits' => $loanLimits,
            'applicationStatuses' => $applicationStatuses
        ]);
    }


    public function blacklisted(Request $request)
    {
        $query = Business::query();
        $query->whereBlacklisted(true);
        if ($request->q) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }
        if ($request->industry_id) {
            $query->whereIndustryId($request->industry_id);
        }
        if ($request->incorporation_type) {
            $query->whereIncorporationType($request->incorporation_type);
        }
        if ($request->loan_limit) {
            $loanLimit = LoanLimit::whereId($request->loan_limit)->first();
            $query->where('loan_limit', '>=', $loanLimit->value_start);
            $query->where('loan_limit', '<=', $loanLimit->value_end);
        }
        if ($request->sort == 'Oldest Update') {
            $query->orderBy('created_at', 'DESC');
        } else {
            $query->orderBy('created_at', 'ASC');

        }
        $businesses = $query->get();
        $industries = Industry::all();
        $applicationStatuses = ApplicationStatus::all();
        $loanLimits = LoanLimit::all();

        return view('admin.sections.borrowers.blacklisted', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'businesses' => $businesses,
            'industries' => $industries,
            'loanLimits' => $loanLimits,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function create()
    {
        $industries = Industry::all();
        $subIndustries = $industries->first()->subIndustries()->get();
        return view('admin.sections.borrowers.create', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
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
            'loan_limit' => 'required|numeric|gt:0',
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
            'loan_limit.required' => 'required*',
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
        $business->loan_limit = $request->loan_limit;
        $business->save();
        return redirect()->route('admin.borrowers');
    }

    public function editBusiness(Business $business)
    {

        $industries = Industry::whereActive(true)->get();
        $subIndustries = $industries->first()->subIndustries()->get();

        return view('admin.sections.borrowers.edit', [
            'title' => 'Edit Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'industries' => $industries,
            'subIndustries' => $subIndustries,
            'countries' => $this->countries,
            'business' => $business
        ]);
    }

    public function updateBusiness(Request $request, Business $business)
    {
        $request->validate([
            'business_name' => 'required|unique:businesses,name,' . $business->id,
            'registration_type' => 'required',
            'registration_number' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'loan_limit' => 'required|numeric|gt:0',
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
            'loan_limit.required' => 'required*',
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
        $business->loan_limit = $request->loan_limit;
        $business->save();
        return redirect()->route('admin.borrowers')->with('success', 'Business data updated successfully');

    }

    public function personnel(Business $business)
    {
        $borrowers = $business->borrowers()->get();
        return view('admin.sections.borrowers.personnel.index', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
            'borrowers' => $borrowers
        ]);
    }

    public function personnelDetail(Borrower $borrower)
    {
        $borrower->loadMissing('documents');
        return view('admin.sections.borrowers.personnel.details', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'borrower' => $borrower,
        ]);
    }

    public function deletePersonnel(Borrower $borrower)
    {
        $borrower->delete();
        return redirect()->back()->with('success', 'Personnel deleted successfully');
    }

    public function createPersonnel(Business $business)
    {
        return view('admin.sections.borrowers.personnel.create', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
            'countries' => $this->countries
        ]);
    }

    public function storePersonnel(Request $request, Business $business)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $borrower = new Borrower();
        $borrower->business_id = $business->id;
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

        return redirect()->route('admin.borrowers.details', [
            'business' => $business,
            'tab' => 'personnel'
        ])->with('success', 'Personnel added');
    }

    public function createBankAccount(Business $business)
    {
        return view('admin.sections.borrowers.bank-account.create', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
        ]);
    }

    public function uploadDocument(Business $business)
    {
        $business->loadMissing('borrowers');
        return view('admin.sections.borrowers.details.upload-document', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
        ]);
    }

    public function storeDocument(Request $request, Business $business)
    {
        $request->validate([
            'borrower_id' => 'required',
            'document_type' => 'required',
            'attachment' => 'required',
        ], [
            'borrower_id.required' => 'Please select a borrower',
        ]);

        $document = new Document();
        $document->business_id = $business->id;
        $document->borrower_id = $request->borrower_id;
        $document->document_type = $request->document_type;
        $document->attachment = $request->attachment->store('borrower/' . $request->borrower_id . 'documents/', 'public');
        $document->save();

        return redirect()->route('admin.borrowers.details.documents', $business)->with('success', 'Document uploaded');

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
        return redirect()->route('admin.borrowers.details', [
            'business' => $business,
            'tab' => 'bank-details'
        ])->with('success', 'Bank details added');
    }


    public function details(Business $business, string $tab)
    {
        $business->loadMissing('borrowers', 'industry', 'subIndustry', 'bankAccount');
        return view('admin.sections.borrowers.details.info', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
            'tab' => $tab
        ]);
    }

    public function applications(Business $business)
    {
        $business->loadMissing(['applications' => fn($applications) => $applications->with('activeLoan', 'counterOfferedLoan')]);
        return view('admin.sections.borrowers.details.applications', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business
        ]);
    }

    public function applicationDetail(Business $business, Application $application)
    {
        return view('admin.sections.borrowers.applications.details', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
            'application' => $application
        ]);
    }

    public function createApplication(Business $business)
    {
        $loanTypes = LoanType::all();
        $applicationStatuses = ApplicationStatus::all();
        return view('admin.sections.borrowers.applications.create', [
            'title' => 'Manage Borrowers / Borrower Detail / Applications',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
            'loanTypes' => $loanTypes,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function storeApplication(Request $request, Business $business)
    {
        $request->validate([
            'loan_start_date' => 'required',
            'loan_type_id' => 'required',
            'loan_amount' => 'required',
            'loan_tenure' => 'required',
            'interest_rate' => 'required',
            'late_fee' => 'required',
            'status' => 'required',
            'contract_variation_fee' => 'required',
        ]);
        $application = new Application();
        $application->business_id = $business->id;
        $application->loan_start_date = $request->loan_start_date;
        $application->status = $request->status;
        $application->verified = $request->verified;
        $application->save();
        $loan = new Loan();
        $loan->application_id = $application->id;
        $loan->loan_type_id = $request->loan_type_id;
        $loan->amount = $request->loan_amount;
        $loan->tenure = $request->loan_tenure;
        $loan->interest_rate = $request->interest_rate;
        $loan->late_fee = $request->late_fee;
        $loan->contract_variation_fee = $request->contract_variation_fee;
        $loan->save();
        $loan_date = new Carbon($request->loan_start_date);
        for ($i = 0; $i < (int)$request->loan_tenure; $i++) {
            $payment = new Payment();
            $payment->application_id = $application->id;
            $payment->payable_type = 'Principal';
            $payment->payment_date = $loan_date->addMonth($i + 1);
            $payment->payable_amount = $request->loan_amount / $request->loan_tenure;
            $payment->save();
            $payment = new Payment();
            $payment->application_id = $application->id;
            $payment->payable_type = 'Interest';
            $payment->payment_date = $loan_date->addMonth($i + 1);
            $payment->payable_amount = $request->loan_amount * ($request->interest_rate / 100);
            $payment->save();
        }
        return redirect()->route('admin.borrowers.details.applications', $business)->with('success', 'Applications created');

    }

    public function editApplication(Business $business, Application $application)
    {
        $loanTypes = LoanType::all();
        $loan = Loan::where('application_id', $application->id)->first();
        return view('admin.sections.borrowers.applications.edit', [
            'title' => 'Manage Borrowers / Borrower Detail / Applications',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
            'loanTypes' => $loanTypes,
            'application' => $application,
            'loan' => $loan
        ]);

    }

    public function updateApplication(Request $request, Business $business, Loan $loan)
    {
        $request->validate([
            'loan_type' => 'required',
            'loan_amount' => 'required',
            'loan_tenure' => 'required',
        ]);
        $loanType = LoanType::whereId($request->loan_type)->first();

        $loan->loan_type = $loanType->title;
        $loan->amount = $request->loan_amount;
        $loan->tenure = $request->loan_tenure;
        $loan->interest_rate = $loanType->interest_rate;
        $loan->save();

        return redirect()->route('admin.borrowers.details.applications', $business)->with('success', 'Applications updated');
    }

    public function destroyApplication(Business $business, Application $application)
    {
        $loan = Loan::where('application_id', $application->id)->first();
        $loan->delete();
        $application->delete();
        return redirect()->route('admin.borrowers.details.applications', $business)->with('success', 'Applications deleted');
    }

    public function documents(Business $business)
    {
        $business->loadMissing([
            'nricDocs' => fn($nricDocs) => $nricDocs->whereHas('borrower')->with('borrower'),
            'cbsrDocs' => fn($cbsrDocs) => $cbsrDocs->whereHas('borrower')->with('borrower'),
            'bankStatements' => fn($bankStatements) => $bankStatements->whereHas('borrower')->with('borrower'),
            'acraDocs' => fn($acraDocs) => $acraDocs->whereHas('borrower')->with('borrower'),
        ]);
        return view('admin.sections.borrowers.details.documents', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business
        ]);
    }

    public function detailsCollectMoney(Business $business)
    {
        $business->loadMissing(['industry', 'subIndustry', 'bankAccount']);
        $applications = $business->applications()->with('activeLoan', 'counterOfferedLoan', 'payments')->get();
        $applications->map(function ($application, $index) {
            $totalDue = 0;
            $totalProfit = 0;
            foreach ($application->payments as $payment) {
                if ($payment->status == 'Yet to pay') {
                    $totalDue += $payment->payable_amount;
                } elseif ($payment->status == 'Paid' && $payment->payable_type == 'Interest') {
                    $totalProfit += $payment->payable_amount;
                }

                $application->totalDue = $totalDue;
                $application->totalProfit = $totalProfit;
            }
        });
        // dd($buis);
        return view('admin.sections.borrowers.details.collect-money', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business,
            'applications' => $applications
        ]);
    }

    public function vip(Request $request, Business $business)
    {
        $business->vip = $request->vip;
        $business->save();
        return redirect($request->redirect_url);

    }

    public function blacklist(Request $request, Business $business)
    {
        $business->blacklisted = $request->blacklisted;
        $business->blacklisting_remarks = $request->blacklisting_remarks;
        $business->save();
        return redirect($request->redirect_url);

    }

    public function remindersLog(Business $business)
    {
        return view('admin.sections.borrowers.details.reminders-log', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'business' => $business
        ]);
    }

    public function collectMoney(Request $request)
    {
        $query = Application::query();
        $query->whereHas('business')->with('payments', 'business', 'activeLoan');
        if ($request->sort == 'Oldest Update') {
            $query->orderBy('created_at', 'DESC');
        } else {
            $query->orderBy('created_at', 'ASC');
        }
        if ($request->order == 'This Week') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($request->order == 'This Month') {
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        } elseif ($request->order == 'This Year') {
            $query->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
        }

        $applications = $query->get();
        $industries = Industry::all();
        $loan_limits = LoanLimit::all();
        $applicationStatuses = ApplicationStatus::all();


        return view('admin.sections.borrowers.collect-money.index', [
            'title' => 'Manage Borrowers / Collect Money',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'collect-money',
            'applications' => $applications,
            'industries' => $industries,
            'loanLimits' => $loan_limits,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function collectMoneyBorrowerDetail(Application $application)
    {
        $application->loadMissing('payments', 'activeLoan', 'business');
        $totalDue = 0;
        $totalProfit = 0;
        foreach ($application->payments as $payment) {
            if ($payment->status == 'Yet to pay') {
                $totalDue += $payment->payable_amount;
            } elseif ($payment->status == 'Paid' && $payment->payable_type == 'Interest') {
                $totalProfit += $payment->payable_amount;
            }

        }
        return view('admin.sections.borrowers.collect-money.details', [
            'title' => 'Manage Borrowers / Collect Money / Borrower Details',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'collect-money',
            'application' => $application,
            'totalDue' => $totalDue,
            'totalProfit' => $totalProfit
        ]);
    }

    public function subIndustries(Industry $industry): JsonResponse
    {
        return response()->json([
            'sub_industries' => $industry->subIndustries()->get()
        ]);
    }

    public function destroyDocument($id)
    {
        $document = Document::findorfail($id);
        File::delete(public_path('storage/' . $document->attachment));
        $document->delete();
        return redirect()->back()->with('success', 'Document deleted successfully');
    }

    public function destroyBusiness(Business $business)
    {
        $business->delete();
        return redirect()->route('admin.borrowers')->with('success', 'Business deleted successfully');
    }

    public function import()
    {
        return view('admin.sections.borrowers.import', [
            'title' => 'Import Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
        ]);

    }

    public function previewImport(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = [];
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
            $cells = [];
            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
        }
        $key = rand(0, 100000);
        session([
            'rows-' . $key => $rows
        ]);
        return view('admin.sections.borrowers.preview', [
            'title' => 'Import Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers',
            'rows' => $rows,
            'path' => $key
        ]);
    }

    public function processImport(Request $request)
    {
        $rows = session('rows-' . $request->path, []);

        foreach ($rows as $index => $row) {

            if ($index > 0 && isset($row[0])) {


                $business = new Business();
                $business->name = $row[0];
                $business->registration_type = $row[1];
                $business->registration_number = $row[2];
                $business->website = $row[3];
                $business->address = $row[4];
                $business->pincode = $row[5];
                $business->country = $row[6];
                $business->incorporation_type = $row[7];
                $industry = Industry::whereName($row[8])->first();
                if ($industry) {
                    $business->industry_id = $industry->id;
                }
                $subIndustry = SubIndustry::whereName($row[9])->first();
                if ($subIndustry) {
                    $business->sub_industry_id = $subIndustry->id;
                }
                $business->email = $row[10];
                $business->alternate_email = $row[11];
                $business->office_phone = $row[12];
                $business->hand_phone = $row[13];
                $business->sms_phone = $row[14];
                $business->loan_limit = $row[15];
                $business->save();
            }
        }
        return redirect()->route('admin.borrowers');
    }

    public function test()
    {
        Mail::to('owaisiqbal77@gmail.com')->send(new Mailer(['subject' => 'Test Email',
            'body' => 'Test Body',
            'view' => 'emails.plain']));
    }

    public function updateStatus(Request $request, Business $business)
    {
        if ($request->status == 'corporate') {
            $business->corporate = true;
            $business->save();
        } elseif ($request->status == 'blacklist') {
            $business->blacklisted = true;
            $business->save();

        }
        return redirect()->route('admin.borrowers')->with('success', 'Status updated');
    }
}
