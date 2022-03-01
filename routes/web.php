<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::name('web.')->group(function () {
    Route::get('/', [\App\Http\Controllers\WebController::class, 'index'])->name('index');
    Route::get('/loan-calculator', [\App\Http\Controllers\WebController::class, 'loanCalculator'])->name('loan-calculator');

    Route::get('/blog/{blog}/details', [\App\Http\Controllers\WebController::class, 'blogDetails'])->name('blog.details');
});
 


Route::name('admin.')->group(function () {
    Route::middleware('guest:user')->group(function () {
        Route::view('/admin/login', 'auth.admin.login')->name('login');
        Route::post('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
        Route::get('/admin/forgot-password', [\App\Http\Controllers\Admin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');
        Route::post('/admin/forgot-password', [\App\Http\Controllers\Admin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot-password');
        Route::get('/admin/reset-password/{token}', [\App\Http\Controllers\Admin\PasswordResetsController::class, 'showResetForm'])->name('password.reset');
        Route::post('/admin/reset-password/{token}', [\App\Http\Controllers\Admin\PasswordResetsController::class, 'reset'])->name('password.reset');
    });
    Route::middleware('auth:user')->group(function () {
        Route::post('/admin/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/admin/borrowers/all', [\App\Http\Controllers\Admin\BorrowersController::class, 'index'])->name('borrowers');
        Route::get('/admin/borrowers/corporate', [\App\Http\Controllers\Admin\BorrowersController::class, 'corporate'])->name('borrowers.corporate');
        Route::get('/admin/borrowers/blacklisted', [\App\Http\Controllers\Admin\BorrowersController::class, 'blacklisted'])->name('borrowers.blacklisted');
        Route::get('/admin/borrowers/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'create'])->name('borrowers.create');
        Route::post('/admin/borrowers/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'store'])->name('borrowers.create');
        Route::get('/admin/borrowers/import', [\App\Http\Controllers\Admin\BorrowersController::class, 'import'])->name('borrowers.import');
        Route::post('/admin/borrowers/import', [\App\Http\Controllers\Admin\BorrowersController::class, 'previewImport'])->name('borrowers.import');
        Route::post('/admin/borrowers/import/process', [\App\Http\Controllers\Admin\BorrowersController::class, 'processImport'])->name('borrowers.import.process');
        Route::get('/admin/borrowers/test', [\App\Http\Controllers\Admin\BorrowersController::class, 'test'])->name('borrowers.test');

        Route::get('/admin/borrowers/collect-money', [\App\Http\Controllers\Admin\BorrowersController::class, 'collectMoney'])->name('borrowers.collect-money');
        Route::get('/admin/borrowers/collect-money/details/{application}', [\App\Http\Controllers\Admin\BorrowersController::class, 'collectMoneyBorrowerDetail'])->name('borrowers.collect-money.details');

        Route::post('/admin/borrowers/{business}/vip', [\App\Http\Controllers\Admin\BorrowersController::class, 'vip'])->name('borrowers.vip');
        Route::post('/admin/borrowers/{business}/blacklist', [\App\Http\Controllers\Admin\BorrowersController::class, 'blacklist'])->name('borrowers.blacklist');

        Route::get('/admin/borrowers/{business}/personnel', [\App\Http\Controllers\Admin\BorrowersController::class, 'personnel'])->name('borrowers.personnel');
        Route::get('/admin/borrowers/{business}/personnel/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'createPersonnel'])->name('borrowers.personnel.create');
        Route::post('/admin/borrowers/{business}/personnel/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'storePersonnel'])->name('borrowers.personnel.create');
        Route::get('/admin/borrowers/{business}/bank-account/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'createBankAccount'])->name('borrowers.bank-account.create');
        Route::post('/admin/borrowers/{business}/bank-account/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'storeBankAccount'])->name('borrowers.bank-account.create');
        Route::get('/admin/borrowers/personnel/{borrower}/detail', [\App\Http\Controllers\Admin\BorrowersController::class, 'personnelDetail'])->name('borrowers.personnel.detail');
        Route::delete('/admin/borrowers/personnel/{borrower}/delete', [\App\Http\Controllers\Admin\BorrowersController::class, 'deletePersonnel'])->name('borrowers.personnel.delete');

        Route::get('/admin/borrowers/{business}/edit', [\App\Http\Controllers\Admin\BorrowersController::class, 'editBusiness'])->name('borrowers.business.edit');
        Route::patch('/admin/borrowers/{business}/edit', [\App\Http\Controllers\Admin\BorrowersController::class, 'updateBusiness'])->name('borrowers.business.edit');
        Route::delete('/admin/borrowers/{business}/delete', [\App\Http\Controllers\Admin\BorrowersController::class, 'destroyBusiness'])->name('borrowers.business.delete');
        Route::post('/admin/borrowers/{business}/update-status', [\App\Http\Controllers\Admin\BorrowersController::class, 'updateStatus'])->name('borrowers.update-status');


        Route::get('/admin/borrowers/{business}/details/applications', [\App\Http\Controllers\Admin\BorrowersController::class, 'applications'])->name('borrowers.details.applications');
        Route::get('/admin/borrowers/{business}/details/applications/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'createApplication'])->name('borrowers.details.applications.create');
        Route::post('/admin/borrowers/{business}/details/applications/create', [\App\Http\Controllers\Admin\BorrowersController::class, 'storeApplication'])->name('borrowers.details.applications.create');
        Route::get('/admin/borrowers/{business}/details/applications/{application}', [\App\Http\Controllers\Admin\BorrowersController::class, 'applicationDetail'])->name('borrowers.details.applications.detail');
        Route::get('/admin/borrowers/{business}/details/applications/{application}/edit', [\App\Http\Controllers\Admin\BorrowersController::class, 'editApplication'])->name('borrowers.details.applications.edit');
        Route::patch('/admin/borrowers/{business}/details/applications/{loan}/update', [\App\Http\Controllers\Admin\BorrowersController::class, 'updateApplication'])->name('borrowers.details.applications.update');
        Route::delete('/admin/borrowers/{business}/details/applications/{application}/delete', [\App\Http\Controllers\Admin\BorrowersController::class, 'destroyApplication'])->name('borrowers.details.applications.delete');

        Route::get('/admin/borrowers/{business}/details/documents', [\App\Http\Controllers\Admin\BorrowersController::class, 'documents'])->name('borrowers.details.documents');
        Route::get('/admin/borrowers/{business}/details/documents/upload', [\App\Http\Controllers\Admin\BorrowersController::class, 'uploadDocument'])->name('borrowers.details.documents.upload');
        Route::post('/admin/borrowers/{business}/details/documents/upload', [\App\Http\Controllers\Admin\BorrowersController::class, 'storeDocument'])->name('borrowers.details.documents.upload');
        Route::delete('/admin/borrowers/{business}/delete/documents', [\App\Http\Controllers\Admin\BorrowersController::class, 'destroyDocument'])->name('borrowers.delete.documents');
        Route::get('/admin/borrowers/{business}/details/collect-money', [\App\Http\Controllers\Admin\BorrowersController::class, 'detailsCollectMoney'])->name('borrowers.details.collect-money');
        Route::get('/admin/borrowers/{business}/details/reminder-log', [\App\Http\Controllers\Admin\BorrowersController::class, 'remindersLog'])->name('borrowers.details.reminder-log');
        Route::get('/admin/borrowers/{business}/details/{tab}', [\App\Http\Controllers\Admin\BorrowersController::class, 'details'])->name('borrowers.details');
        Route::get('/admin/applications', [\App\Http\Controllers\Admin\ApplicationsController::class, 'index'])->name('applications');
        Route::get('/admin/applications/create', [\App\Http\Controllers\Admin\ApplicationsController::class, 'create'])->name('applications.create');
        Route::post('/admin/applications/create', [\App\Http\Controllers\Admin\ApplicationsController::class, 'store'])->name('applications.create');
        Route::get('/admin/applications/{applicationStatus}', [\App\Http\Controllers\Admin\ApplicationsController::class, 'status'])->name('applications.status');
        Route::get('/admin/applications/approved', [\App\Http\Controllers\Admin\ApplicationsController::class, 'approved'])->name('applications.approved');
        Route::get('/admin/applications/rejected', [\App\Http\Controllers\Admin\ApplicationsController::class, 'rejected'])->name('applications.rejected');
        Route::get('/admin/applications/counter-offer', [\App\Http\Controllers\Admin\ApplicationsController::class, 'counterOffer'])->name('applications.counter-offer');
        Route::get('/admin/applications/incomplete', [\App\Http\Controllers\Admin\ApplicationsController::class, 'incomplete'])->name('applications.incomplete');
        Route::get('/admin/applications/blacklisted', [\App\Http\Controllers\Admin\ApplicationsController::class, 'blacklisted'])->name('applications.blacklisted');
        Route::get('/admin/applications/details/{application}', [\App\Http\Controllers\Admin\ApplicationsController::class, 'details'])->name('applications.details');
        Route::delete('/admin/applications/delete/{application}', [\App\Http\Controllers\Admin\ApplicationsController::class, 'delete'])->name('applications.delete');
        Route::post('/admin/applications/details/{application}/assign-consultant', [\App\Http\Controllers\Admin\ApplicationsController::class, 'assignConsultant'])->name('applications.details.assign-consultant');
        Route::get('/admin/applications/details/{application}/remove-consultant', [\App\Http\Controllers\Admin\ApplicationsController::class, 'removeConsultant'])->name('applications.details.remove-consultant');
        Route::post('/admin/applications/details/{application}/add-progress', [\App\Http\Controllers\Admin\ApplicationsController::class, 'addProgress'])->name('applications.details.add-progress');
        Route::post('/admin/applications/{application}/update-status', [\App\Http\Controllers\Admin\ApplicationsController::class, 'updateStatus'])->name('applications.update-status');
        Route::get('/admin/applications/payment/{payment}/mark-paid', [\App\Http\Controllers\Admin\ApplicationsController::class, 'markPaymentPaid'])->name('applications.payment.mark-paid');
        Route::post('/admin/applications/payment/{payment}/add', [\App\Http\Controllers\Admin\ApplicationsController::class, 'addPayment'])->name('applications.payment.add');

        Route::get('/admin/consultants', [\App\Http\Controllers\Admin\ConsultantsController::class, 'index'])->name('consultants');
        Route::get('/admin/consultants/active', [\App\Http\Controllers\Admin\ConsultantsController::class, 'active'])->name('consultants.active');
        Route::get('/admin/consultants/pending', [\App\Http\Controllers\Admin\ConsultantsController::class, 'pending'])->name('consultants.pending');
        Route::get('/admin/consultants/create', [\App\Http\Controllers\Admin\ConsultantsController::class, 'create'])->name('consultants.create');
        Route::post('/admin/consultants/create', [\App\Http\Controllers\Admin\ConsultantsController::class, 'store'])->name('consultants.create');
        Route::get('/admin/consultants/{consultant}/details', [\App\Http\Controllers\Admin\ConsultantsController::class, 'details'])->name('consultants.details');
        Route::get('/admin/consultants/{consultant}/activate', [\App\Http\Controllers\Admin\ConsultantsController::class, 'activate'])->name('consultants.activate');
        Route::get('/admin/consultants/{consultant}/deactivate', [\App\Http\Controllers\Admin\ConsultantsController::class, 'deactivate'])->name('consultants.deactivate');
        Route::get('/admin/consultants/{consultant}/details/tasks', [\App\Http\Controllers\Admin\ConsultantsController::class, 'tasks'])->name('consultants.details.tasks');
        Route::get('/admin/consultants/{consultant}/details/reminders-log', [\App\Http\Controllers\Admin\ConsultantsController::class, 'remindersLog'])->name('consultants.details.reminders-log');
        Route::get('/admin/consultants/{consultant}/edit', [\App\Http\Controllers\Admin\ConsultantsController::class, 'edit'])->name('consultants.edit');
        Route::patch('/admin/consultants/{consultant}/edit', [\App\Http\Controllers\Admin\ConsultantsController::class, 'update'])->name('consultants.edit');
        Route::delete('/admin/consultants/{consultant}/delete', [\App\Http\Controllers\Admin\ConsultantsController::class, 'destroy'])->name('consultants.delete');

        Route::get('/admin/tasks', [\App\Http\Controllers\Admin\TasksController::class, 'index'])->name('tasks');
        Route::get('/admin/tasks/history', [\App\Http\Controllers\Admin\TasksController::class, 'history'])->name('tasks.history');
        Route::get('/admin/payment', [\App\Http\Controllers\Admin\TasksController::class, 'payment'])->name('tasks.payment');
        Route::get('/admin/tasks/create', [\App\Http\Controllers\Admin\TasksController::class, 'create'])->name('tasks.create');
        Route::post('/admin/tasks/create', [\App\Http\Controllers\Admin\TasksController::class, 'store'])->name('tasks.create');
        Route::get('/admin/tasks/{application}/delete', [\App\Http\Controllers\Admin\TasksController::class, 'delete'])->name('tasks.delete');
        Route::post('/admin/tasks/add-followup', [\App\Http\Controllers\Admin\TasksController::class, 'addFollowUp'])->name('tasks.add-followup');
        Route::post('/admin/tasks/{application}/update-status', [\App\Http\Controllers\Admin\TasksController::class, 'updateStatus'])->name('tasks.update-status');
        Route::get('/admin/tasks/{application}/follow-ups', [\App\Http\Controllers\Admin\TasksController::class, 'followUps'])->name('tasks.follow-ups');

        Route::get('/admin/reminders', [\App\Http\Controllers\Admin\RemindersController::class, 'index'])->name('reminders');
        Route::get('/admin/reminders/demand-letter', [\App\Http\Controllers\Admin\RemindersController::class, 'demandLetter'])->name('reminders.demand-letter');
        Route::get('/admin/reminders/email', [\App\Http\Controllers\Admin\RemindersController::class, 'email'])->name('reminders.email');
        Route::get('/admin/reminders/sms', [\App\Http\Controllers\Admin\RemindersController::class, 'sms'])->name('reminders.sms');
        Route::get('/admin/reminders/closed-loan', [\App\Http\Controllers\Admin\RemindersController::class, 'closedLoan'])->name('reminders.closed-loan');
        Route::get('/admin/reminders/payment-due-report', [\App\Http\Controllers\Admin\RemindersController::class, 'paymentDueReport'])->name('reminders.payment-due-report');
        Route::get('/admin/reminders/create', [\App\Http\Controllers\Admin\RemindersController::class, 'create'])->name('reminders.create');
        Route::post('/admin/reminders/create', [\App\Http\Controllers\Admin\RemindersController::class, 'storeReminder'])->name('reminders.create');
        Route::get('/admin/reminders/create/email/{application}', [\App\Http\Controllers\Admin\RemindersController::class, 'createEmail'])->name('reminders.create.email');
        Route::get('/admin/reminders/create/sms/{application}', [\App\Http\Controllers\Admin\RemindersController::class, 'createSMS'])->name('reminders.create.sms');
        Route::get('/admin/reminders/create/demand-letter/{application}', [\App\Http\Controllers\Admin\RemindersController::class, 'createDemandLetter'])->name('reminders.create.demand-letter');
        Route::get('/admin/reminders/create/payment-due-report/{application}', [\App\Http\Controllers\Admin\RemindersController::class, 'createPDR'])->name('reminders.create.payment-due-report');

        Route::get('/admin/administration', [\App\Http\Controllers\Admin\AdministrationController::class, 'index'])->name('administration');
        Route::get('/admin/administration/users/create', [\App\Http\Controllers\Admin\AdministrationController::class, 'createUser'])->name('administration.users.create');
        Route::post('/admin/administration/users/create', [\App\Http\Controllers\Admin\AdministrationController::class, 'storeUser'])->name('administration.users.create');
        Route::get('/admin/administration/users/{user}/edit', [\App\Http\Controllers\Admin\AdministrationController::class, 'editUser'])->name('administration.user.edit');
        Route::patch('/admin/administration/users/{user}/edit', [\App\Http\Controllers\Admin\AdministrationController::class, 'updateUser'])->name('administration.user.edit');
        Route::get('/admin/administration/roles', [\App\Http\Controllers\Admin\AdministrationController::class, 'roles'])->name('administration.roles');
        Route::get('/admin/administration/roles/create', [\App\Http\Controllers\Admin\AdministrationController::class, 'createRole'])->name('administration.roles.create');
        Route::post('/admin/administration/roles/create', [\App\Http\Controllers\Admin\AdministrationController::class, 'storeRole'])->name('administration.roles.create');
        Route::post('/admin/administration/roles/create', [\App\Http\Controllers\Admin\AdministrationController::class, 'storeRole'])->name('administration.roles.create');
        Route::get('/admin/administration/roles/{role}/edit', [\App\Http\Controllers\Admin\AdministrationController::class, 'editRole'])->name('administration.roles.edit');
        Route::patch('/admin/administration/roles/{role}/edit', [\App\Http\Controllers\Admin\AdministrationController::class, 'updateRole'])->name('administration.roles.edit');
        Route::delete('/admin/administration/roles/{role}/delete', [\App\Http\Controllers\Admin\AdministrationController::class, 'deleteRole'])->name('administration.roles.delete');

        Route::get('/admin/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');
        Route::patch('/admin/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'updatePassword'])->name('settings');
        Route::get('/admin/blog', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blog');
        Route::get('/admin/blog/create', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('blog.create');
        Route::post('/admin/blog/create', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blog.create');
        Route::get('/admin/blog/{blog}/details', [\App\Http\Controllers\Admin\BlogController::class, 'details'])->name('blog.details');
        Route::get('/admin/blog/{blog}/edit', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blog.edit');
        Route::patch('/admin/blog/{blog}/edit', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blog.edit');
        Route::delete('/admin/blog/{blog}/delete', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('blog.delete');

        Route::get('/admin/industries', [\App\Http\Controllers\Admin\IndustriesController::class, 'index'])->name('industries');
        Route::get('/admin/industries/create', [\App\Http\Controllers\Admin\IndustriesController::class, 'create'])->name('industries.create');
        Route::post('/admin/industries/create', [\App\Http\Controllers\Admin\IndustriesController::class, 'store'])->name('industries.create');
        Route::get('/admin/industries/{industry}/details', [\App\Http\Controllers\Admin\IndustriesController::class, 'show'])->name('industries.details');
        Route::get('/admin/industries/{industry}/edit', [\App\Http\Controllers\Admin\IndustriesController::class, 'edit'])->name('industries.edit');
        Route::patch('/admin/industries/{industry}/edit', [\App\Http\Controllers\Admin\IndustriesController::class, 'update'])->name('industries.edit');
        Route::delete('/admin/industries/{industry}/delete', [\App\Http\Controllers\Admin\IndustriesController::class, 'destroy'])->name('industries.delete');
        Route::get('/admin/industries/sub-industries-json/{industry}', [\App\Http\Controllers\Admin\BorrowersController::class, 'subIndustries'])->name('industries.sub-industries');

        Route::get('/admin/sub-industries', [\App\Http\Controllers\Admin\SubIndustriesController::class, 'index'])->name('sub-industries');
        Route::get('/admin/sub-industries/create', [\App\Http\Controllers\Admin\SubIndustriesController::class, 'create'])->name('sub-industries.create');
        Route::post('/admin/sub-industries/create', [\App\Http\Controllers\Admin\SubIndustriesController::class, 'store'])->name('sub-industries.create');
        Route::get('/admin/sub-industries/{subIndustry}/details', [\App\Http\Controllers\Admin\SubIndustriesController::class, 'show'])->name('sub-industries.details');
        Route::get('/admin/sub-industries/{subIndustry}/edit', [\App\Http\Controllers\Admin\SubIndustriesController::class, 'edit'])->name('sub-industries.edit');
        Route::patch('/admin/sub-industries/{subIndustry}/edit', [\App\Http\Controllers\Admin\SubIndustriesController::class, 'update'])->name('sub-industries.edit');
        Route::delete('/admin/sub-industries/{subIndustry}/delete', [\App\Http\Controllers\Admin\SubIndustriesController::class, 'destroy'])->name('sub-industries.delete');

        Route::get('/admin/loan-types', [\App\Http\Controllers\Admin\LoanTypesController::class, 'index'])->name('loan-types');
        Route::get('/admin/loan-types/create', [\App\Http\Controllers\Admin\LoanTypesController::class, 'create'])->name('loan-types.create');
        Route::post('/admin/loan-types/create', [\App\Http\Controllers\Admin\LoanTypesController::class, 'store'])->name('loan-types.create');
        Route::get('/admin/loan-types/loan-json/{loanType}', [\App\Http\Controllers\Admin\LoanTypesController::class, 'loanJson'])->name('loan-types.loan-json');
        Route::get('/admin/loan-types/{loanType}/details', [\App\Http\Controllers\Admin\LoanTypesController::class, 'show'])->name('loan-types.details');
        Route::get('/admin/loan-types/{loanType}/edit', [\App\Http\Controllers\Admin\LoanTypesController::class, 'edit'])->name('loan-types.edit');
        Route::patch('/admin/loan-types/{loanType}/edit', [\App\Http\Controllers\Admin\LoanTypesController::class, 'update'])->name('loan-types.edit');
        Route::delete('/admin/loan-types/{loanType}/delete', [\App\Http\Controllers\Admin\LoanTypesController::class, 'destroy'])->name('loan-types.delete');

        Route::get('/admin/loan-limits', [\App\Http\Controllers\Admin\LoanLimitsController::class, 'index'])->name('loan-limits');
        Route::get('/admin/loan-limits/create', [\App\Http\Controllers\Admin\LoanLimitsController::class, 'create'])->name('loan-limits.create');
        Route::post('/admin/loan-limits/create', [\App\Http\Controllers\Admin\LoanLimitsController::class, 'store'])->name('loan-limits.create');
        Route::get('/admin/loan-limits/{loanLimit}/details', [\App\Http\Controllers\Admin\LoanLimitsController::class, 'show'])->name('loan-limits.details');
        Route::get('/admin/loan-limits/{loanLimit}/edit', [\App\Http\Controllers\Admin\LoanLimitsController::class, 'edit'])->name('loan-limits.edit');
        Route::patch('/admin/loan-limits/{loanLimit}/edit', [\App\Http\Controllers\Admin\LoanLimitsController::class, 'update'])->name('loan-limits.edit');
        Route::delete('/admin/loan-limits/{loanLimit}/delete', [\App\Http\Controllers\Admin\LoanLimitsController::class, 'destroy'])->name('loan-limits.delete');
        Route::get('/admin/application-statuses', [\App\Http\Controllers\Admin\ApplicationStatusesController::class, 'index'])->name('application-statuses');
        Route::get('/admin/application-statuses/create', [\App\Http\Controllers\Admin\ApplicationStatusesController::class, 'create'])->name('application-statuses.create');
        Route::post('/admin/application-statuses/create', [\App\Http\Controllers\Admin\ApplicationStatusesController::class, 'store'])->name('application-statuses.create');
        Route::get('/admin/application-statuses/{applicationStatus}/details', [\App\Http\Controllers\Admin\ApplicationStatusesController::class, 'show'])->name('application-statuses.details');
        Route::get('/admin/application-statuses/{applicationStatus}/edit', [\App\Http\Controllers\Admin\ApplicationStatusesController::class, 'edit'])->name('application-statuses.edit');
        Route::patch('/admin/application-statuses/{applicationStatus}/edit', [\App\Http\Controllers\Admin\ApplicationStatusesController::class, 'update'])->name('application-statuses.edit');
        Route::delete('/admin/application-statuses/{applicationStatus}/delete', [\App\Http\Controllers\Admin\ApplicationStatusesController::class, 'destroy'])->name('application-statuses.delete');
    });
});

Route::name('borrower.')->group(function () {
    Route::middleware('guest:borrower')->group(function () {
        Route::view('/borrower/login', 'auth.borrower.login')->name('login');
        Route::post('/borrower/login', [\App\Http\Controllers\Borrower\AuthController::class, 'login']);
        Route::get('/borrower/register', [\App\Http\Controllers\Borrower\AuthController::class, 'register'])->name('register');
        Route::post('/borrower/register', [\App\Http\Controllers\Borrower\AuthController::class, 'processRegistration']);
        Route::get('/borrower/forgot-password', [\App\Http\Controllers\Borrower\ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');
        Route::post('/borrower/forgot-password', [\App\Http\Controllers\Borrower\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot-password');
        Route::get('/borrower/reset-password/{token}', [\App\Http\Controllers\Borrower\PasswordResetsController::class, 'showResetForm'])->name('password.reset');
        Route::post('/borrower/reset-password/{token}', [\App\Http\Controllers\Borrower\PasswordResetsController::class, 'reset'])->name('password.reset');
    });
    Route::middleware('auth:borrower')->group(function () {
        Route::post('/borrower/logout', [\App\Http\Controllers\Borrower\AuthController::class, 'logout'])->name('logout');
        Route::get('/borrower/company', [\App\Http\Controllers\Borrower\CompanyController::class, 'index'])->name('company');
        Route::get('/borrower/company/create', [\App\Http\Controllers\Borrower\CompanyController::class, 'create'])->name('company.create');
        Route::post('/borrower/company/create', [\App\Http\Controllers\Borrower\CompanyController::class, 'store'])->name('company.create');
        Route::get('/borrower/company/{business}/details', [\App\Http\Controllers\Borrower\CompanyController::class, 'show'])->name('company.details');
        Route::get('/borrower/company/{business}/edit', [\App\Http\Controllers\Borrower\CompanyController::class, 'edit'])->name('company.edit');
        Route::patch('/borrower/company/{business}/edit', [\App\Http\Controllers\Borrower\CompanyController::class, 'update'])->name('company.edit');
        Route::delete('/borrower/company/{business}/delete', [\App\Http\Controllers\Borrower\CompanyController::class, 'destroy'])->name('company.delete');
        Route::get('/borrower/company/{business}/bank-account/create', [\App\Http\Controllers\Borrower\CompanyController::class, 'createBankAccount'])->name('company.bank-account.create');
        Route::post('/borrower/company/{business}/bank-account/create', [\App\Http\Controllers\Borrower\CompanyController::class, 'storeBankAccount'])->name('company.bank-account.create');
        Route::get('/borrower/company/{business}/bank-account/edit', [\App\Http\Controllers\Borrower\CompanyController::class, 'editBankAccount'])->name('company.bank-account.edit');
        Route::patch('/borrower/company/{business}/bank-account/edit', [\App\Http\Controllers\Borrower\CompanyController::class, 'updateBankAccount'])->name('company.bank-account.edit');
        Route::get('/borrower/company/personnel', [\App\Http\Controllers\Borrower\CompanyController::class, 'personnel'])->name('company.personnel');
        Route::get('/borrower/company/personnel/create', [\App\Http\Controllers\Borrower\CompanyController::class, 'newPersonnel'])->name('company.personnel.create');
        Route::post('/borrower/company/personnel/create', [\App\Http\Controllers\Borrower\CompanyController::class, 'storePersonnel'])->name('company.personnel.create');
        Route::get('/borrower/company/personnel/{borrower}/detail', [\App\Http\Controllers\Borrower\CompanyController::class, 'personnelDetail'])->name('company.personnel.detail');
        Route::delete('/borrower/company/personnel/{borrower}/delete', [\App\Http\Controllers\Borrower\CompanyController::class, 'deletePersonnel'])->name('company.personnel.delete');
        Route::get('/borrower/company/documents', [\App\Http\Controllers\Borrower\CompanyController::class, 'documents'])->name('company.documents');
        Route::get('/borrower/company/documents/upload', [\App\Http\Controllers\Borrower\CompanyController::class, 'uploadDocument'])->name('company.documents.upload');
        Route::post('/borrower/company/documents/upload', [\App\Http\Controllers\Borrower\CompanyController::class, 'storeDocument'])->name('company.documents.upload');
        Route::delete('/borrower/company/documents/{document}/delete', [\App\Http\Controllers\Borrower\CompanyController::class, 'destroyDocument'])->name('company.documents.delete');
        Route::get('/borrower/applications', [\App\Http\Controllers\Borrower\ApplicationsController::class, 'index'])->name('applications');
        Route::get('/borrower/applications/create', [\App\Http\Controllers\Borrower\ApplicationsController::class, 'create'])->name('applications.create');
        Route::post('/borrower/applications/create', [\App\Http\Controllers\Borrower\ApplicationsController::class, 'store'])->name('applications.create');
        Route::get('/borrower/applications/overview', [\App\Http\Controllers\Borrower\ApplicationsController::class, 'overview'])->name('applications.overview');
        Route::get('/borrower/applications/{application}/details', [\App\Http\Controllers\Borrower\ApplicationsController::class, 'details'])->name('applications.details');
        Route::get('/borrower/applications/{application}/repayments', [\App\Http\Controllers\Borrower\ApplicationsController::class, 'repayments'])->name('applications.repayments');
        Route::get('/borrower/applications/loan-types/{loanType}', [\App\Http\Controllers\Borrower\ApplicationsController::class, 'loanJson'])->name('applications.loan-types');
        Route::get('/borrower/notifications', [\App\Http\Controllers\Borrower\NotificationsController::class, 'index'])->name('notifications');
        Route::get('/borrower/administration', [\App\Http\Controllers\Borrower\AdministrationController::class, 'index'])->name('administration');
        Route::get('/borrower/administration/permissions', [\App\Http\Controllers\Borrower\AdministrationController::class, 'permissions'])->name('administration.permissions');
        Route::get('/borrower/loans', [\App\Http\Controllers\Borrower\LoansController::class, 'index'])->name('loans');
        Route::get('/borrower/loans/history', [\App\Http\Controllers\Borrower\LoansController::class, 'history'])->name('loans.history');
    });
});

Route::name('consultant.')->group(function () {
    Route::middleware('guest:consultant')->group(function () {
        Route::view('/consultant/login', 'auth.consultant.login')->name('login');
        Route::post('/consultant/login', [\App\Http\Controllers\Consultant\AuthController::class, 'login']);
        Route::get('/consultant/register', [\App\Http\Controllers\Consultant\AuthController::class, 'register'])->name('register');
        Route::post('/consultant/register', [\App\Http\Controllers\Consultant\AuthController::class, 'processRegistration']);
        Route::get('/consultant/forgot-password', [\App\Http\Controllers\Consultant\ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');
        Route::post('/consultant/forgot-password', [\App\Http\Controllers\Consultant\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot-password');
        Route::get('/consultant/reset-password/{token}', [\App\Http\Controllers\Consultant\PasswordResetsController::class, 'showResetForm'])->name('password.reset');
        Route::post('/consultant/reset-password/{token}', [\App\Http\Controllers\Consultant\PasswordResetsController::class, 'reset'])->name('password.reset');
    });
    Route::middleware('auth:consultant')->group(function () {
        Route::post('/consultant/logout', [\App\Http\Controllers\Consultant\AuthController::class, 'logout'])->name('logout');
        Route::get('/consultant/profile', [\App\Http\Controllers\Consultant\DashboardController::class, 'index'])->name('profile');
        Route::get('/consultant/profile/edit', [\App\Http\Controllers\Consultant\DashboardController::class, 'profile'])->name('profile.edit');
        Route::post('/consultant/profile/save', [\App\Http\Controllers\Consultant\DashboardController::class, 'store'])->name('profile.save');
        Route::get('/consultant/tasks', [\App\Http\Controllers\Consultant\TasksController::class, 'index'])->name('tasks');
        Route::get('/consultant/tasks/{application}/details', [\App\Http\Controllers\Consultant\TasksController::class, 'details'])->name('tasks.details');
        Route::get('/consultant/tasks/{application}/repayments', [\App\Http\Controllers\Consultant\TasksController::class, 'repayments'])->name('tasks.repayments');
        Route::post('/consultant/tasks/{application}/update-status', [\App\Http\Controllers\Consultant\TasksController::class, 'updateStatus'])->name('tasks.update-status');
        Route::get('/consultant/notifications', [\App\Http\Controllers\Consultant\NotificationsController::class, 'index'])->name('notifications');
        Route::get('/consultant/settings', [\App\Http\Controllers\Consultant\SettingsController::class, 'index'])->name('settings');
        Route::get('/consultant/borrowers/all', [\App\Http\Controllers\Consultant\BorrowersController::class, 'index'])->name('borrowers');
        Route::get('/consultant/borrowers/corporate', [\App\Http\Controllers\Consultant\BorrowersController::class, 'corporate'])->name('borrowers.corporate');
        Route::get('/consultant/borrowers/blacklisted', [\App\Http\Controllers\Consultant\BorrowersController::class, 'blacklisted'])->name('borrowers.blacklisted');
        Route::get('/consultant/borrowers/details', [\App\Http\Controllers\Consultant\BorrowersController::class, 'details'])->name('borrowers.details');
        Route::get('/consultant/borrowers/{borrower}details', [\App\Http\Controllers\Consultant\BorrowersController::class, 'details'])->name('borrowers.details');
        Route::get('/consultant/borrowers/details/applications', [\App\Http\Controllers\Consultant\BorrowersController::class, 'applications'])->name('borrowers.details.applications');
        Route::get('/consultant/borrowers/details/documents', [\App\Http\Controllers\Consultant\BorrowersController::class, 'documents'])->name('borrowers.details.documents');
        Route::get('/consultant/borrowers/details/collect-money', [\App\Http\Controllers\Consultant\BorrowersController::class, 'detailsCollectMoney'])->name('borrowers.details.collect-money');
        Route::get('/consultant/borrowers/details/reminder-log', [\App\Http\Controllers\Consultant\BorrowersController::class, 'remindersLog'])->name('borrowers.details.reminder-log');
        Route::get('/consultant/borrowers/collect-money', [\App\Http\Controllers\Consultant\BorrowersController::class, 'collectMoney'])->name('borrowers.collect-money');
        Route::get('/consultant/borrowers/collect-money/details', [\App\Http\Controllers\Consultant\BorrowersController::class, 'collectMoneyBorrowerDetail'])->name('borrowers.collect-money.details');
        Route::get('/consultant/borrowers/personnel/{borrower}/details', [\App\Http\Controllers\Consultant\TasksController::class, 'personnelDetails'])->name('borrowers.personnel.details');
    });
});


Route::get('/api/login', [\App\Http\Controllers\Api\AppController::class, 'login']);
Route::get('/api/register', [\App\Http\Controllers\Api\AppController::class, 'register']);
