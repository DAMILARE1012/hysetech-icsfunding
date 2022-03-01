<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Consultant;
use App\Models\Industry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultantsController extends Controller
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
        $query = Consultant::query();
        if ($request->q) {
            $query->where(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'like', '%' . $request->q . '%');
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
        $consultants = $query->get();
        $industries = Industry::all();
        $applicationStatuses = ApplicationStatus::all();
        return view('admin.sections.consultants.all', [
            'title' => 'Manage Consultants',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'consultants' => $consultants,
            'industries' => $industries,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function active(Request $request)
    {
        $query = Consultant::query();
        $query->whereActive(true);
        if ($request->q) {
            $query->where(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'like', '%' . $request->q . '%');
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
        $consultants = $query->get();
        $industries = Industry::all();
        $applicationStatuses = ApplicationStatus::all();
        return view('admin.sections.consultants.active', [
            'title' => 'Manage Consultants',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'consultants' => $consultants,
            'industries' => $industries,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function pending(Request $request)
    {
        $query = Consultant::query();
        $query->whereActive(false);
        if ($request->q) {
            $query->where(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'like', '%' . $request->q . '%');
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
        $consultants = $query->get();
        $industries = Industry::all();
        $applicationStatuses = ApplicationStatus::all();
        return view('admin.sections.consultants.pending', [
            'title' => 'Manage Consultants',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'consultants' => $consultants,
            'industries' => $industries,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function activate(Consultant $consultant)
    {
        $consultant->active = true;
        $consultant->save();

        return redirect()->route('admin.consultants.active')->with('success', 'Consultant activated successfully');
    }

    public function deactivate(Consultant $consultant)
    {
        $consultant->active = false;
        $consultant->save();

        return redirect()->route('admin.consultants.pending')->with('success', 'Consultant deactivated successfully');
    }

    public function details(Consultant $consultant)
    {
        return view('admin.sections.consultants.details.info', [
            'title' => 'Manage Consultants / Consultant Detail',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'consultant' => $consultant
        ]);
    }

    public function tasks(Consultant $consultant)
    {
        $consultant->loadMissing(['applications' => fn($applications) => $applications->whereHas('business')]);
        return view('admin.sections.consultants.details.tasks', [
            'title' => 'Manage Consultants / Consultant Detail',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'consultant' => $consultant
        ]);
    }

    public function remindersLog(Consultant $consultant)
    {
        return view('admin.sections.consultants.details.reminders-log', [
            'title' => 'Manage Consultants / Reminders Log',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'consultant' => $consultant
        ]);
    }

    public function create()
    {
        return view('admin.sections.consultants.create', [
            'title' => 'Manage Consultants / Add New',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'countries' => $this->countries
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required',
            'id_type' => 'required',
            'gender' => 'required',
            'gross_monthly_income' => 'required',
            'past_six_months_income' => 'required',
            'employer' => 'required',
            'designation' => 'required',
            'nationality' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'hand_phone' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'dob' => 'required',
        ]);
        $consultant = new Consultant();
        $consultant->first_name = $request->first_name;
        $consultant->last_name = $request->last_name;
        $consultant->id_number = $request->id_number;
        $consultant->id_type = $request->id_type;
        $consultant->gender = $request->gender;
        $consultant->gross_monthly_income = $request->gross_monthly_income;
        $consultant->past_six_months_income = $request->past_six_months_income;
        $consultant->employer = $request->employer;
        $consultant->designation = $request->designation;
        $consultant->nationality = $request->nationality;
        $consultant->active = $request->active;
        $consultant->dob = $request->dob;
        if ($request->photo)
            $consultant->photo = $request->photo->store('consultants/photo', 'public');
        $consultant->address_line_1 = $request->address_line_1;
        $consultant->address_line_2 = $request->address_line_2;
        $consultant->zipcode = $request->zipcode;
        $consultant->city = $request->city;
        $consultant->country = $request->country;
        $consultant->email = $request->email;
        $consultant->mobile_number = $request->mobile_number;
        $consultant->hand_phone = $request->hand_phone;
        $consultant->office_phone = $request->office_phone;
        $consultant->profile_complete = true;
        $consultant->save();
        return redirect()->route('admin.consultants')->with('success', 'Consultant added successfully');

    }

    public function edit(Consultant $consultant)
    {
        return view('admin.sections.consultants.edit', [
            'title' => 'Manage Consultants / Add New',
            'nav_active' => 'consultants',
            'sub_nav_active' => 'all-consultants',
            'consultant' => $consultant,
            'countries' => $this->countries
        ]);
    }

    public function update(Request $request, Consultant $consultant)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required',
            'id_type' => 'required',
            'gender' => 'required',
            'gross_monthly_income' => 'required',
            'past_six_months_income' => 'required',
            'employer' => 'required',
            'designation' => 'required',
            'nationality' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'hand_phone' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'dob' => 'required',
        ]);
        $consultant->first_name = $request->first_name;
        $consultant->last_name = $request->last_name;
        $consultant->id_number = $request->id_number;
        $consultant->id_type = $request->id_type;
        $consultant->gender = $request->gender;
        $consultant->gross_monthly_income = $request->gross_monthly_income;
        $consultant->past_six_months_income = $request->past_six_months_income;
        $consultant->employer = $request->employer;
        $consultant->designation = $request->designation;
        $consultant->nationality = $request->nationality;
        $consultant->active = $request->active;
        $consultant->dob = $request->dob;
        if ($request->photo)
            $consultant->photo = $request->photo->store('consultants/photo', 'public');
        $consultant->address_line_1 = $request->address_line_1;
        $consultant->address_line_2 = $request->address_line_2;
        $consultant->zipcode = $request->zipcode;
        $consultant->city = $request->city;
        $consultant->country = $request->country;
        $consultant->email = $request->email;
        $consultant->mobile_number = $request->mobile_number;
        $consultant->hand_phone = $request->hand_phone;
        $consultant->office_phone = $request->office_phone;
        $consultant->profile_complete = true;
        $consultant->save();
        return redirect()->route('admin.consultants')->with('success', 'Consultant updated successfully');

    }

    public function destroy(Consultant $consultant)
    {
        $applications = Application::whereConsultantId($consultant->id)->get();
        foreach ($applications as $application) {
            $application->consultant_id = null;
            $application->save();
        }
        $consultant->delete();
        return redirect()->route('admin.consultants')->with('success', 'Consultant deleted successfully');
    }
}
