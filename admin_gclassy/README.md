<p align="center">
  <img src="https://img.shields.io/badge/Gclassy-Learning%20Platform-blue?style=for-the-badge&logo=graduation-cap" alt="Gclassy Badge">
</p>

<p align="center">    
  <img src="https://img.shields.io/badge/Laravel-11.x-red.svg" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue.svg" alt="PHP Version">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-teal.svg" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/Status-Production%20Ready-green.svg" alt="Status">
</p>


## 📋 Daftar Isi

-   [Tentang GClassy Admin](#-tentang-gclassy-admin)
-   [Fitur Utama](#-fitur-utama)
-   [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
-   [Instalasi](#-instalasi)
-   [Konfigurasi](#-konfigurasi)
-   [Panduan Admin](#-panduan-admin)
-   [User Management](#-user-management)
-   [Class Management](#-class-management)
-   [Payment Management](#-payment-management)
-   [API Endpoints](#-api-endpoints)
-   [Database Schema](#-database-schema)

## 🎯 Tentang GClassy Admin

GClassy Admin adalah sistem manajemen e-learning yang lengkap dan modern, dirancang khusus untuk mengelola platform pembelajaran online dengan antarmuka yang elegan dan fungsionalitas yang komprehensif.

### ✨ Keunggulan Sistem

-   **Modern UI/UX**: Desain premium dengan glass morphism dan gradient yang memukau
-   **Multi-Role System**: Support untuk Admin, Teacher, dan Student dengan hak akses berbeda
-   **Real-time Management**: Kelola kelas, pembayaran, dan pengguna secara real-time
-   **Responsive Design**: Tampilan optimal di semua perangkat
-   **Secure Authentication**: Sistem keamanan berlapis dengan role-based access control

## 🚀 Fitur Utama

### 👤 User Management

-   **Multi-Role Authentication**: Admin, Teacher, Student dengan dashboard terpisah
-   **Profile Management**: Kelola informasi pengguna lengkap
-   **Access Control**: Role-based permissions untuk setiap fitur
-   **User Registration**: Sistem pendaftaran yang mudah dan aman

### 🏫 Class Management

-   **Class Creation**: Buat kelas reguler dan bimbel dengan mudah
-   **Teacher Assignment**: Assign guru ke kelas tertentu
-   **Student Enrollment**: Kelola pendaftaran siswa ke kelas
-   **Schedule Management**: Atur jadwal kelas dan materi pembelajaran
-   **Class Analytics**: Statistik dan laporan per kelas

### 💰 Payment Management

-   **Payment Processing**: Kelola pembayaran dengan berbagai metode
-   **Payment Verification**: Sistem verifikasi pembayaran otomatis
-   **Invoice Generation**: Generate invoice dan receipt otomatis
-   **Payment History**: Riwayat pembayaran lengkap dengan filter
-   **Revenue Analytics**: Laporan pendapatan dan statistik keuangan

### 📊 Dashboard & Analytics

-   **Admin Dashboard**: Overview lengkap sistem dengan KPI utama
-   **Teacher Dashboard**: Dashboard khusus guru dengan statistik kelas
-   **Student Dashboard**: Portal siswa dengan progress pembelajaran
-   **Real-time Statistics**: Data real-time untuk monitoring sistem
-   **Export Reports**: Export laporan dalam berbagai format

## 🛠 Teknologi yang Digunakan

### Backend

-   **Laravel 11.x**: PHP Framework terbaru
-   **PHP 8.2+**: Programming language
-   **MySQL 8.0**: Database management system
-   **Laravel Sanctum**: API authentication
-   **Laravel Queue**: Background job processing

### Frontend

-   **Blade Templates**: Laravel templating engine
-   **TailwindCSS 3.x**: Utility-first CSS framework
-   **Alpine.js**: Lightweight JavaScript framework
-   **Vite**: Modern build tool untuk assets

### Development Tools

-   **Composer**: PHP dependency manager
-   **NPM**: Node package manager
-   **Laravel Artisan**: Command-line interface
-   **Laravel Mix**: Asset compilation

## 📦 Instalasi

### Prerequisites

```bash
- PHP >= 8.2
- Composer
- Node.js >= 18.x
- MySQL >= 8.0
- Web Server (Apache/Nginx)
```

### Langkah Instalasi

1. **Clone Repository**

```bash
git clone https://github.com/your-repo/gclassy-admin.git
cd gclassy-admin
```

2. **Install Dependencies**

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

3. **Environment Setup**

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

4. **Database Setup**

```bash
# Create database
mysql -u root -p -e "CREATE DATABASE admin_elearning;"

# Run migrations
php artisan migrate

# Seed sample data
php artisan db:seed
```

5. **Build Assets**

```bash
# Development
npm run dev

# Production
npm run build
```

6. **Start Development Server**

```bash
php artisan serve --port=8001
```

## ⚙ Konfigurasi

### Environment Variables

```env
# Application
APP_NAME="GClassy Admin"
APP_ENV=production
APP_KEY=base64:your-app-key
APP_DEBUG=false
APP_URL=http://localhost:8001

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_elearning
DB_USERNAME=root
DB_PASSWORD=

# Session
SESSION_DRIVER=file
SESSION_LIFETIME=120

# Cache
CACHE_DRIVER=file

# Queue
QUEUE_CONNECTION=sync
```

### Server Configuration

#### Apache (.htaccess)

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

#### Nginx

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/gclassy-admin/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## 👨‍💼 Panduan Admin

### Dashboard Admin

Admin dashboard menyediakan overview lengkap sistem dengan informasi:

-   **Total Users**: Jumlah pengguna per role
-   **Active Classes**: Kelas yang sedang berjalan
-   **Revenue**: Pendapatan dan statistik keuangan
-   **Recent Activities**: Aktivitas terbaru sistem

### Menu Navigasi

1. **Dashboard**: Halaman utama dengan statistik
2. **Users**: Manajemen pengguna (Admin, Teacher, Student)
3. **Classes**: Kelola kelas dan materi
4. **Payments**: Verifikasi dan kelola pembayaran
5. **Reports**: Laporan dan analitik
6. **Settings**: Pengaturan sistem

### Akses Admin Features

```php
// Check admin role
if (auth()->user()->role === 'admin') {
    // Admin only features
}

// Middleware protection
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});
```

## 👥 User Management

### User Roles & Permissions

#### Admin

-   **Full Access**: Semua fitur sistem
-   **User Management**: Create, read, update, delete users
-   **System Settings**: Konfigurasi sistem
-   **Reports**: Akses semua laporan

#### Teacher

-   **Class Management**: Kelola kelas yang diampu
-   **Student Progress**: Monitor progress siswa
-   **Payment View**: Lihat pembayaran kelas
-   **Profile Management**: Update profil pribadi

#### Student

-   **Class Enrollment**: Daftar kelas
-   **Payment**: Lakukan pembayaran
-   **Progress Tracking**: Lihat progress belajar
-   **Profile Management**: Update profil pribadi

### User Operations

#### Menambah User Baru

```php
// Create new user
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => Hash::make('password'),
    'role' => 'student',
    'phone' => '081234567890'
]);

// Create role-specific record
if ($user->role === 'teacher') {
    Teacher::create([
        'user_id' => $user->id,
        'employee_id' => 'EMP' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
        'subject' => 'Mathematics',
        'qualification' => 'S.Pd',
        'experience' => '5 years'
    ]);
}
```

#### Update User Profile

```php
// Update user information
$user = User::find($id);
$user->update([
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone
]);

// Update role-specific data
if ($user->role === 'teacher') {
    $user->teacher->update([
        'subject' => $request->subject,
        'qualification' => $request->qualification,
        'experience' => $request->experience
    ]);
}
```

## 🏫 Class Management

### Jenis Kelas

#### Kelas Reguler

-   **Gratis**: Tidak dipungut biaya
-   **Open Enrollment**: Pendaftaran terbuka
-   **Basic Features**: Fitur pembelajaran dasar

#### Kelas Bimbel

-   **Berbayar**: Ada biaya pendaftaran
-   **Limited Seats**: Jumlah peserta terbatas
-   **Premium Features**: Fitur pembelajaran premium
-   **Personal Guidance**: Bimbingan personal dari guru

### Class Operations

#### Membuat Kelas Baru

```php
$class = ClassRoom::create([
    'name' => 'Matematika Lanjutan',
    'subject' => 'Mathematics',
    'description' => 'Kelas matematika untuk tingkat lanjut',
    'type' => 'bimbel',
    'teacher_id' => $teacher->id,
    'schedule' => 'Monday & Wednesday 16:00-18:00',
    'price' => 500000.00,
    'is_active' => true
]);
```

#### Enroll Student ke Kelas

```php
// Check if student already enrolled
$isEnrolled = ClassStudent::where('class_room_id', $classId)
    ->where('student_id', $studentId)
    ->exists();

if (!$isEnrolled) {
    ClassStudent::create([
        'class_room_id' => $classId,
        'student_id' => $studentId,
        'enrolled_at' => now()
    ]);
}
```

#### Class Analytics

```php
// Get class statistics
$classStats = [
    'total_students' => $class->students()->count(),
    'total_revenue' => $class->payments()
        ->where('status', 'approved')
        ->sum('amount'),
    'pending_payments' => $class->payments()
        ->where('status', 'pending')
        ->count(),
    'completion_rate' => $this->calculateCompletionRate($class)
];
```

## 💰 Payment Management

### Payment Flow

1. **Student Enrollment**: Siswa mendaftar ke kelas berbayar
2. **Payment Creation**: Record pembayaran dibuat dengan status 'pending'
3. **Payment Proof**: Siswa upload bukti pembayaran
4. **Admin Verification**: Admin verifikasi pembayaran
5. **Approval/Rejection**: Admin approve atau reject pembayaran
6. **Access Granted**: Jika approved, akses kelas diberikan

### Payment Status

-   **Pending**: Menunggu verifikasi admin
-   **Approved**: Pembayaran disetujui, akses diberikan
-   **Rejected**: Pembayaran ditolak, perlu pembayaran ulang

### Payment Operations

#### Process Payment

```php
// Create payment record
$payment = Payment::create([
    'student_id' => $student->id,
    'class_room_id' => $classId,
    'amount' => $class->price,
    'payment_method' => $request->payment_method,
    'transaction_id' => $request->transaction_id,
    'status' => 'pending',
    'notes' => $request->notes
]);

// Handle file upload
if ($request->hasFile('payment_proof')) {
    $path = $request->file('payment_proof')->store('payment_proofs');
    $payment->update(['payment_proof' => $path]);
}
```

#### Approve Payment

```php
$payment = Payment::find($id);
$payment->update([
    'status' => 'approved',
    'approved_at' => now(),
    'approved_by' => auth()->id()
]);

// Grant class access automatically
// Student is already enrolled through ClassStudent relationship
```

#### Payment Reports

```php
// Monthly revenue report
$monthlyRevenue = Payment::where('status', 'approved')
    ->whereMonth('approved_at', now()->month)
    ->sum('amount');

// Payment method statistics
$paymentMethods = Payment::where('status', 'approved')
    ->groupBy('payment_method')
    ->selectRaw('payment_method, SUM(amount) as total, COUNT(*) as count')
    ->get();
```

## 🔗 API Endpoints

### Authentication

```http
POST /api/login
POST /api/register
POST /api/logout
POST /api/refresh
```

### Users

```http
GET    /api/users              # List all users
POST   /api/users              # Create user
GET    /api/users/{id}         # Get user details
PUT    /api/users/{id}         # Update user
DELETE /api/users/{id}         # Delete user
```

### Classes

```http
GET    /api/classes            # List all classes
POST   /api/classes            # Create class
GET    /api/classes/{id}       # Get class details
PUT    /api/classes/{id}       # Update class
DELETE /api/classes/{id}       # Delete class
POST   /api/classes/{id}/enroll # Enroll student
```

### Payments

```http
GET    /api/payments           # List payments
POST   /api/payments           # Create payment
GET    /api/payments/{id}      # Get payment details
PUT    /api/payments/{id}/approve # Approve payment
PUT    /api/payments/{id}/reject  # Reject payment
```

## 🗄 Database Schema

### Users Table

```sql
CREATE TABLE users (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(255),
    role ENUM('admin','teacher','student') DEFAULT 'student',
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### Teachers Table

```sql
CREATE TABLE teachers (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    employee_id VARCHAR(255) UNIQUE,
    subject VARCHAR(255),
    qualification VARCHAR(255),
    experience VARCHAR(255),
    bio TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Students Table

```sql
CREATE TABLE students (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    student_id VARCHAR(255) UNIQUE,
    date_of_birth DATE,
    address TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Class Rooms Table

```sql
CREATE TABLE class_rooms (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    subject VARCHAR(255),
    description TEXT,
    type ENUM('reguler','bimbel') DEFAULT 'reguler',
    teacher_id BIGINT UNSIGNED,
    schedule VARCHAR(255),
    price DECIMAL(10,2),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE SET NULL
);
```

### Payments Table

```sql
CREATE TABLE payments (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    student_id BIGINT UNSIGNED NOT NULL,
    class_room_id BIGINT UNSIGNED NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(255),
    transaction_id VARCHAR(255),
    payment_proof VARCHAR(255),
    status ENUM('pending','approved','rejected') DEFAULT 'pending',
    notes TEXT,
    approved_at TIMESTAMP NULL,
    approved_by BIGINT UNSIGNED,
    rejected_at TIMESTAMP NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (class_room_id) REFERENCES class_rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (approved_by) REFERENCES users(id) ON DELETE SET NULL
);
```

## 🔒 Keamanan

### Authentication & Authorization

#### Middleware Protection

```php
// Protect admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::resource('users', UserController::class);
});

// Protect teacher routes
Route::middleware(['auth', 'teacher'])->prefix('teacher')->group(function () {
    Route::get('/dashboard', [Teacher\DashboardController::class, 'index']);
    Route::resource('classes', Teacher\ClassController::class);
});
```

#### Role-based Access Control

```php
// TeacherMiddleware.php
public function handle($request, Closure $next)
{
    if (!auth()->check() || auth()->user()->role !== 'teacher') {
        abort(403, 'Unauthorized. Teacher access required.');
    }

    return $next($request);
}
```

### Data Protection

#### Input Validation

```php
// Form Request Validation
class CreateClassRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'type' => 'required|in:reguler,bimbel',
            'teacher_id' => 'required|exists:teachers,id',
            'price' => 'nullable|numeric|min:0'
        ];
    }
}
```

#### SQL Injection Prevention

```php
// Use Eloquent ORM (automatic protection)
$users = User::where('role', $role)->get();

// Or use parameter binding
$users = DB::select('SELECT * FROM users WHERE role = ?', [$role]);
```

#### CSRF Protection

```html
<!-- All forms automatically include CSRF token -->
<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- form fields -->
</form>
```

### File Upload Security

```php
// Validate file uploads
'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',

// Store in secure location
$path = $request->file('payment_proof')->store('payment_proofs', 'private');
```
