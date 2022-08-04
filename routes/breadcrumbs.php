<?php

use App\Models\Company;
use App\Models\Employee;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard', route('home'));
});

Breadcrumbs::for('employees', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Employees', route('employees'));
});

Breadcrumbs::for('showEmployee', function (BreadcrumbTrail $trail, Employee $employee): void {
    $trail->parent('employees');
    $trail->push($employee->firstName . ' ' . $employee->lastName, route('showEmployee', [
        'employee' => $employee
    ]));
});

Breadcrumbs::for('editEmployee', function(BreadcrumbTrail $trail, Employee $employee): void {
    $trail->parent('showEmployee', $employee);
    $trail->push('Edit', route('editEmployee', [
        'employee' => $employee
    ]));
});

Breadcrumbs::for('createEmployee', function (BreadcrumbTrail $trail): void {
    $trail->parent('employees');
    $trail->push('Create', route('createEmployee'));
});

Breadcrumbs::for('companies', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Companies', route('companies'));
});

Breadcrumbs::for('showCompany', function (BreadcrumbTrail $trail, Company $company): void {
    $trail->parent('companies');
    $trail->push($company->name, route('showCompany', [
        'company' => $company
    ]));
});

Breadcrumbs::for('editCompany', function(BreadcrumbTrail $trail, Company $company): void {
    $trail->parent('showCompany', $company);
    $trail->push('Edit', route('editCompany', [
        'company' => $company
    ]));
});

Breadcrumbs::for('createCompany', function (BreadcrumbTrail $trail): void {
    $trail->parent('companies');
    $trail->push('Create', route('createCompany'));
});
