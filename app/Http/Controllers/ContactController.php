<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact.index.index')
        ->with('contacts', $this->getContacts())
        ->with('companies', $this->getCompanies());
    }

    public function create() {
        return view('contact.create');
    }

    public function show($id) {
        abort_if(!isset($this->getContacts()[$id]), 404);
        return view('contact.show')->with('contact', $this->getContacts($id));
    }

    protected function getCompanies($id = null) {
        $companies = [
            1 => ['id' => 1, 'name' => 'Company 1', 'contacts' => 3], 
            2 => ['id' => 2, 'name' => 'Company 2', 'contacts' => 5]
        ];
        if ($id != null) {
            return $companies[$id];
        }
        else {
            return $companies;
        }
    }

    protected function getContacts($id = null) {
        $contacts = [
            1 => ['id' => 1, 'name' => 'Lucas', 'lastName' => 'José', 'email'=> 'email@email.com', 'address' => 'rua do nunca', 'companyName' => 'company01', 'phone' => '123123123'],
            2 => ['id' => 2, 'name' => 'Felipe', 'lastName' => 'Almeida', 'email'=> 'email@email.com', 'address' => 'rua do nunca', 'companyName' => 'company01', 'phone' => '123123123'],
            3 => ['id' => 3, 'name' => 'Elmer', 'lastName' => 'Ferreira', 'email'=> 'email@email.com', 'address' => 'rua do nunca', 'companyName' => 'company01', 'phone' => '123123123']
        ];
    
        if ($id != null) {
            return $contacts[$id];
        }
        else {
            return $contacts;
        }
    }
}
