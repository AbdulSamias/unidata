@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('admin-dashboard')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>University Management Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>
        <div class="dashboard-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-brand active">
                        <i class="bi bi-building"></i>
                        <span>Dashboard</span>
                    </div>
                </div>

                <ul class="nav flex-column">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all.university.names') }}">
                            <i class="bi bi-building"></i>
                            <span>Universities</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('university.roles')}}">
                            <i class="bi bi-speedometer2"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-book"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people"></i>
                            <span>Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bar-chart"></i>
                            <span>Analytics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-envelope"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link" href="#">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Header -->
                <div class="dashboard-header">
                    <div class="page-title">
                        <h1>University Management Dashboard</h1>
                        <p>Monitor and manage all universities in one place</p>
                    </div>

                    <div class="header-actions">
                        

                        <div class="user-profile">
                            <div class="user-avatar">{{auth()->user()->name[0]}}</div>
                            <div class="user-info">
                                <h5 class="name">Admin User</h5>
                                <h5 class="role"> {{auth()->user()->name}} </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stats-card">
                        <div class="stats-icon icon-primary">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="stats-content">
                            <div class="number">{{ $total_university }}</div>
                            <div class="label">Total Universities}</div>
                            <div class="stats-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                <span>12% from last month</span>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-icon icon-success">
                            <i class="bi bi-book"></i>
                        </div>
                        <div class="stats-content">
                            <div class="number">{{ $total_course }}</div>
                            <div class="label">Total Courses</div>
                            <div class="stats-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                <span>8% from last month</span>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-icon icon-warning">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="stats-content">
                            <div class="number">{{ $student_count }}</div>
                            <div class="label">Total Students</div>
                            <div class="stats-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                <span>5.2% from last month</span>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-icon icon-info">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="stats-content">
                            <div class="number">84%</div>
                            <div class="label">Engagement Rate</div>
                            <div class="stats-trend trend-down">
                                <i class="bi bi-arrow-down"></i>
                                <span>1.3% from last month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts-row">
                    <div class="chart-card">
                        <div class="chart-header">
                            <div class="chart-title">Courses by University</div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-secondary">Monthly</button>
                                <button class="btn btn-sm btn-primary">Yearly</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="coursesChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <div class="chart-title">University Distribution</div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-secondary">View All</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="distributionChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Universities List -->
                <div class="universities-card">
                    <div class="chart-header">
                        <div class="chart-title">Top Universities</div>
                        <div class="search-container">
                            <i class="bi bi-search"></i>
                            <input type="text" name="search" class="form-control" value="{{ request('search')}}" placeholder="Search...">
                        </div>
                        <a href="{{ route('university.store') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i> Add University
                        </a>
                    </div>
                    @if ($universities->count())

                        @foreach ($universities as $university)
                            <div class="university-card">
                                <div class="university-logo">{{ $university->university_name[0] }}</div>
                                <div class="university-info">
                                    <div class="university-name">{{ $university->university_name }}</div>
                                    <div class="university-meta">
                                        <span class="badge badge-primary">USA</span>
                                        <span class="badge badge-success">{{ $uni_course_count->get($university->id, 0) }}
                                            Courses</span>
                                        <span class="badge badge-warning">Rank #1</span>
                                    </div>
                                    <div class="university-location">
                                        <i class="bi bi-geo-alt"></i> Cambridge, Massachusetts • Founded 1861
                                    </div>
                                </div>
                                <div class="university-actions">
                                    <a href="{{ route('university.courses', $university->id) }}"
                                        class="action-btn btn-view">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('show.courses', $university->id) }}" class="action-btn btn-add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a href="{{ route('uni.name.update.form', $university->id) }}"
                                        class="action-btn btn-edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('university.store.destroy', $university->id) }}"
                                        class="action-btn btn-delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <script>
            // Initialize Charts
            document.addEventListener('DOMContentLoaded', function() {
                // Courses Chart
                const coursesCtx = document.getElementById('coursesChart').getContext('2d');
                const coursesChart = new Chart(coursesCtx, {
                    type: 'bar',
                    data: {
                        labels: ['MIT', 'Stanford', 'Harvard', 'Cambridge', 'Oxford', 'ETH Zurich'],
                        datasets: [{
                            label: 'Number of Courses',
                            data: [32, 28, 36, 24, 26, 18],
                            backgroundColor: [
                                'rgba(67, 97, 238, 0.7)',
                                'rgba(76, 201, 240, 0.7)',
                                'rgba(114, 9, 183, 0.7)',
                                'rgba(247, 37, 133, 0.7)',
                                'rgba(58, 12, 163, 0.7)',
                                'rgba(6, 214, 160, 0.7)'
                            ],
                            borderColor: [
                                'rgba(67, 97, 238, 1)',
                                'rgba(76, 201, 240, 1)',
                                'rgba(114, 9, 183, 1)',
                                'rgba(247, 37, 133, 1)',
                                'rgba(58, 12, 163, 1)',
                                'rgba(6, 214, 160, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });

                // Distribution Chart
                const distCtx = document.getElementById('distributionChart').getContext('2d');
                const distChart = new Chart(distCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['USA', 'UK', 'Canada', 'Australia', 'Switzerland'],
                        datasets: [{
                            label: 'Universities by Country',
                            data: [12, 5, 3, 2, 2],
                            backgroundColor: [
                                'rgba(67, 97, 238, 0.7)',
                                'rgba(76, 201, 240, 0.7)',
                                'rgba(114, 9, 183, 0.7)',
                                'rgba(247, 37, 133, 0.7)',
                                'rgba(6, 214, 160, 0.7)'
                            ],
                            borderColor: [
                                'rgba(67, 97, 238, 1)',
                                'rgba(76, 201, 240, 1)',
                                'rgba(114, 9, 183, 1)',
                                'rgba(247, 37, 133, 1)',
                                'rgba(6, 214, 160, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        },
                        cutout: '65%'
                    }
                });

                // Add hover effects to university cards
                document.querySelectorAll('.university-card').forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-5px)';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
