@php
    $prefix = Request::route()->getprefix();
    $route = Route::current()->getName();
@endphp
{{-- @dd($route); --}}
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Stanton</b> College</h3>
                    </div>
                </a>
            </div>
        </div>
        <!-- sidebar menu-->

        <ul class="sidebar-menu" data-widget="tree">
            {{-- student siderber start --}}
            @if (Auth::user()->role == 'Student')
                <li class="{{ $route == 'student.dashboard' ? 'active' : '' }} ">
                    <a href="{{ route('student.dashboard') }}">
                        <i data-feather="pie-chart"></i>
                        <span> Student Dashboard</span>
                    </a>
                </li>

                <li class="treeview {{ $prefix == '/student/portal' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>My Subject</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'mysubject.view' ? 'active' : '' }}"><a
                                href="{{ route('mysubject.view') }}"><i class="ti-more"></i>View My Subject</a></li>

                    </ul>
                </li>
                <li class="treeview {{ $prefix == '/student/portal/assignment' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>My Assignment</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    @php
                        $studnetId = Auth::user()->id;
                        $semesterId = App\Models\AssignStudent::where('student_id', $studnetId)->pluck('semester_id');
                    @endphp

                    @foreach ($semesterId as $id)
                        @switch($id)
                            @case(1)
                                <ul class="treeview-menu">
                                    <li class="{{ $route == 'first.semester.assignment.view' ? 'active' : '' }}"><a
                                            href="{{ route('first.semester.assignment.view') }}"><i class="ti-more"></i>First
                                            Semester Assignment</a></li>

                                </ul>
                            @break

                            @case(2)
                                <ul class="treeview-menu">
                                    <li class="{{ $route == 'second.semester.assignment.view' ? 'active' : '' }}"><a
                                            href="{{ route('second.semester.assignment.view') }}"><i class="ti-more"></i>Second
                                            Semester Assignment</a></li>

                                </ul>
                            @break

                            @case(3)
                                <ul class="treeview-menu">
                                    <li class="{{ $route == 'third.semester.assignment.view' ? 'active' : '' }}"><a
                                            href="{{ route('third.semester.assignment.view') }}"><i class="ti-more"></i>Third
                                            Semester Assignment</a></li>

                                </ul>
                            @break

                            @case(4)
                                <ul class="treeview-menu">
                                    <li class="{{ $route == 'fourth.semester.assignment.view' ? 'active' : '' }}"><a
                                            href="{{ route('fourth.semester.assignment.view') }}"><i class="ti-more"></i>Fourth
                                            Semester Assignment</a></li>

                                </ul>
                            @break

                            @default
                        @endswitch
                    @endforeach


                </li>
                <li class="treeview {{ $prefix == '/student/portal/my/class/routine' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>My Class Routine</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'my.class.routine.view' ? 'active' : '' }}"><a
                                href="{{ route('my.class.routine.view') }}"><i class="ti-more"></i>View Class Routine</a></li>

                    </ul>
                </li>
            @endif
            {{-- student siderber end --}}
            {{-- Teacher sideber start --}}
            @if (Auth::user()->role == 'Teacher')
                <li class="{{ $route == 'teacher.dashboard' ? 'active' : '' }} ">
                    <a href="{{ route('teacher.dashboard') }}">
                        <i data-feather="pie-chart"></i>
                        <span> Teacher Dashboard</span>
                    </a>
                </li>
                <li class="treeview {{ $prefix == '/teacher/portal' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Study Material</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'assignment.view' ? 'active' : '' }}"><a
                                href="{{ route('assignment.view') }}"><i class="ti-more"></i>View Assignment</a></li>
                    </ul>
                </li>
                <li class="treeview {{ $prefix == '/teacher/portal/student/class/routine' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Student Class Routine </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'student.class.routine.view' ? 'active' : '' }}"><a
                                href="{{ route('student.class.routine.view') }}"><i class="ti-more"></i>View Student Class Routine</a></li>
                    </ul>
                </li>
            @endif
            {{-- Teacher sideber end --}}
            @if (Auth::user()->role == 'Admin')
                <li class="{{ $route == 'admin.dashboard' ? 'active' : '' }} ">
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="pie-chart"></i>
                        <span> Admin Dashboard</span>
                    </a>
                </li>

                <li class="treeview {{ $prefix == '/users' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Manage User</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'user.view' ? 'active' : '' }}"><a href="{{ route('user.view') }}"><i
                                    class="ti-more"></i>View User</a></li>
                        <li class="{{ $route == 'user.add' ? 'active' : '' }}"><a href="{{ route('user.add') }}"><i
                                    class="ti-more"></i>Add User</a></li>
                    </ul>
                </li>
            @endif
            <li class="treeview {{ $prefix == '/profile' ? 'active' : '' }} ">
                <a href="#">
                    <i data-feather="hard-drive"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'profile.view' ? 'active' : '' }}"><a
                            href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
                    <li class="{{ $route == 'password.view' ? 'active' : '' }}"><a
                            href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>
            @if (Auth::user()->role == 'Admin')
                <li class="treeview {{ $prefix == '/setups' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Setup Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'student.class.view' ? 'active' : '' }}"><a
                                href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
                        <li class="{{ $route == 'student.year.view' ? 'active' : '' }}"><a
                                href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
                        <li class="{{ $route == 'student.month.view' ? 'active' : '' }}"><a
                                href="{{ route('student.month.view') }}"><i class="ti-more"></i>Student Month</a></li>
                        <li class="{{ $route == 'student.batch.view' ? 'active' : '' }}"><a
                                href="{{ route('student.batch.view') }}"><i class="ti-more"></i>Student Batch</a></li>
                        <li class="{{ $route == 'student.semester.view' ? 'active' : '' }}"><a
                                href="{{ route('student.semester.view') }}"><i class="ti-more"></i>Student
                                Semester</a></li>
                        <li class="{{ $route == 'student.group.view' ? 'active' : '' }}"><a
                                href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a>
                        </li>
                        <li class="{{ $route == 'class.room.view' ? 'active' : '' }}"><a
                                href="{{ route('class.room.view') }}"><i class="ti-more"></i>Class Room</a></li>
                        <li class="{{ $route == 'student.shift.view' ? 'active' : '' }}"><a
                                href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a>
                        </li>
                        <li class="{{ $route == 'fee.category.view' ? 'active' : '' }}"><a
                                href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
                        <li class="{{ $route == 'fee.amount.view' ? 'active' : '' }}"><a
                                href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a>
                        </li>
                        <li class="{{ $route == 'exam.type.view' ? 'active' : '' }}"><a
                                href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
                        <li class="{{ $route == 'school.subject.view' ? 'active' : '' }}"><a
                                href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a>
                        </li>
                        <li class="{{ $route == 'assign.subject.view' ? 'active' : '' }}"><a
                                href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a>
                        </li>
                        <li class="{{ $route == 'designation.view' ? 'active' : '' }}"><a
                                href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation </a></li>
                    </ul>
                </li>
                <li class="treeview {{ $prefix == '/students' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="package"></i> <span>Student Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'student.registration.view' ? 'active' : '' }}"><a
                                href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student
                                Registration</a></li>
                        <li class="{{ $route == 'roll.generate.view' ? 'active' : '' }}"><a
                                href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a>
                        </li>
                        <li class="{{ $route == 'registration.fee.view' ? 'active' : '' }}"><a
                                href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee
                            </a>
                        </li>
                        <li class="{{ $route == 'monthly.fee.view' ? 'active' : '' }}"><a
                                href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee </a></li>
                        <li class="{{ $route == 'exam.fee.view' ? 'active' : '' }}"><a
                                href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee </a></li>
                    </ul>
                </li>
                <li class="treeview {{ $prefix == '/employees' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="file"></i> <span>Employee Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'employee.registration.view' ? 'active' : '' }}"><a
                                href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee
                                Registration</a></li>
                        <li class="{{ $route == 'employee.salary.view' ? 'active' : '' }}"><a
                                href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a>
                        </li>
                        <li class="{{ $route == 'employee.leave.view' ? 'active' : '' }}"><a
                                href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave
                                View</a>
                        </li>
                        <li class="{{ $route == 'employee.attendance.view' ? 'active' : '' }}"><a
                                href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee
                                Attendance
                            </a></li>
                        <li class="{{ $route == 'employee.monthly.salary' ? 'active' : '' }}"><a
                                href="{{ route('employee.monthly.salary') }}"><i class="ti-more"></i>Employee Monthly
                                Salary </a></li>
                    </ul>
                </li>
                <li class="treeview {{ $prefix == '/teacher/assign' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="file"></i> <span>Teachers Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'teacher.assign.view' ? 'active' : '' }}"><a
                                href="{{ route('teacher.assign.view') }}"><i class="ti-more"></i>Assign
                                Teacher </a></li>

                    </ul>
                </li>
                <li class="treeview {{ $prefix == '/parents' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="file"></i> <span>Parents Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'parents.registration.view' ? 'active' : '' }}"><a
                                href="{{ route('parents.registration.view') }}"><i class="ti-more"></i>Parents
                                Registration</a></li>

                    </ul>
                </li>
                {{-- <li class="treeview {{ $prefix == '/marks' ? 'active' : '' }} ">
                <a href="#">
                    <i data-feather="grid"></i> <span>Marks Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'marks.entry.add' ? 'active' : '' }}"><a
                            href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Marks Entry</a></li>
                    <li class="{{ $route == 'marks.entry.edit' ? 'active' : '' }}"><a
                            href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Marks Edit</a></li>
                    <li class="{{ $route == 'marks.entry.grade' ? 'active' : '' }}"><a
                            href="{{ route('marks.entry.grade') }}"><i class="ti-more"></i>Marks Grade</a></li>
                </ul>
            </li> --}}
                {{-- <li class="treeview {{ $prefix == '/accounts' ? 'active' : '' }} ">
                <a href="#">
                    <i data-feather="server"></i> <span>Accounts Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'student.fee.view' ? 'active' : '' }}"><a
                            href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Student Fee</a></li>
                    <li class="{{ $route == 'account.salary.view' ? 'active' : '' }}"><a
                            href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
                    <li class="{{ $route == 'other.cost.view' ? 'active' : '' }}"><a
                            href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Other Cost</a></li>
                </ul>
            </li> --}}
                {{-- <li class="header nav-small-cap">Report Interface</li>
            <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }} ">
                <a href="#">
                    <i data-feather="inbox"></i> <span>Reports Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'monthly.profit.view' ? 'active' : '' }}"><a
                            href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly-Yearly
                            Profit</a></li>
                    <li class="{{ $route == 'marksheet.generate.view' ? 'active' : '' }}"><a
                            href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>MarkSheet
                            Generate</a></li>
                    <li class="{{ $route == 'attendance.report.view' ? 'active' : '' }}"><a
                            href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Attendance Report</a>
                    </li>
                    <li class="{{ $route == 'student.result.view' ? 'active' : '' }}"><a
                            href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Result</a>
                    </li>
                    <li class="{{ $route == 'student.idcard.view' ? 'active' : '' }}"><a
                            href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student Id Card</a>
                    </li>
                </ul>
            </li> --}}
            @endif
        </ul>
    </section>
    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
