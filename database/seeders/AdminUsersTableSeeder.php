<?php

namespace Database\Seeders;

use App\Models\Borrower;
use App\Models\Consultant;
use App\Models\Industry;
use App\Models\LoanType;
use App\Models\Permission;
use App\Models\SubIndustry;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        User::create([
            'first_name' => 'ICS',
            'last_name' => 'Admin',
            'email' => 'govind@smitiv.co',
            'password' => Hash::make('ICS@2021'),
        ]);
        DB::table('borrowers')->truncate();
        $borrower = new Borrower();
        $borrower->first_name = 'Borrower';
        $borrower->last_name = 'Example';
        $borrower->email = 'borrower@example.com';
        $borrower->mobile_number = '11223344';
        $borrower->password = Hash::make('ICS@2021');
        $borrower->save();
        DB::table('consultants')->truncate();
        $consultant = new Consultant();
        $consultant->first_name = 'Consultant';
        $consultant->last_name = 'Example';
        $consultant->email = 'consultant@example.com';
        $consultant->mobile_number = '11223344';
        $consultant->password = Hash::make('ICS@2021');
        $consultant->save();

        DB::table('industries')->truncate();
        $industry = new Industry();
        $industry->name = 'Industry 1';
        $industry->active = true;
        $industry->save();

        $subIndustry = new SubIndustry();
        $subIndustry->name = 'Sub Industry 1';
        $subIndustry->active = true;
        $subIndustry->industry_id = $industry->id;
        $subIndustry->save();
        $subIndustry = new SubIndustry();
        $subIndustry->name = 'Sub Industry 2';
        $subIndustry->active = true;
        $subIndustry->industry_id = $industry->id;
        $subIndustry->save();
        $subIndustry = new SubIndustry();
        $subIndustry->name = 'Sub Industry 3';
        $subIndustry->active = true;
        $subIndustry->industry_id = $industry->id;
        $subIndustry->save();

        $industry = new Industry();
        $industry->name = 'Industry 2';
        $industry->active = true;
        $industry->save();

        $subIndustry = new SubIndustry();
        $subIndustry->name = 'Sub Industry 4';
        $subIndustry->active = true;
        $subIndustry->industry_id = $industry->id;
        $subIndustry->save();
        $subIndustry = new SubIndustry();
        $subIndustry->name = 'Sub Industry 5';
        $subIndustry->active = true;
        $subIndustry->industry_id = $industry->id;
        $subIndustry->save();
        $subIndustry = new SubIndustry();
        $subIndustry->name = 'Sub Industry 6';
        $subIndustry->active = true;
        $subIndustry->industry_id = $industry->id;
        $subIndustry->save();

        $loanType = new LoanType();
        $loanType->title = 'Business Term Loan';
        $loanType->interest_rate = 5.5;
        $loanType->late_fee = 500;
        $loanType->contract_variation_fee = 1000;
        $loanType->save();

        DB::table('permissions')->truncate();
        $permission = new Permission();
        $permission->label = 'Manage Borrowers';
        $permission->permission = 'manage_borrowers';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Manage Applications';
        $permission->permission = 'manage_applications';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Manage Consultants';
        $permission->permission = 'manage_consultants';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Tasks';
        $permission->permission = 'tasks';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Reminders';
        $permission->permission = 'reminders';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Administration';
        $permission->permission = 'administration';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Settings';
        $permission->permission = 'settings';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Blog';
        $permission->permission = 'blog';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Loan Types';
        $permission->permission = 'loan_types';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Loan Status';
        $permission->permission = 'loan_status';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Loan Limits';
        $permission->permission = 'loan_limits';
        $permission->save();

        $permission = new Permission();
        $permission->label = 'Industries';
        $permission->permission = 'industries';
        $permission->save();
    }
}
