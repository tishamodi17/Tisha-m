//Command to create model:--- php artisan make:model Student -m

<?php
// Step 2: Create Student Model and Migration:

//database/migrations/create_students_table.php

public function up() {
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('course');
        $table->timestamps();
    });
}
?>

Command to migrate:--- php artisan migrate

