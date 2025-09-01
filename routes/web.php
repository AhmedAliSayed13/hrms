<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['middleware' => ['web']], function () {

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'AuthController@showLogin')->middleware('strip_headers');

    Route::post('/', 'AuthController@doLogin')->middleware('strip_headers');

    Route::get('reset-password', 'AuthController@resetPassword')->middleware(
        'strip_headers'
    );

    Route::post(
        'reset-password',
        'AuthController@processPasswordReset'
    )->middleware('strip_headers');

    Route::get('register', 'AuthController@showRegister')->middleware(
        'strip_headers'
    );
});

Route::group(['middleware' => ['auth', 'strip_headers']], function () {
    Route::get('home', 'HomeController@index')->middleware('strip_headers');

    Route::get('change-password', 'AuthController@changePassword')->middleware(
        'strip_headers'
    );

    Route::post(
        'change-password',
        'AuthController@processPasswordChange'
    )->middleware('strip_headers');

    Route::get('logout', 'AuthController@doLogout')->middleware(
        'strip_headers'
    );

    Route::get('welcome', 'AuthController@welcome')->middleware(
        'strip_headers'
    );

    Route::get('not-found', 'AuthController@notFound')->middleware(
        'strip_headers'
    );

    Route::get('dashboard', [
        'as'   => 'dashboard',
        'uses' => 'AuthController@dashboard',
    ])->middleware('strip_headers');

    Route::get('profile', 'ProfileController@show')->middleware(
        'strip_headers'
    );

    //Routes for add-employees

    Route::get('add-employee', [
        'as'   => 'add-employee',
        'uses' => 'EmpController@addEmployee',
    ])->middleware('strip_headers','permission:employee-management');

    Route::post('add-employee', [
        'as'   => 'add-employee',
        'uses' => 'EmpController@processEmployee',
    ])->middleware('strip_headers','permission:employee-management');

    Route::get('employee-manager', [
        'as'   => 'employee-manager',
        'uses' => 'EmpController@showEmployee',
    ])->middleware('strip_headers','permission:employee-management');

    Route::post('employee-manager', 'EmpController@searchEmployee')->middleware(
        'strip_headers','permission:employee-management'
    );

    Route::get('upload-emp', [
        'as'   => 'upload-emp',
        'uses' => 'EmpController@importFile',
    ])->middleware('strip_headers','permission:employee-management');

    Route::post('upload-emp', [
        'as'   => 'upload-emp',
        'uses' => 'EmpController@uploadFile',
    ])->middleware('strip_headers','permission:employee-management');

    Route::get('edit-emp/{id}', [
        'as'   => 'edit-emp',
        'uses' => 'EmpController@showEdit',
    ])->middleware('strip_headers','permission:employee-management');

    Route::post('edit-emp/{id}', [
        'as'   => 'edit-emp',
        'uses' => 'EmpController@doEdit',
    ])->middleware('strip_headers','permission:employee-management');

    Route::get('delete-emp/{id}', [
        'as'   => 'delete-emp',
        'uses' => 'EmpController@doDelete',
    ])->middleware('strip_headers','permission:employee-management');

    //Routes for Bank Account details

    Route::get('bank-account-details', [
        'uses' => 'EmpController@showDetails',
    ])->middleware('strip_headers');

    Route::post('update-account-details', [
        'uses' => 'EmpController@updateAccountDetail',
    ])->middleware('strip_headers');

    //Routes for Team.

    Route::get('add-team', [
        'as'   => 'add-team',
        'uses' => 'TeamController@addTeam',
    ])->middleware('strip_headers','permission:team-management');

    Route::post('add-team', [
        'as'   => 'add-team',
        'uses' => 'TeamController@processTeam',
    ])->middleware('strip_headers','permission:team-management');

    Route::get('team-listing', [
        'as'   => 'team-listing',
        'uses' => 'TeamController@showTeam',
    ])->middleware('strip_headers','permission:team-management');

    Route::get('edit-team/{id}', [
        'as'   => 'edit-team',
        'uses' => 'TeamController@showEdit',
    ])->middleware('strip_headers','permission:team-management');

    Route::post('edit-team/{id}', [
        'as'   => 'edit-team',
        'uses' => 'TeamController@doEdit',
    ])->middleware('strip_headers','permission:team-management');

    Route::get('delete-team/{id}', [
        'as'   => 'delete-team',
        'uses' => 'TeamController@doDelete',
    ])->middleware('strip_headers','permission:team-management');

    //Routes for Role.

    Route::get('add-role', [
        'as'   => 'add-role',
        'uses' => 'RoleController@addRole',
    ])->middleware('strip_headers');

    Route::post('add-role', [
        'as'   => 'add-role',
        'uses' => 'RoleController@processRole',
    ])->middleware('strip_headers');

    Route::get('role-list', [
        'as'   => 'role-list',
        'uses' => 'RoleController@showRole',
    ])->middleware('strip_headers');

    Route::get('edit-role/{id}', [
        'as'   => 'edit-role',
        'uses' => 'RoleController@showEdit',
    ])->middleware('strip_headers');

    Route::post('edit-role/{id}', [
        'as'   => 'edit-role',
        'uses' => 'RoleController@doEdit',
    ])->middleware('strip_headers');

    Route::get('delete-role/{id}', [
        'as'   => 'delete-role',
        'uses' => 'RoleController@doDelete',
    ])->middleware('strip_headers');

    //Routes for Expense.

    Route::get('add-expense', [
        'as'   => 'add-expense',
        'uses' => 'ExpenseController@addExpense',
    ])->middleware('strip_headers');

    Route::post('add-expense', [
        'as'   => 'add-expense',
        'uses' => 'ExpenseController@processExpense',
    ])->middleware('strip_headers');

    Route::get('expense-list', [
        'as'   => 'expense-list',
        'uses' => 'ExpenseController@showExpense',
    ])->middleware('strip_headers');

    Route::get('edit-expense/{id}', [
        'as'   => 'edit-expense',
        'uses' => 'ExpenseController@showEdit',
    ])->middleware('strip_headers');

    Route::post('edit-expense/{id}', [
        'as'   => 'edit-expense',
        'uses' => 'ExpenseController@doEdit',
    ])->middleware('strip_headers');

    Route::get('delete-expense/{id}', [
        'as'   => 'delete-expense',
        'uses' => 'ExpenseController@doDelete',
    ])->middleware('strip_headers');

    //Routes for Leave.

    Route::get('add-leave-type', [
        'as'   => 'add-leave-type',
        'uses' => 'LeaveController@addLeaveType',
    ])->middleware('strip_headers');

    Route::post('add-leave-type', [
        'as'   => 'add-leave-type',
        'uses' => 'LeaveController@processLeaveType',
    ])->middleware('strip_headers');

    Route::get('leave-type-listing', [
        'as'   => 'leave-type-listing',
        'uses' => 'LeaveController@showLeaveType',
    ])->middleware('strip_headers');

    Route::get('edit-leave-type/{id}', [
        'as'   => 'edit-leave-type',
        'uses' => 'LeaveController@showEdit',
    ])->middleware('strip_headers');

    Route::post('edit-leave-type/{id}', [
        'as'   => 'edit-leave-type',
        'uses' => 'LeaveController@doEdit',
    ])->middleware('strip_headers');

    Route::get('delete-leave-type/{id}', [
        'as'   => 'delete-leave-type',
        'uses' => 'LeaveController@doDelete',
    ])->middleware('strip_headers');

    Route::get('apply-leave', [
        'as'   => 'apply-leave',
        'uses' => 'LeaveController@doApply',
    ])->middleware('strip_headers');

    Route::post('apply-leave', [
        'as'   => 'apply-leave',
        'uses' => 'LeaveController@processApply',
    ])->middleware('strip_headers');

    Route::get('my-leave-list', [
        'as'   => 'my-leave-list',
        'uses' => 'LeaveController@showMyLeave',
    ])->middleware('strip_headers');

    Route::get('total-leave-list', [
        'as'   => 'total-leave-list',
        'uses' => 'LeaveController@showAllLeave',
    ])->middleware('strip_headers');

    Route::post('total-leave-list', 'LeaveController@searchLeave')->middleware(
        'strip_headers'
    );

    Route::get('leave-drafting', [
        'as'   => 'leave-drafting',
        'uses' => 'LeaveController@showLeaveDraft',
    ])->middleware('strip_headers');

    Route::post('leave-drafting', [
        'as'   => 'leave-drafting',
        'uses' => 'LeaveController@createLeaveDraft',
    ])->middleware('strip_headers');

    //Routes for Attendance.

    Route::get('attendance-upload', [
        'as'   => 'attendance-upload',
        'uses' => 'AttendanceController@importAttendanceFile',
    ])->middleware('strip_headers');

    Route::post('attendance-upload', [
        'as'   => 'attendance-upload',
        'uses' => 'AttendanceController@uploadFile',
    ])->middleware('strip_headers');

    Route::get('attendance-manager', [
        'as'   => 'attendance-manager',
        'uses' => 'AttendanceController@showSheetDetails',
    ])->middleware('strip_headers');

    Route::post('attendance-manager', [
        'as'   => 'attendance-manager',
        'uses' => 'AttendanceController@searchAttendance',
    ])->middleware('strip_headers');

    Route::get('delete-file/{id}', [
        'as'   => 'delete-file',
        'uses' => 'AttendanceController@doDelete',
    ])->middleware('strip_headers');

    //Routes for Assets.

    Route::get('add-asset', [
        'as'   => 'add-asset',
        'uses' => 'AssetController@addAsset',
    ])->middleware('strip_headers');

    Route::post('add-asset', [
        'as'   => 'add-asset',
        'uses' => 'AssetController@processAsset',
    ])->middleware('strip_headers');

    Route::get('asset-listing', [
        'as'   => 'asset-listing',
        'uses' => 'AssetController@showAsset',
    ])->middleware('strip_headers');

    Route::get('edit-asset/{id}', [
        'as'   => 'edit-asset',
        'uses' => 'AssetController@showEdit',
    ])->middleware('strip_headers');

    Route::post('edit-asset/{id}', [
        'as'   => 'edit-asset',
        'uses' => 'AssetController@doEdit',
    ])->middleware('strip_headers');

    Route::get('delete-asset/{id}', [
        'as'   => 'delete-asset',
        'uses' => 'AssetController@doDelete',
    ])->middleware('strip_headers');

    Route::get('assign-asset', [
        'as'   => 'assign-asset',
        'uses' => 'AssetController@doAssign',
    ])->middleware('strip_headers');

    Route::post('assign-asset', [
        'as'   => 'assign-asset',
        'uses' => 'AssetController@processAssign',
    ])->middleware('strip_headers');

    Route::get('assignment-listing', [
        'as'   => 'assignment-listing',
        'uses' => 'AssetController@showAssignment',
    ])->middleware('strip_headers');

    Route::get('edit-asset-assignment/{id}', [
        'as'   => 'edit-asset-assignment',
        'uses' => 'AssetController@showEditAssign',
    ])->middleware('strip_headers');

    Route::post('edit-asset-assignment/{id}', [
        'as'   => 'edit-asset-assignment',
        'uses' => 'AssetController@doEditAssign',
    ])->middleware('strip_headers');

    Route::get('delete-asset-assignment/{id}', [
        'as'   => 'delete-asset-assignment',
        'uses' => 'AssetController@doDeleteAssign',
    ])->middleware('strip_headers');

    Route::get('hr-policy', [
        'as'   => 'hr-policy',
        'uses' => 'IndexController@showPolicy',
    ])->middleware('strip_headers');

    Route::get('download-forms', [
        'as'   => 'download-forms',
        'uses' => 'IndexController@showForms',
    ])->middleware('strip_headers');

    Route::get('download/{name}', 'DownloadController@downloadForms');

    Route::get('calendar', 'AuthController@calendar');

    //Routes for Leave and Holiday.

    Route::post('get-leave-count', 'LeaveController@getLeaveCount')->middleware(
        'strip_headers'
    );

    Route::post('approve-leave', 'LeaveController@approveLeave')->middleware(
        'strip_headers'
    );

    Route::post(
        'disapprove-leave',
        'LeaveController@disapproveLeave'
    )->middleware('strip_headers');

    Route::get('add-holidays', 'LeaveController@showHolidays')->middleware(
        'strip_headers'
    );

    Route::post('add-holidays', 'LeaveController@processHolidays')->middleware(
        'strip_headers'
    );

    Route::get('holiday-listing', 'LeaveController@showHoliday')->middleware(
        'strip_headers'
    );

    Route::get(
        'edit-holiday/{id}',
        'LeaveController@showEditHoliday'
    )->middleware('strip_headers');

    Route::post(
        'edit-holiday/{id}',
        'LeaveController@doEditHoliday'
    )->middleware('strip_headers');

    Route::get(
        'delete-holiday/{id}',
        'LeaveController@deleteHoliday'
    )->middleware('strip_headers');

    //Routes for Event.

    Route::get('create-event', [
        'as'   => 'create-event',
        'uses' => 'EventController@index',
    ])->middleware('strip_headers');

    Route::post('create-event', 'EventController@createEvent')->middleware(
        'strip_headers'
    );

    Route::get('create-meeting', 'EventController@meeting')->middleware(
        'strip_headers'
    );

    Route::post('create-meeting', 'EventController@createMeeting')->middleware(
        'strip_headers'
    );

    //Routes for Award.

    Route::get('add-award', ['uses' => 'AwardController@addAward'])->middleware(
        'strip_headers'
    );

    Route::post('add-award', [
        'uses' => 'AwardController@processAward',
    ])->middleware('strip_headers');

    Route::get('award-listing', [
        'uses' => 'AwardController@showAward',
    ])->middleware('strip_headers');

    Route::get('edit-award/{id}', [
        'uses' => 'AwardController@showAwardEdit',
    ])->middleware('strip_headers');

    Route::post('edit-award/{id}', [
        'uses' => 'AwardController@doAwardEdit',
    ])->middleware('strip_headers');

    Route::get('delete-award/{id}', [
        'uses' => 'AwardController@doAwardDelete',
    ])->middleware('strip_headers');

    Route::get('assign-award', [
        'uses' => 'AwardController@assignAward',
    ])->middleware('strip_headers');

    Route::post('assign-award', [
        'uses' => 'AwardController@processAssign',
    ])->middleware('strip_headers');

    Route::get('awardees-listing', [
        'uses' => 'AwardController@showAwardAssign',
    ])->middleware('strip_headers');

    Route::get('edit-award-assignment/{id}', [
        'uses' => 'AwardController@showAssignEdit',
    ])->middleware('strip_headers');

    Route::post('edit-award-assignment/{id}', [
        'uses' => 'AwardController@doAssignEdit',
    ])->middleware('strip_headers');

    Route::get('delete-award-assignment/{id}', [
        'uses' => 'AwardController@doAssignDelete',
    ])->middleware('strip_headers');

    //Routes for Prmotion.

    Route::get('promotion', [
        'uses' => 'EmpController@doPromotion',
    ])->middleware('strip_headers');

    Route::post('promotion', [
        'uses' => 'EmpController@processPromotion',
    ])->middleware('strip_headers');

    Route::get('show-promotion', [
        'uses' => 'EmpController@showPromotion',
    ])->middleware('strip_headers');

    Route::post('get-promotion-data', [
        'uses' => 'EmpController@getPromotionData',
    ])->middleware('strip_headers');

    //Routes for Training.

    Route::get('add-training-program', [
        'uses' => 'TrainingController@addTrainingProgram',
    ])->middleware('strip_headers');

    Route::post('add-training-program', [
        'uses' => 'TrainingController@processTrainingProgram',
    ])->middleware('strip_headers');

    Route::get('show-training-program', [
        'uses' => 'TrainingController@showTrainingProgram',
    ])->middleware('strip_headers');

    Route::get('edit-training-program/{id}', [
        'uses' => 'TrainingController@doEditTrainingProgram',
    ])->middleware('strip_headers');

    Route::post('edit-training-program/{id}', [
        'uses' => 'TrainingController@processEditTrainingProgram',
    ])->middleware('strip_headers');

    Route::get('delete-training-program/{id}', [
        'uses' => 'TrainingController@deleteTrainingProgram',
    ])->middleware('strip_headers');

    Route::get('add-training-invite', [
        'uses' => 'TrainingController@addTrainingInvite',
    ])->middleware('strip_headers');

    Route::post('add-training-invite', [
        'uses' => 'TrainingController@processTrainingInvite',
    ])->middleware('strip_headers');

    Route::get('show-training-invite', [
        'uses' => 'TrainingController@showTrainingInvite',
    ])->middleware('strip_headers');

    Route::get('edit-training-invite/{id}', [
        'uses' => 'TrainingController@doEditTrainingInvite',
    ])->middleware('strip_headers');

    Route::post('edit-training-invite/{id}', [
        'uses' => 'TrainingController@processEditTrainingInvite',
    ])->middleware('strip_headers');

    Route::get('delete-training-invite/{id}', [
        'uses' => 'TrainingController@deleteTrainingInvite',
    ])->middleware('strip_headers');

    Route::post('status-update', 'UpdateController@index');

    Route::post('post-reply', 'UpdateController@reply');

    Route::get('post/{id}', 'UpdateController@post');

    /** Routes for clients **/
    Route::get('add-client', 'ClientController@addClient')
        ->middleware('strip_headers')
        ->name('add-client');

    Route::post('add-client', 'ClientController@saveClient')->middleware(
        'strip_headers'
    );

    Route::get('list-client', 'ClientController@listClients')
        ->middleware('strip_headers')
        ->name('list-client');

    Route::get('edit-client/{clientId}', 'ClientController@showEdit')
        ->middleware('strip_headers')
        ->name('edit-client');

    Route::post(
        'edit-client/{clientId}',
        'ClientController@saveClientEdit'
    )->middleware('strip_headers');

    Route::get(
        'delete-list/{clientId}',
        'ClientController@doDelete'
    )->middleware('strip_headers');

    /** Routes for projects **/
    Route::get(
        'validate-code/{code}',
        'ClientController@validateCode'
    )->middleware('strip_headers');

    Route::get('add-project', 'ProjectController@addProject')
        ->name('add-project')
        ->middleware('strip_headers');

    Route::post('add-project', 'ProjectController@saveProject')->middleware(
        'strip_headers'
    );

    Route::get('edit-project/{projectId}', 'ProjectController@showEdit')->name(
        'edit-project'
    );

    //    Route::post('edit-project/{projectId}', 'ProjectController@saveProjectEdit');

    Route::get('list-project', 'ProjectController@listProject')->name(
        'list-project'
    );

    Route::get('edit-project/{id}', [
        'as'   => 'edit-project',
        'uses' => 'ProjectController@showEdit',
    ]);

    Route::post('edit-project/{id}', [
        'as'   => 'edit-project',
        'uses' => 'ProjectController@doEdit',
    ]);

    Route::get('delete-project/{id}', [
        'as'   => 'delete-project',
        'uses' => 'ProjectController@doDelete',
    ]);

    Route::get('assign-project', [
        'as'   => 'assign-project',
        'uses' => 'ProjectController@doAssign',
    ]);

    Route::post('assign-project', [
        'as'   => 'assign-project',
        'uses' => 'ProjectController@processAssign',
    ]);

    Route::get('project-assignment-listing', [
        'as'   => 'project-assignment-listing',
        'uses' => 'ProjectController@showProjectAssignment',
    ]);

    Route::get('edit-project-assignment/{id}', [
        'as'   => 'edit-project-assignment',
        'uses' => 'ProjectController@showEditAssign',
    ]);

    Route::post('edit-project-assignment/{id}', [
        'as'   => 'edit-project-assignment',
        'uses' => 'ProjectController@doEditAssign',
    ]);

    Route::get('delete-project-assignment/{id}', [
        'as'   => 'delete-project-assignment',
        'uses' => 'ProjectController@doDeleteAssign',
    ]);

    //Route::get('assign-project', 'ProjectController@assignProject')->name('assign-project');
});

Route::get('test', 'TestController@test')->name('test');

Route::get('/show-headers', function (\Illuminate\Http\Request $request) {
    $headersCount = $request->headers->all();
    return $headersCount;
});

Route::get('/response-headers', function () {
    $response = response('Test response');
    // جلب جميع رؤوس الـ Response
    $headers = $response->headers->all();

    // عرض عدد الرؤوس ومحتواها (اختياري)
    return response()->json([
        'count'   => count($headers),
        'headers' => $headers,
    ]);
});
