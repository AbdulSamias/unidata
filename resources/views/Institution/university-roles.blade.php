@extends('layouts.app')
@section('title', 'Roles')
@section('University_roles')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
    </head>

    <body>
        <header>
            <div class="container">
                <h1>University Roles & Responsibilities</h1>
                <p class="subtitle">Official guidelines for academic and administrative roles</p>
            </div>
            <div>
                <a href="{{ route('role.form') }}" class="btn bg-light text-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add Roles
                </a>
            </div>
        </header>

        <div class="container">
            <section id="academic-staff">
                <h2>1. Academic Staff</h2>

                <div class="role-category">
                    <h3>Professor</h3>
                    <ul>
                        <li>Conduct high-level research and publish scholarly work.</li>
                        <li>Deliver lectures, seminars, and supervise student research.</li>
                        <li>Mentor junior faculty and contribute to curriculum development.</li>
                        <li>Participate in academic committees and university governance.</li>
                    </ul>
                </div>

                <div class="role-category">
                    <h3>Associate/Assistant Professor</h3>
                    <ul>
                        <li>Teach undergraduate and postgraduate courses.</li>
                        <li>Engage in research and secure funding for projects.</li>
                        <li>Guide students in academic and research activities.</li>
                        <li>Assist in departmental administrative tasks.</li>
                    </ul>
                </div>

                <div class="role-category">
                    <h3>Lecturer/Instructor</h3>
                    <ul>
                        <li>Prepare and deliver course material.</li>
                        <li>Evaluate student performance through exams and assignments.</li>
                        <li>Provide academic support and feedback to students.</li>
                        <li>Collaborate with senior faculty on teaching improvements.</li>
                    </ul>
                </div>
            </section>

            <section id="admin-staff">
                <h2>2. Administrative Staff</h2>

                <div class="role-category">
                    <h3>Registrar</h3>
                    <ul>
                        <li>Oversee student admissions, records, and enrollment.</li>
                        <li>Ensure compliance with academic policies and regulations.</li>
                        <li>Manage graduation processes and degree certification.</li>
                        <li>Coordinate between faculty, students, and administration.</li>
                    </ul>
                </div>

                <div class="role-category">
                    <h3>Dean (Academic/Administration)</h3>
                    <ul>
                        <li>Lead faculty/department strategic planning.</li>
                        <li>Monitor teaching quality and faculty performance.</li>
                        <li>Handle budgeting and resource allocation.</li>
                        <li>Resolve student and staff grievances.</li>
                    </ul>
                </div>

                <div class="role-category">
                    <h3>Department Head/Chair</h3>
                    <ul>
                        <li>Supervise departmental academic programs.</li>
                        <li>Schedule courses and assign teaching duties.</li>
                        <li>Promote research initiatives and faculty development.</li>
                        <li>Liaise with university leadership on departmental needs.</li>
                    </ul>
                </div>
            </section>

            <section id="student-roles">
                <h2>3. Student Roles</h2>

                <div class="role-category">
                    <h3>Class Representative</h3>
                    <ul>
                        <li>Act as a bridge between students and faculty.</li>
                        <li>Communicate class concerns and feedback.</li>
                        <li>Assist in organizing academic/extra-curricular events.</li>
                    </ul>
                </div>

                <div class="role-category">
                    <h3>Student Council Member</h3>
                    <ul>
                        <li>Advocate for student welfare and rights.</li>
                        <li>Plan and manage student activities and clubs.</li>
                        <li>Collaborate with administration on policy feedback.</li>
                    </ul>
                </div>
            </section>

            <section id="support-staff">
                <h2>4. Support Staff</h2>

                <div class="role-category">
                    <h3>Lab Technicians</h3>
                    <ul>
                        <li>Maintain laboratory equipment and safety standards.</li>
                        <li>Assist students/faculty in research experiments.</li>
                        <li>Manage inventory and procurement of lab supplies.</li>
                    </ul>
                </div>

                <div class="role-category">
                    <h3>IT Support</h3>
                    <ul>
                        <li>Ensure smooth functioning of university IT systems.</li>
                        <li>Provide technical assistance to staff and students.</li>
                        <li>Maintain cybersecurity and data privacy protocols.</li>
                    </ul>
                </div>
            </section>

            <section id="conclusion">
                <h2>Conclusion</h2>
                <p>Clear role definitions enhance efficiency and accountability within the university. For detailed
                    policies, refer to the <a href="#">University Handbook</a> or contact the HR department.</p>
            </section>
        </div>

        <footer>
            <div class="container">
                <p>&copy; 2023 University Name. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a
                        href="#">Contact Us</a></p>
            </div>
        </footer>
    </body>

    </html>
@endsection
