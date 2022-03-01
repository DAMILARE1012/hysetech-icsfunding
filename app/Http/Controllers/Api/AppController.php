<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Models\Borrower;
use App\Models\Business;
use App\Models\Driver;
use App\Models\Industry;
use App\Models\LoanType;
use App\Models\SubIndustry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AppController extends Controller
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

    public function login(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'required',
            'password.required' => 'required',
            'email.email' => 'invalid_email',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

        $credentials = $request->only([
            'email', 'password'
        ]);
        $token = auth('borrower')->attempt($credentials);
        if ($token) {
            $borrower = Borrower::whereEmail(\request('email'))->with('business')->first();
            $borrower->api_token = Str::random(100);
            $borrower->save();
            return response()->json([
                'response' => 101,
                'message' => null,
                'validation_errors' => null,
                'data' => $borrower
            ]);
        }
        return response()->json([
            'response' => 100,
            'message' => 'Invalid Credentials',
            'validation_errors' => null,
            'data' => null
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|unique:borrowers,email',
            'password' => 'required',
            'appointed_director' => 'required',
        ], [
            'email.required' => 'required',
            'password.required' => 'required',
            'email.email' => 'invalid_email',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }
        $borrower = new Borrower();
        $borrower->first_name = $request->first_name;
        $borrower->last_name = $request->last_name;
        $borrower->email = $request->email;
        $borrower->mobile_number = $request->mobile_number;
        $borrower->password = Hash::make($request->password);
        $borrower->appointed_director = $request->appointed_director;
        $borrower->api_token = Str::random(100);
        $borrower->save();
        $borrower->loadMissing('business');
        return response()->json([
            'response' => 101,
            'message' => null,
            'validation_errors' => null,
            'data' => $borrower
        ]);
    }

    public function verifyEmail(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required',
        ], [
            'email.required' => 'required'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }
        $borrower = Borrower::whereEmail($request->email)->first();
        if ($borrower) {
            $otp = random_int(100000, 999999);
            Mail::to($request->email)->send(new Mailer([
                'subject' => 'ICS Funding - Reset Password',
                'body' => 'Your OTP for ICS Funding is <br/><h4 style="text-align: center">' . $otp . '</h4>',
                'view' => 'emails.plain'
            ]));
            return response()->json([
                'response' => 101,
                'message' => 'SUCCESS',
                'validation_errors' => null,
                'data' => [
                    'borrower' => $borrower,
                    'otp' => $otp
                ]
            ]);
        }
        return response()->json([
            'response' => 100,
            'message' => 'Error',
            'validation_errors' => null,
            'data' => null
        ]);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'borrower_id' => 'required',
            'password' => 'required'
        ], [
            'borrower_id.required' => 'required',
            'password.required' => 'required'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }
        $borrower = Borrower::whereId($request->borrower_id)->first();
        if ($borrower) {
            $borrower->password = Hash::make($request->password);
            $borrower->save();
            return response()->json([
                'response' => 101,
                'message' => 'SUCCESS',
                'validation_errors' => null,
                'data' => null
            ]);
        } else {
            return response()->json([
                'response' => 100,
                'message' => 'ERROR',
                'validation_errors' => null,
                'data' => null
            ]);
        }
    }

    public function meta(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }
        return response()->json([
            'response' => 101,
            'message' => 'SUCCESS',
            'validation_errors' => null,
            'data' => [
                'industries' => Industry::all(),
                'countries' => $this->countries,
                'loanTypes' => LoanType::all()
            ]
        ]);

    }

    public function subIndustries(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'industry_id' => 'required',
        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }
        return response()->json([
            'response' => 101,
            'message' => 'SUCCESS',
            'validation_errors' => null,
            'data' => [
                'subIndustries' => SubIndustry::all()
            ]
        ]);
    }

    public function business(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }
        $borrower = auth('borrower_api')->user();

        return response()->json([
            'response' => 101,
            'message' => 'SUCCESS',
            'validation_errors' => null,
            'data' => [
                'business' => Business::whereId($borrower->business_id)->first()
            ]
        ]);
    }

    public function saveBusiness(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:businesses,name',
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

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

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
        $borrower = auth('borrower_api')->user();
        $borrower->business_id = $business->id;
        $borrower->save();
        return response()->json([
            'response' => 101,
            'message' => 'SUCCESS',
            'validation_errors' => null,
            'data' => [
                'business' => $business
            ]
        ]);
    }


    public function personnel(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

        $borrower = auth('borrower_api')->user();
        $personnel = Borrower::whereBusinessId($borrower->business_id)->get();
        return response()->json([
            'response' => 101,
            'message' => 'SUCCESS',
            'validation_errors' => null,
            'data' => [
                'personnel' => $personnel
            ]
        ]);
    }

    public function savePersonnel(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

    }

    public function documents(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

    }

    public function uploadDocument(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }
    }

    public function applications(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

    }

    public function application(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

    }

    public function payments(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

    }

    public function profile(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

    }

    public function updateProfile(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        if ($validation->fails()) {
            return response()->json([
                'response' => 102,
                'message' => 'Bad Request',
                'validation_errors' => $validation->errors(),
                'data' => null
            ]);
        }

    }

    public function notifications(Request $request): JsonResponse
    {
        $validation = Validator::make($request->all(), [

        ], [

        ]);
        $borrower = auth('borrower_api')->user();
        $business = $borrower->business()->first();
        if ($business) {
            $notifications = $business->notifications()->get();
        } else {
            $notifications = [];
        }
        return response()->json([
            'response' => 101,
            'message' => 'SUCCESS',
            'validation_errors' => null,
            'data' => $notifications
        ]);
    }

}
